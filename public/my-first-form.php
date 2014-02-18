<?php

echo "<p>GET:</p>";

var_dump($_GET);

echo "<p>POST:</p>";

var_dump($_POST);

?>

<!DOCTYPE html>

<html>


<head>
		<title>My First HTML Form (Email)</title>
</head>
	
	<body>
        <h1>User Login</h1>

<form method="POST" action="">
    
    <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder = "Username">
    </p>
    
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder = Password>
    </p>
    
    <p>
        <button type="submit">Click It!</button>
       
    
    </p>

        <h1>Compose an Email</h1>
</form>
		
<form method="POST" action="">
    
    <p>
        <label for="to">From:</label>
        <input id="to" name="to" type="text" placeholder = "Recepient's address">
    </p>
   
    <p>
        <label for="from">To:</label>
        <input id="from" name="from" type="text" placeholder = "Sender's address">
    </p>

    <p>
        <label for="subject">Subject:</label>
        <input id="subject" name="subject" type="text" placeholder = "About?">
    </p>

    <p>
    <textarea id="email_body" name="email_body" placeholder="Type message here"></textarea>
    </p>
    
    <p>
        <label for="Save_a_Copy">
            <input type="checkbox" id="Save_a_Copy" name="Save_a_Copy" value="yes" checked> Save a copy in my sent folder!
        </label>
    </p>    

    <p>
        <button type="submit">Send</button>
    </p>

</form>


        <h1>Multiple Choice Test</h1>

<!-- Question 2 -->

<p>What is your favorite sport?</p>

<form>

<label for="q1a">
        <input type="radio" id="q1a" name=q1 value="football">Football>
</label>

<label for="q1b">
        <input type="radio" id="q1b" name=q1 value="baseball">Baseball>
</label>

<label for="q1c">
        <input type="radio" id="q1c" name=q1 value="basketball">Basketball>
</label>

<label for="q1d">
        <input type="radio" id="q1d" name=q1 value="hockey">Hockey>
</label>

  <!-- Question 2 -->

<p>What is your favorite color?</p>

<label for="q1a">
        <input type="radio" id="q1a" name=q1 value="red">Red>
</label>

<label for="q1b">
        <input type="radio" id="q1b" name=q1 value="orange">Orange>
</label>

<label for="q1c">
        <input type="radio" id="q1c" name=q1 value="yellow">Yellow>
</label>

<label for="q1d">
        <input type="radio" id="q1d" name=q1 value="purple">Purple>

<br>


</form>



</body>


</html>



