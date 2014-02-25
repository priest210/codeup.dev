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

$todo = array('Study PHP',
              'Study HTML',
              'Study PHP some more',
              'Master PHP');

// $todo = 

// $saved_array = 

foreach ($todo as $key => $item) {  

        var_dump($item);

}

function read_file($filename) {

        $handle = fopen($filename, 'r');

        $contents_array = fread($handle, filesize($filename));

        $saved_array = explode("\n", $contents_array);

        fclose($handle);

        return $saved_array;
}

function save_file($filename, $contents_array) {

        $new_save = implode("\n", $contents_array);

        $handle = fopen($filename, 'w');

        fwrite($handle, $new_save);

        fclose($handle);
}

// Using the POST method on the form in your template, 
// create the ability to add todo items to the list. 



// Each time an item is added, the todo list file should be saved 
// with the new item added.



// need to take uploaded file from form and put in array


// if (isset($_POST['newitem']) && !empty {  )

    # code...
// }

// Add a link next to each todo item that says "Mark Complete" and 

// have it send a GET request to the page that deletes the entry. 

// Use query strings to send the proper key back to the server, and 
// update the todo list file to reflect the deletion.


if (count($_FILES) > 0 && $_FILES['new_upload']['error'] == 0) {


    // if ($FILES['new_upload']['error'] ==   {

    //     $errormessage = 'File upload error. ';
    // }

    // if ($FILES['new_upload']['type'] == 'text/plain') {

    //     $errormessage = 'File upload type error. ';
    // }
 
    $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
    
    $filename = basename($_FILES['new_upload']['name']);
    
    $saved_filename = $upload_dir . $filename;
    
    move_uploaded_file($_FILES['new_upload']['tmp_name'], $saved_filename);

    // $uploadedItems = read_file($saved_filename);
    
    // $todos = array_merge($todo, $uploadedItems);

    // save_file($filename, $items);

}

if (isset($saved_filename)) {

    echo "<p>You can download your file <a href='/uploads/{$filename}'>here</a>.</p>";
}

if (isset($_POST['newitem'])) {

    $item = $_POST['newitem'];
    
    array_push($items, $item);

    save_file($filename, $items);
   
}

if (isset($_GET ['remove'])) {

    $itemId = $_GET['remove'];

    unset($items[$itmeId]);

    save_file($filename, $items);
   
}




?>


<form method="POST" action="">
    <p>
        <label for="New Item">Add item:</label>
        <input id="New Item" name="New Item" type="text" autotfocus = "autofocus" placeholder="Enter New TODO Item">
    </p>

    <p>
        <input type="submit" value="Add item">
    </p>

</form>


<h1>Upload File</h1>

<form method="POST" enctype="multipart/form-data">
    
    <p>
        <label for="new_upload">File to upload: </label>
        <input type="file" id="new_upload" name="new_upload" placeholder="Browse to file">
    </p>
    <p>
        <input type="submit" value="Upload">

    </p>

</form>

<?php 
echo "GET:";

var_dump($_GET);

echo "POST";

var_dump($_GET);

echo "FILES";

var_dump($_FILES);


 ?>
</body>
</html>