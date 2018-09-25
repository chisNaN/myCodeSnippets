<?php
$zip = new ZipArchive;
$res = $zip->open('path/to/your.zip');
if ($res === TRUE) {
    $extractFiles = [];
    for($i = -1; ++$i<$zip->numFiles;) {
        $file = $zip->statIndex($i);
        if($file['size'] > 0) { // files only
            $baseName = pathinfo($file['name'])['basename'];
            $extractFiles [] = $baseName;
            $zip->renameIndex($i, $baseName);
        }
    }
    $zip->extractTo('extract/dir', $extractFiles);
    $zip->close();
    echo 'ok';
} else echo 'Error: not a zip archive!';
