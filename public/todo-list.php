<!DOCTYPE html>

<html>

<head>
		<title>TODO List</title>
</head>
	
	<body>
        
     <h1>TODO List</h1>

        <ul>
        	<li>Study PHP</li>
        	<li>Study HTML</li>
        	<li>Study PHP some more</li>
        	<li>Master PHP</li>
        </ul>

       <h1>Add to your TODO list</h1>

<?php

// Create an array from your sample todo list items in the template.

$todo = array('Study PHP',
              'Study HTML',
              'Study PHP some more',
              'Master PHP');

// use PHP to display the array items within the unordered list 
// in your template and test in your browser.

 foreach ($todo as $item) {   
  
        var_dump($item);

}


// Reference the code you wrote in your command line todo list 
// app to add the ability to load todo items from a file.

// The items should be loaded into an array, and 
// then that array should be used to display the items just as in the above steps.

function get_input($upper = FALSE) {

    $input = trim(fgets(STDIN));
    
    if ($upper === TRUE) {
        
        return strtoupper($input);        
    }
    else {
            
        return $input;
    }

}


function read_file($filename) {

        $handle = fopen($filename, 'r');

        $contents_array = fread($handle, filesize($filename));

        fclose($handle);

        print_r(explode("\n", $contents_array));



function save_file($filename, $contents_array) {

        $new_save = implode("\n", $contents_array);

        $handle = fopen($filename, 'w');

        fwrite($handle, $new_save);

        fclose($handle);

        echo 'Save was successful.' . "PHP_EOL";


?>

		
<form method="POST" action="">
    <p>
        <label for="New Item">Add item:</label>
        <input id="New Item" name="New Item" type="text" autotfocus = "autofocus" placeholder="Enter new TODO item">
    </p>

    <p>
        <input type="submit" value="Add item">
    </p>


</form>

</body>
</html>