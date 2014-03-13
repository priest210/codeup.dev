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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>TODO LIST</title>
        <link href="css/spacelab-bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/spacelab-bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/todo.css">

</head>
	
	<body class="body">

    <div class="navbar navbar-inverse">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#add">Add an Item</a>
        <a class="navbar-brand" href="#upload">Upload a File</a>
      </div>
    </div>

    <div class="jumbotron">
      <h1>My Todo List</h1>
      <p>The things I need to get done!</p>
            <ul>
                <? foreach ($items as $key => $value): ?>
                <li class="list"><?= $value; ?> <a id="remove"href="?remove=<?=$key;?>"> - Remove</a></li>
                <? endforeach; ?>
            </ul>
    </div>

    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Add to Your Todo list</h3>
      </div>
    </div>

    <div class="well">  
        <form method="POST" action="todo-list.php">
            <p>
                <label for="newitem" id="add">Add item:</label>
                <input id="newitem" name="newitem" type="text" autotfocus = "autofocus" placeholder="Enter a Todo Item Here">
            </p>

            <p>
                <input type="submit" value="Add item">
            </p>
        </form>
    </div>

    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title" id="upload">Upload a File</h3>
      </div>
    </div>


    <div class="well">
        <form method="POST" enctype="multipart/form-data">
            <p>
                <label for="new_upload">File to upload: </label>
                <input type="file" id="new_upload" name="new_upload" placeholder="Browse to file">
            </p>
            <p>
                <input type="submit" id="upload" value="Push to Upload">
            </p>
        </form>
    </div>

<?php 
 ?>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>