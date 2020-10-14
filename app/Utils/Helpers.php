<?php

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/**
 * Parse CV
 */
function parseCV(){
    // Call symphony
    $process = new Process(['/usr/bin/python3', getcwd().'/app/Python/cv-parser.py']);
    $process->run();
    
    // Check for exceptions
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    // Return json object
    return $data = $process->getOutput();
}