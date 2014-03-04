<?php

class Filestore {

    public $filename = '';

    private $is_csv = FALSE;

// Sets filename
    public function __construct($filename = '') {
        $this->filename = $filename;
        if (substr($filename, -3) == 'csv') {
        	$this->is_csv = TRUE;
        } 

    }
// Decides if file is a CSV or string and will read it accordingly
    public function read() {
        if ($this->is_csv) {
            return $this->read_csv();
        }   else {
            return $this->read_lines();
        }
    }

    public function write($array) {
        if ($this->is_csv) {
            $this->write_csv($array);
        } else {
            $this->write_lines($array);
        }

    }

// Reads contents of string and push to array
    private function read_lines()
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
// Writes contents of array to string
    private function write_lines($contents_array) {
    	$new_save = implode("\n", $contents_array);
    	$handle = fopen($this->filename, 'w');
    	fwrite($handle, $new_save);
    	fclose($handle);
	}


// Reads CSV and returns array
    private function read_csv() {
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
// Writes contents of array to CSV file.
    private function write_csv($contacts) {
    	$handle = fopen($this->filename, 'w');
    	foreach ($contacts as $row) {
    		fputcsv($handle, $row);
    	}
    	fclose($handle);
    }

   
}