<?php

class Filestore {

    public $filename = '';

    function __construct($filename = '') {
        if(!empty($this->filename)) {
        	$this->filename = $filename;
        }
    }

    /**
     * Returns array of lines in $this->filename
     */
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

			while (($data = fgetcsv($handle) != FALSE)) {	
    			array_push($contacts, $data);
			}
	
		}else {
 			$contacts = [];
    	} 
    
    	fclose($handle);
    	return $contacts;

	}

    public function write_address_book($addresses_array) {
    	$handle = fopen($this->filename, 'w');
    	foreach ($addresses_array as $row ) {
    		fputcsv($handle, $row);
    	}
    	fclose($handle);
    }

    /**
     * Reads contents of csv $this->filename, returns an array
     */
    // function read_csv()
    // {

    // }

    // *
    //  * Writes contents of $array to csv $this->filename
     
    // function write_csv($array)
    // {

    // }

}