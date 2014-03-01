<?php

require_once('address_data_store.php');
class AddressBook extends AddressDataStore{
	
}

$ads = new AddressDataStore('address_list.csv');
$contacts = $ads->read_address_book('');
$ads->write_address_book($contacts);

$errorMessage = '';

$address_book = [
    ['The White House', '1600 Pennsylvania Avenue NW', 'Washington', 'DC', '20500'],
    ['Marvel Comics', 'P.O. Box 1527', 'Long Island City', 'NY', '11101'],
    ['LucasArts', 'P.O. Box 29901', 'San Francisco', 'CA', '94129-0901']
];

// write_address_book($filename);

// if )isset($_GET ['remove'])) {
// 	$todo_list->remove_item($_GET['remove'], 'address_list.csv');
// }


// if new item is posted this code runs
if (!empty($_POST['name'])) {
	foreach($_POST as $key => $items) {	
		$newitem[] = htmlspecialchars(strip_tags($items));
	}

	// push into $address_book
	// save CSV
}

/**
 * TODO:
 * 
 * Display table
 * Handle $_GET['remove']
 * Add remove links to table
 * Handle $_FILE upload (just replace addressbook data)
 * Allow $_FILE upload to merge w/ existing data
 * 
 */

// write_address_book($filename, $address_book);


// $entry = [$name, $streetaddress, $city, $state, $zip];

// $error = false;
// $message = '';

// if (empty($name)) {
// 	array_push($errorMessage, 'name must have a value');
// }

// if (empty($streetaddress)) {
// 	array_push($errorMessage, 'street address must have a value');
// }

// if (empty($city)) {
// 	array_push($errorMessage, 'city must have a value');
// }

// if (empty($state)) {
// 	array_push($errorMessage, 'state must have a value');
// }

// if (empty($zip)) {
// 	array_push($errorMessage, 'zip must have a value');
// }

// if (!empty($_POST['name'])) {
// 		$entry = [];
// 		$entry[$name] = $_POST {'name'};
// 		$entry[$streetaddress] = $_POST {'streetaddress'};
// 		$entry[$city] = $_POST {'city'};
// 		$entry[$state] = $_POST {'state'};
// 		$entry[$zip] = $_POST {'zip'};
// 		$entry[$phone] = $_POST {'phone'};

// 		foreach ($entry as $key => $value) {
// 			if ($empty($value)) {
// 				array_push($errorMessage, '$key must have a value');
// 			}
// 		}



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
