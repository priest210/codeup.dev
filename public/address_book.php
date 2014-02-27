<?php

$ads = new AddressDataStore();
$contacts = $ads->read_address_book();
$writes = $ads->write_address_book();
$addItem = $ads->array_push();

class AddressDataStore {

    public $filename = '';

    function __construct($filename = 'address_list.csv') {
        	$this->filename = $filename;
    }

    function read_address_book() {
    	$filesize = filesize($filename);
        $handle = fopen($this->$filename, 'r');

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

    function write_address_book($addresses_array) {
    	$handle = fopen($this -> $filename, 'w');
    	foreach ($rows as $row ) {
    		$write = fputcsv($handle, $row);
    	}
    	fclose($handle);
    	return $writes;
    }

    function addItem($address_book, &$errorMessage) {
	$newitem = $_POST;

	if ($newitem['name'] == '' || $newitem['streetaddress'] == '' || $newitem['city'] == '' || $newitem['state'] == '' || $newitem['zip'] == '') {
		$errorMessage = 'Please enter required information';
	} else {
		array_push($address_book, $newitem);
	}

}


$errorMessage = '';
$filename = 'address_list.csv';
read_file($filename);


// Read a file from the directory
function read_file($filename) {
	$filesize = filesize($filename);
	$handle = fopen($filename, 'r');

	if ($filesize > 0) {					
		$contacts = [];

		while (($data = fgetcsv($handle) !== FALSE)) {	
    		array_push($contacts, $data);
		}
	
	}else {
 		$contacts = [];
    } 
    
    fclose($handle);
    return $contacts;
}


function writeCSV($filename, $rows) {
	$handle = fopen($filename, "w");
	foreach ($rows as $row) {
		fputcsv($handle, $row);
	}

	fclose($handle);
}

function addItem($address_book, &$errorMessage) {
	$newitem = $_POST;

	if ($newitem['name'] == '' || $newitem['streetaddress'] == '' || $newitem['city'] == '' || $newitem['state'] == '' || $newitem['zip'] == '') {
		$errorMessage = 'Please enter required information';
	} else {
		array_push($address_book, $newitem);
	}

}

$address_book = [
    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
];

writeCSV($filename, $address_book);



// if new item is posted this code runs
if (!empty($_POST['name'])) {
	foreach($_POST as $key => $items) {	
		$newitem[] = htmlspecialchars(strip_tags($items));
	}
}

writeCSV($filename, $address_book);


$entry = [$name, $streetaddress, $city, $state, $zip];

$error = false;
$message = '';

if (empty($name)) {
	array_push($errorMessage, 'name must have a value');
}

if (empty($streetaddress)) {
	array_push($errorMessage, 'street address must have a value');
}

if (empty($city)) {
	array_push($errorMessage, 'city must have a value');
}

if (empty($state)) {
	array_push($errorMessage, 'state must have a value');
}

if (empty($zip)) {
	array_push($errorMessage, 'zip must have a value');
}

if (!empty($_POST['name'])) {
		$entry = [];
		$entry[$name] = $_POST {'name'};
		$entry[$streetaddress] = $_POST {'streetaddress'};
		$entry[$city] = $_POST {'city'};
		$entry[$state] = $_POST {'state'};
		$entry[$zip] = $_POST {'zip'};
		$entry[$phone] = $_POST {'phone'};

		foreach ($entry as $key => $value) {
			if ($empty($value)) {
				array_push($errorMessage, '$key must have a value');
			}
		}



?>

<!DOCTYPE html>

<html>

<head>
		<title>Address Book</title>
</head>
	
	<body>
		
		

		<!-- <table>
			
		
			<?// foreach($items as $item): ?>
            
			<tr> foreach()
				<td>name </td>
				<td>streetaddress </td>
				<td>city </td>
		 		<td>state </td>
				<td>zip </td>
				<td>phone </td>
			</tr>

			<?// endforeach; ?>

		</table> -->
        

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

