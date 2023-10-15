<?php

/* ---------- File Handling --------- */

/* 
  File handling is the ability to read and write files on the server.
  PHP has built in functions for reading and writing files.
*/

$file = 'extras/users.txt';

if (file_exists($file)) {
    $handle = fopen($file, 'r');
    if ($handle) {
        $contents = fread($handle, filesize($file));
        fclose($handle);
        echo $contents;
        echo filesize($file);
    } else {
        echo "Failed to open file for reading.";
    }
} else {
    echo "File does not exist. Creating the file...";

    $handle = fopen($file, 'w');
    if ($handle) {
        $contents = 'Bren' . PHP_EOL . 'Kylo' . PHP_EOL . 'Camma';
        fwrite($handle, $contents);
        fclose($handle);
        echo "File created and populated. Please Refresh the page";
    } else {
        echo "Failed to create the file.";
    }
}