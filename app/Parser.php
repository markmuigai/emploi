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
    	return Pdf::getText($this->filepath);
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

            return $contents;
        } else {
            return null;
            return file_get_contents($this->filename);
        }
    }
}
