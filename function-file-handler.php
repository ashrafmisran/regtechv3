<?php

	function make_directory($url){
		$folders = explode('/', $url);
		$parent = '';

		foreach ($folders as $folder) {
			// Create folder if no folder
			if (!is_dir($parent.$folder)) {
				mkdir($parent.$folder);
			}
			// Set parent folder for next subfolder
			$parent = $parent.$folder.'/'; 
		}
		return true;
	}

	function delete_directory($dir){
		$files = scandir($dir);

		// Delete the files and subfolders
		foreach ($files as $file) {
			// Skip . and ..
			if ($file == '.' OR $file == '..') {
				continue;
			}

			// Set the path to the file
			$file = $dir.'/'.$file;

			if (is_dir($file)) {
				delete_directory($file);
			}else{
				unlink($file);
			}
		}

		// Delete the folder itself
		rmdir($dir);
	}




	// Both path mush end with slash
	function move_directory($original_dir, $target_dir){
		make_directory($target_dir);

		$contents = scandir($original_dir);
		$folder   = $original_dir;
		foreach ($contents as $content) {
			if ($content == '.' OR $content == '..') {
				continue;
			}

			$originalfilename = $content;
			$content = $folder.$content;
			if (is_dir($content)) {
				move_directory($content, $target_dir.$originalfilename);
			}else{
				rename($content, $target_dir.'/'.$originalfilename);
			}
			$folder = $content.'/';
		}

		delete_directory($original_dir);
	}
?>