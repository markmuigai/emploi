<?php

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/**
 * Parse CV
 */
function parseCV($path){
    $arg = "/usr/bin/python3 ". base_path()."/app/Python/cv-parser.py {$path}";

    // return $arg;
    // Call symphony
    $process = new Process($arg);
    $process->run();
    
    // Check for exceptions
    if (!$process->isSuccessful()) {
        // Get error message string
        $error = (new ProcessFailedException($process))->getMessage();

        if(strpos(strtolower($error), 'incorrect password') == true){
            return 'incorrect password';
        }

        throw new ProcessFailedException($process);
    }

    // Return json object
    return $data = $process->getOutput();

    // $arg = "/usr/bin/python3 ". getcwd()."/app/Python/cv-parser.py $path";
    // return exec($arg);
}

/**
 * Review CV and assign a score
 */
function cleanCV($cvText)
{
    // Remove first 2 characters ('b)
    $cvText = str_replace(substr($cvText,0,2), '', $cvText);

    // Remove line breaks (\n)
    $formattedText = str_replace('\n', ' ', $cvText);

    // Remove tab spaces (\n)
    $formattedText = str_replace('\t', '', $formattedText);

    // Get all string positions of vertical tabs shortcodes (e.g \x086)
    $offset = 0;
    $allpos = array();
    while (($pos = strpos($formattedText, '\x', $offset)) !== FALSE) {
        $offset   = $pos + 1;
        $allpos[] = $pos;
    }

    // Replace the vertical tabs with 4 unique characters to prevent losing data between iterations
    foreach($allpos as $pos)
    {
        $formattedText = str_replace(substr($formattedText, $pos, 4), '~~~~', $formattedText);
    }

    // Remove unique characters
    $formattedText = str_replace('~~~~', '', $formattedText);

    return $formattedText;
}

/**
 * Review cv based on existence of keywords e.g sections
 */
function reviewCV($cvText)
{
    // dd($cvText);
    // dd(strpos(strtolower($cvText), 'responsibilities'));

    // Get keywords to be searched for in cv text
    $keywords = App\CVKeyword::all()->pluck('name');

    // Capture whether a section exists
    $score = collect();
    
    // Store mixing section names
    $recommendations = collect();

    // Store final result
    $result = collect();

    foreach($keywords as $keyword)
    {
        // Check if a section is missing
        if(strpos(strtolower($cvText), $keyword) == false){
            $sectionExists = 0;

            // Add missing section to recommendations
            $recommendations->push($keyword);
        }else{
            $sectionExists = 1;
        }

        $score->push($sectionExists);
    }

    $result->put('score', ceil(($score->sum()/count($keywords))*100));
    $result->put('recommendations', $recommendations);

    return $result;
}

/**
 * Test CVs
 */