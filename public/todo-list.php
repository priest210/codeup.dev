<?php

require_once('filestore.php');

class TodoList extends Filestore {

}   

// set the filename path variable
$todo = new TodoList('todo_list.txt');

// calls the real function for file with new todo item add to end of array
$items = $todo->read();

try {

// if new item is posted this code adds to end of array. Saves file
if (!empty($_POST)) {
    if (strlen($_POST['newitem']) > 240 || (empty($_POST['newitem']))) {
        throw new InvalidInputException('Must have input that is less thatn 240 characters');
    }

    $item = htmlspecialchars(strip_tags($_POST['newitem']));
    array_push($items, $item);
    $todo->write($items);
    header('Location: todo-list.php');  
}

// if GET is initiated, removes item from array.  Saves file
if (isset($_GET['remove'])) {
    $itemId = $_GET['remove'];
    unset($items[$itemId]);
    $todo->write($items);
    header('Location: todo-list.php');   
}

// if file contains something & has no errors
if (count($_FILES) > 0 && $_FILES['new_upload']['error'] == 0) {

    if ($_FILES['new_upload']['error'] == 0)  {
        throw new InvalidInputException('File upload error. ');
    }
    if ($_FILES['new_upload']['type'] == 'text/plain') {
        throw new InvalidInputException('File upload type error. ');
    }
 
    $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';   
    $userfilename = basename($_FILES['new_upload']['name']);   
    $saved_filename = $upload_dir . $userfilename;

    if ($_FILES['new_upload']['type'] == 'text/plain') {
        move_uploaded_file($_FILES['new_upload']['tmp_name'], $saved_filename);
        $uploaded_file = new TodoList($saved_filename);
        $uploadedItems = $uploaded_file->read();
        $items = array_merge($items, $uploadedItems);
        $todo->write($items);
        
    } else {
        throw new InvalidInputException('ERROR !!!!!! Uploaded file must be a text file ERROR!!!!');
    }
    
}

// if file has items saved to it.  User can retrieve at this link posted. 
if (isset($saved_filename)) {
    echo "<p>You can download your file <a href='/uploads/{$userfilename}'>here</a>.</p>";
}


} catch (InvalidInputException $e) {
    echo 'Error found - check input parameters and TRY AGAIN!';
}


?>
<!DOCTYPE html>

<html>

<head>
		<title>TODO LIST</title>
        <link rel="stylesheet" href="/css/todo.css">
        <link href='http://fonts.googleapis.com/css?family=Geostar|Monoton|Montserrat+Subrayada|Faster+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Nosifer|Geostar|Monoton|Montserrat+Subrayada|Faster+One' rel='stylesheet' type='text/css'>E8932B
</head>
	
	<body class="body">
        
     <h1 class="primary-header">TODO List</h1>

        <ul>
        	<? foreach ($items as $key => $value): ?>
            <li class="list"><?= $value; ?> <a id="remove"href="?remove=<?=$key;?>"> - Remove</a></li>
            <? endforeach; ?>
        </ul>

       <h1 class="sub-heading">Add to your TODO list</h1>

<form method="POST" action="todo-list.php">
    <p>
        <label for="newitem">Add item:</label>
        <input id="newitem" name="newitem" type="text" autotfocus = "autofocus" placeholder="Enter New TODO Item">
    </p>

    <p>
        <input type="submit" value="Add item">
    </p>

</form>


<h1 class="sub-heading">Upload File</h1>

<form method="POST" enctype="multipart/form-data">
    
    <p>
        <label for="new_upload">File to upload: </label>
        <input type="file" id="new_upload" name="new_upload" placeholder="Browse to file">
    </p>
    <p>
        <input type="submit" id="button" value="Push Upload">

    </p>

</form>

<?php 



 ?>
</body>
</html>