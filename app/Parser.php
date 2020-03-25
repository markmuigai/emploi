<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\PdfToText\Pdf;
use Storage;

class Parser extends Model
{
	public $filename, $filepath;

    public function __construct($filePath) {
    	$p = explode(" ",$filePath);
        $this->filename = implode("%20",$p);
    }

    private function read_doc() {
    	//dd('rerrr');
        $fileHandle = fopen($this->filepath, "r");
        $contents = file_get_contents($this->filepath);
        $contents = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$contents);
        return $contents;
    }

    private function read_docx(){

        $striped_content = '';
        $content = '';

        $zip = zip_open($this->filepath);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    }

    private function read_pdf(){
        $contents = null;
        try {
            $contents = Pdf::getText($this->filepath);
          $this->buildXMLHeader();

        } catch (\Exception $e) {

            return $contents;
        }
        return $contents;
    }

    public function convertToText() {

        $file_ext = explode('.',$this->filename);
        $file_ext = $file_ext[count($file_ext)-1];

        $this->filepath = storage_path().'/app/public/resumes/'.$this->filename;

        if(!file_exists($this->filepath))
            return null;

        $contents = "";
        if($file_ext == "doc" || $file_ext == "docx" || $file_ext == "pdf")
        {
            if($file_ext == "doc") {

                $contents = $this->read_doc();
            } elseif($file_ext == "docx") {
                $contents = $this->read_docx();
            } elseif($file_ext == "pdf") {
            	$contents = $this->read_pdf();
            }

            return substr($contents, 0, 50000);

            return $contents;
        } else {
            return null;
            return file_get_contents($this->filename);
        }
    }

    public function readContents(){

        $path = $this->filename;

        $com = "-f";
        if(filter_var($path, FILTER_VALIDATE_URL) !== FALSE)
        {
            $com = "-r";
        }


        $script = "pyresparser $com $path  2>&1";

        exec($script,$output,$return_var);

        if($return_var !== 0)
        {
            die("An error occurred while parsing cv");
        }

        if(count($output) > 10)
        {
            $ret = "";
            for($t=10; $t<count($output); $t++)
            {
                $ret .= $output[$t];
            }
        }
        else
        {
            die("Parsing output err");
        }



        if(!strpos($ret, "[{") == false)
        {
            die("Invalid response received after parsing! ");
        }



        $ret = explode("[{", $ret);

        if(count($ret) == 0)
            die("Parse Failed");


        //dd(array($keys,$values));




        $ret = "[{".$ret[1];

        //$ret = str_replace("\\n", '', $ret);



        $keys = [];
        $values = [];



        
        $ret = explode("':", $ret);

        

        $key = explode("[{'", $ret[0]);
        $keys[] = $key[1];

        for($g=1; $g<count($ret)-1; $g++)
        {

            $pair = $ret[$g];
            $pair = explode(",  '", $pair);

            $value = $pair[0];

            $keys[] = $pair[1];

            $value = explode("',", $value);
            if(count($value) > 1)
                $values[] = $value;
            else
                $values[] = $value[0];




            // $key = explode("'", $pair[count($pair)-1]);

            // $contents = [];

            // for($h=0; $h<count($pair)-1; $h++)
            // {
            //     $contents[] = $pair[$h];
            // }

            // $values[] = $contents;
            



            // $keys[] = $key[1];
        }

        $value = explode("}]",$ret[count($ret)-1]);
        $value = $value[0];

        $values[] = $value;



        $final = array();

        for($k=0; $k<count($keys); $k++)
        {
            $key = $keys[$k];
            $val = $values[$k];

            if(is_array($values[$k]) && count($values[$k]) == 1)
            {
                $val = explode(",", $values[$k][0]);
                if(count($val)>2)
                {
                    $newVal = "";
                    for($y=0; $y<count($val)-1; $y++)
                    {
                        $newVal.=$val[$y];
                    }
                    $val = $newVal;
                }
                else
                {
                    $val = trim($val[0]);
                    
                }
                
            }

            if($key == 'email' || $key == 'mobile_number' || $key == 'name')
                $val = str_replace("'", '', $val);

            if($key == 'total_experience')
                $val = (int) trim($val);

            if($key == 'experience')
            {
                if(is_array($val))
                {
                    $finalVals = [];
                    for($a=0; $a<count($val); $a++)
                    {
                        $thisVal = $val[$a];
                        if($a == 0)
                        {
                            $thisVal = explode("['", $thisVal);
                            $thisVal = implode('', $thisVal);
                            $thisVal = explode("',", $thisVal);
                            $thisVal = implode('', $thisVal);
                            $thisVal = explode("']", $thisVal);
                            $thisVal = trim(implode('', $thisVal));

                        }
                        else
                        {
                            $thisVal = explode("             '", $thisVal);
                            $thisVal = implode('', $thisVal);
                            $thisVal = explode("',", $thisVal);
                            $thisVal = implode('', $thisVal);
                            $thisVal = explode("['", $thisVal);
                            $thisVal = implode('', $thisVal);
                            $thisVal = explode("']", $thisVal);
                            $thisVal = trim(implode('', $thisVal));

                        }

                        $finalVals[] = $thisVal;
                        
                    }

                    $val = $finalVals;
                }
                else
                {
                    $val = str_replace("'", "", $val);
                }
            }

            if($key == 'no_of_pages')
                continue;

            if($key == 'skills')
            {
                if(!is_array($val))
                {
                    continue;
                }
                if(is_array($val) && count($val) > 1)
                {
                    $finalVals = [];
                    for($a=0; $a<count($val); $a++)
                    {
                        $thisVal = $val[$a];
                        if($a == 0)
                        {
                            $thisVal = explode("['", $thisVal);
                            $thisVal = implode('', $thisVal);
                            $thisVal = explode("',", $thisVal);
                            $thisVal = trim(implode('', $thisVal));

                        }
                        else
                        {
                            $thisVal = explode("             '", $thisVal);
                            $thisVal = implode('', $thisVal);
                            $thisVal = explode("',", $thisVal);
                            $thisVal = implode('', $thisVal);
                            $thisVal = explode("'],", $thisVal);
                            $thisVal = implode('', $thisVal);
                        }

                        $finalVals[] = $thisVal;
                        
                    }

                    $val = $finalVals;
                }
            }

            if($key == 'degree')
            {

                if(is_array($val) && count($val) > 0)
                {
                    $newDegrees = [];
                    for($r=0; $r<count($val); $r++)
                    {
                        $thisDeg = explode(" ['",$val[$r]);
                        $thisDeg = implode("", $thisDeg);

                        if($r == 0)
                        {
                            $thisDeg = explode("'", $thisDeg);
                            $thisDeg = implode("", $thisDeg);
                            $newDegrees[] = $thisDeg;
                        }
                        elseif(strpos($thisDeg, "',") != false)
                        {
                            $thisDeg = explode("',", $thisDeg);
                            $thisDeg = implode("", $thisDeg);
                            $thisDeg = explode("             '", $thisDeg);
                            $thisDeg = implode("", $thisDeg);
                            $newDegrees[] = $thisDeg;
                        }
                    }
                    $val = $newDegrees;
                }
                elseif(!is_array($val))
                {
                    $val = explode(" ['", $val);
                    $val = implode("", $val);
                }
            }

            if($key == 'designation')
            {
                if(is_array($val))
                {
                    $designations = [];
                    for($t=0; $t<count($val); $t++)
                    {
                        $des = explode("['", $val[$t]);
                        $des = implode("", $des);
                        $des = explode("']", $des);
                        $des = implode("", $des);
                        $designations[] = $des;
                    }
                    $val = $designations;
                }
                else
                {
                    $val = explode("['", $val);
                    $val = implode("", $val);
                    $val = explode("']", $val);
                    $val = implode("", $val);
                }
            }

            $final[$key] = $val;
        }

        return $final;

    }
}
