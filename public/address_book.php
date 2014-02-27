<?php

// Read a file from the directory
function read_file($filename) {

	$filesize = filesize($filename);
	echo $filesize;

	if ($filesize > 0) {					

		$handle = fopen($filename, 'r');

    	$contacts = fgetcsv($handle, filesize);

    	$contacts = explode("\n", $contacts);

	}
    
    else {

 		$contacts = [];
    } 
    
    fclose($handle);
    return $contacts;
}

$filename = 'data/todo_list.txt';
read_file($filename);


// Saves an array to file name that I send
function save_file($filename, $contacts) {

    $handle = fopen($filename, 'w');

    fwrite($handle, $contacts);

    fclose($handle);
}


function writeCSV($filename, $rows) {
	
	$handle = fopen($filename, "w");
	
	foreach ($address_list as $rows) {

	}
		
	fputcsv($handle, $rows);

	fclose($handle);
}

$address_book = [
    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
];

writeCSV('address_book.csv', $address_book);


// $items = read_file($filename);

$newitem = [];

$thelist = 'data/address_list.csv';

$address_list = 'address_list.csv';



// if new item is posted this code runs
if (!empty($_POST['name'])) {

	foreach($_POST as $key => $items) {
	
		$newitem[] = htmlspecialchars(strip_tags($items));
	
	}

	save_file($thelist, $address_list);
}


// if (!empty($_POST['name'])) {

// 		$name = $_POST {'name'};
// 		$streetaddress = $_POST {'streetaddress'};
// 		$city = $_POST {'city'};
// 		$state = $_POST {'state'};
// 		$zip = $_POST {'zip'};
// 		$phone = $_POST {'phone'};

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

