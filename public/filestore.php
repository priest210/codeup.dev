<?php

class Filestore {

    public $filename = '';

    function __construct($filename = '') {
        if(!empty($filename)) {
        	$this->filename = $filename;
        }
    }

    function read_lines()
    {
    	$filesize = filesize($this->filename);
    	
    	if ($filesize > 0) {
        	$handle = fopen($this->filename, 'r');
        	$content_string = fread($handle, $filesize);
        	$saved_array = explode("\n", trim($content_string));
        	fclose($handle);
    
    	} else {
        	$saved_array = [];
    	}
    	return $saved_array;

    }

    /**
     * Writes each element in $array to a new line in $this->filename
     */
    function write_lines($contents_array) {
    	$new_save = implode("\n", $contents_array);
    	$handle = fopen($this->filename, 'w');
    	fwrite($handle, $new_save);
    	fclose($handle);
	}

    public function read_address_book() {
    	$filesize = filesize($this->filename);
        $handle = fopen($this->filename, 'r');

    	if ($filesize > 0) {					
			$contacts = [];

			while (($data = fgetcsv($handle)) !== FALSE) {	
    			array_push($contacts, $data);
			}
	
		}else {
 			$contacts = [];
    	} 
    	fclose($handle);
    	return $contacts;

	}

    public function write_address_book($contacts) {
    	$handle = fopen($this->filename, 'w');
    	foreach ($contacts as $row) {
    		fputcsv($handle, $row);
    	}
    	fclose($handle);
    }

   
}