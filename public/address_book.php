<?php

// Read a file from the directory
function read_file($filename) {

    $handle = fopen($filename, 'r');

    $contact_string = fread($handle, filesize($filename));

    $contact_array = explode("\n", $contact_string);

    fclose($handle);

    return $contact_array;
}

// Saves an array to file name that I send
function save_file($filename, $contact_array) {

    $new_save = implode("\n", $contact_array);

    $handle = fopen($filename, 'w');

    fwrite($handle, $new_save);

    fclose($handle);
}



foreach ($variable as $key => $value) {
	fputcsv(handle, fields)
}

$filename = 'data/address_list.csv';

// Read file contents
$items = read_file($filename);

// if new item is posted this code runs
if (!empty($_POST['name'])) {

    $item = htmlspecialchars(strip_tags($_POST['name']));

    array_push($items, $item);

    save_file($filename, $items);
}

?>

<!DOCTYPE html>

<html>

<head>
		<title>Address Book</title>
</head>
	
	<body>
        
     <h1>Address Book</h1>

       <h1>Add Contact to your Address Book</h1>

<form method="POST" action="">
    
	<p>
        <label for="name">Add Name:</label>
        <input id="name" name="name" type="text" autotfocus = "autofocus"placeholder="Enter name">
    </p>


    <p>
        <label for="streetaddress">Add Street Address:</label>
        <input id="streetaddress" name="streetaddress" type="text" autotfocus = "autofocus"placeholder="Enter street address">
    </p>

    <p>
        <label for="city">Add City:</label>
        <input id="city" name="city" type="text" autotfocus = "autofocus"placeholder="Enter city">
    </p>

    <p>
        <label for="state">Add State:</label>
        <input id="state" name="state" type="text" autotfocus = "autofocus"placeholder="Enter state">
    </p>

    <p>
        <label for="zip">Add Zip:</label>
        <input id="zip" name="zip" type="text" autotfocus = "autofocus"placeholder="Enter zip">
    </p>

     <p>
        <label for="phone">Add Phone number (111-222-3333):</label>
        <input id="phone" name="phone" type="text" autotfocus = "autofocus"placeholder="Enter Phone: 111-222-3333">
    </p>

    <p>
        <input type="submit" value="Add contact">
    </p>

</form>

</body>
</html>

