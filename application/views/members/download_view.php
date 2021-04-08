<?php
if( ! empty($download_file))
    {
        //If you want to download an existing file from your server you'll need to read the file into a string
        print_r(base_url("/uploads/output/".$download_file));
        $data = file_get_contents(base_url("/uploads/output/".$download_file)); // Read the file's contents
        $name = $download_file;
        force_download($name, $data);
    }
?>