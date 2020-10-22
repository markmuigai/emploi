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
        throw new ProcessFailedException($process);
    }

    // Return json object
    return $data = $process->getOutput();

    // $arg = "/usr/bin/python3 ". getcwd()."/app/Python/cv-parser.py $path";
    // return exec($arg);
}