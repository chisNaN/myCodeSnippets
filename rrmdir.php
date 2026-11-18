<?php
//it will remove all files and directories (even empty ones) recursively
//check write permissions
function rrmdir($dir)
{
	foreach(array_diff(scandir($dir), ['.', '..']) as $file):

		$fullPath = $dir.DIRECTORY_SEPARATOR.$file;

		(is_dir($fullPath)) ? rrmdir($fullPath) : unlink($fullPath);

	endforeach;

	return rmdir($dir);
}