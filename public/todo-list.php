<?php



// Read a file from the directory
function read_file($filename) {

    $filesize = filesize($filename);

    if ($filesize > 0) {

        $handle = fopen($filename, 'r');

        $content_string = fread($handle, $filesize);

        $saved_array = explode("\n", trim($content_string));

        fclose($handle);

        
    } else {
        $saved_array = [];
    }

    return $saved_array;

}

// Saves an array to file name that I send
function save_file($filename, $contents_array) {

    $new_save = implode("\n", $contents_array);

    $handle = fopen($filename, 'w');

    fwrite($handle, $new_save);

    fclose($handle);
}

// sets the filename
$filename = 'data/todo_list.txt';


// Read file contents


$items = read_file($filename);

// if new item is posted this code runs
if (isset($_POST['newitem']) && (!empty($_POST['newitem']))) {

    $item = htmlspecialchars(strip_tags($_POST['newitem']));

    // $item = $_POST['newitem'];
    
    array_push($items, $item);

    save_file($filename, $items);

    header('Location: todo-list.php');
   
}
// removes item from array
if (isset($_GET['remove'])) {

    $itemId = $_GET['remove'];

    unset($items[$itemId]);

    save_file($filename, $items);

    header('Location: todo-list.php');
   
}

// need to make fread ($filename) readable when empty
// getting parameter length needs to be greater than 0

// covers all files
if (count($_FILES) > 0 && $_FILES['new_upload']['error'] == 0) {

// covers just $filename

if (count($filename) == 0) {
    // code...
}

    if ($_FILES['new_upload']['error'] == 0)  {

        $errormessage = 'File upload error. ';
    }

    if ($_FILES['new_upload']['type'] == 'text/plain') {

        $errormessage = 'File upload type error. ';
    }
 
    $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
    
    $userfilename = basename($_FILES['new_upload']['name']);
    
    $saved_filename = $upload_dir . $userfilename;

    if ($_FILES['new_upload']['type'] == 'text/plain') {
        # code...
    move_uploaded_file($_FILES['new_upload']['tmp_name'], $saved_filename);

    $uploadedItems = read_file($saved_filename);
 
    $items = array_merge($items, $uploadedItems);

    save_file($filename, $items);

    var_dump($_FILES['new_upload']['type']);

    } else {
        echo 'ERROR !!!!!! Uploaded file must be a text file ERROR!!!!';
    }
    
}

if (isset($saved_filename)) {

    echo "<p>You can download your file <a href='/uploads/{$filename}'>here</a>.</p>";
}


?>
<!DOCTYPE html>

<html>

<head>
		<title>TODO List</title>
</head>
	
	<body>
        
     <h1>TODO List</h1>

        <ul>
        	<? foreach ($items as $key => $value): ?>
            <li><?= $value; ?> <a href="?remove=<?=$key;?>">Remove</a></li>
            <? endforeach; ?>
        </ul>

       <h1>Add to your TODO list</h1>

<form method="POST" action="todo-list.php">
    <p>
        <label for="newitem">Add item:</label>
        <input id="newitem" name="newitem" type="text" autotfocus = "autofocus" placeholder="Enter New TODO Item">
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
// echo "GET:";

// var_dump($_GET);

// echo "POST";

// var_dump($_GET);

// echo "FILES";

// var_dump($_FILES);


 ?>
</body>
</html>