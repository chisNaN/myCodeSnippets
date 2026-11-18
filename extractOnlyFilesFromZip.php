<?php
const ZIP_ERRORS = ['No error',
    'Multi-disk zip archives not supported',
    'Renaming temporary file failed',
    'Closing zip archive failed',
    'Seek error',
    'Read error',
    'Write error',
    'CRC error',
    'Containing zip archive was closed',
    'No such file',
    'File already exists',
    "Can't open file",
    'Failure to create temporary file',
    'Zlib error',
    'Malloc failure',
    'Entry has been changed',
    'Compression method not supported',
    'Premature EOF',
    'Invalid argument',
    'Not a zip archive',
    'Internal error',
    'Zip archive inconsistent',
    "Can't remove file",
    'Entry has been deleted'];

function extractOnlyFilesFromZip($zipFile, $extractDir = '.') {
    $zip = new ZipArchive;
    $res = $zip->open($zipFile);
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
        $zip->extractTo($extractDir, $extractFiles);
        $zip->close();
        return true;
    } else return ZIP_ERRORS[$res];
}
