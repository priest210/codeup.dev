<?php

require_once('address_data_store.php');

$addresses = new AddressDataStore('address_list.csv');
$contacts = $addresses->read();

try {

if (!empty($_POST)) {
	if (strlen($_POST['name']) > 125 || (empty ($_POST['name']))){
		throw new InvalidInputException('Must have an put that is less thatn 125 characters');
	} else {
			$newitem[] = htmlspecialchars(strip_tags($_POST['name']));
	}

	if (!empty($_POST['streetaddress'])) {
		$newitem[] = htmlspecialchars(strip_tags($_POST['streetaddress']));
	}	else {
			$newitem[] = htmlspecialchars(strip_tags($_POST['streetaddress']));
	}

	if (!empty($_POST['city'])) {
		$newitem[] = htmlspecialchars(strip_tags($_POST['city']));
	}	else {
		$newitem[] = htmlspecialchars(strip_tags($_POST['city']));
	}

	if (!empty($_POST['state'])) {
		$newitem[] = htmlspecialchars(strip_tags($_POST['state']));
	}	else {
		$newitem[] = htmlspecialchars(strip_tags($_POST['state']));
	}

	if (!empty($_POST['zip'])) {
		$newitem[] = htmlspecialchars(strip_tags($_POST['zip']));
	}	else {
		$newitem[] = htmlspecialchars(strip_tags($_POST['zip']));
	}

	array_push($contacts, $newitem);

	$addresses->write($contacts);

	if (isset($_GET['remove'])) {
		$itemId = $_GET['remove'];
		unset($rows[$itemId]);
		$addresses->write($rows);
		header('Location: address_book.php');
	}
}

} catch (InvalidInputException $e) {
	echo 'Error - Verify you are using proper input parameters & TRY AGAIN!';
}


?>

<!DOCTYPE html>

<html>

<head>
		<title>Address Book</title>
</head>
	
	<body>
		
		
		<table>
				<tr>
					<th>name</th>
					<th>streetaddress </th>
					<th>city </th>
					<th>state </th>
					<th>zip</th>
				</tr>	
			
		
			<? foreach($contacts as $rows => $row):  ?>

				<tr>
					<? foreach ($row as $entry): ?>
						<td><?=$entry?></td>
					<? endforeach; ?>
					<td><a href="? remove=<?= $rows; ?>">Remove row</a></td>
				</tr>
			<?endforeach; ?>

		</table>
        

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
        <input type="submit" value="Add contact">
    </p>

</form>


</body>
</html>
<?php






