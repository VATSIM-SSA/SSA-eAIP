<?php
# Returns list of directories
function dirList($path){
    
    $dirs = array();

    // directory handle
    $dir = dir($path);

    while (false !== ($entry = $dir->read())) {
        if ($entry != '.' && $entry != '..') {
            if (is_dir($path . '/' .$entry)) {
                $dirs[] = $entry;
            }
        }
    }

    return $dirs;
}

# Copies a directory
function recurse_copy($src,$dst) {
    $dir = opendir($src);
	
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
} 

?>