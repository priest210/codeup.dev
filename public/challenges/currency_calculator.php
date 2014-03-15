<?php
// The Challenge:

// Write a program that converts US dollars to other euros, british pounds and pesos.

// Use the following currency convertions:

// 1 US dollar = 0.73 euros
// 1 US dollar = 0.60 british pounds
// 1 US dollar = 13 pesos

// The user will enter the amount of money in US dollars, 

$dollar = 1.00;
$euro = ($dollar * .73);
$pound = ($dollar * .60);
$peso = ($dollar / 13);

echo $peso;

// then he/she will be prompted to choose the currency they want to covert it to in the following way.

// "Enter the amount that you want want to convert: $"

// After the amount has been entered, the user should be prompted to choose the currency they want to convert to

// "What currency do you want to convert to? (E)uros, (P)esos, (B)ritish Pounds: "

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Currency Calculator</title>

    <!-- Bootstrap -->
    <link href="css/cyborg-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/cyborg-bootstrap.css">
    <link rel="stylesheet" href="/css/currency-calc-css.css">

  </head>
  <body>
    <h1>U.S Dollar Currency Converter</h1>

    <div class="jumbotron">
	  <h3>Enter U.S Dollar Amount Below</h3>
	  
	  <div class="row">
		  <div class="col-md-4">
		  	<div class="input-group">
			  <span class="input-group-addon">$</span>
			  <input method="GET" action="todo-list.php" for="amount" id="convert" type="text" class="form-control">
			  <span class="input-group-addon">.00</span>
			</div>
		  </div>

		  <div class="col-md-4">
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    Currency Type <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			    <li><a href="#euro">Euros</a></li>
			    <li><a href="#pound">British Pounds</a></li>
			    <li><a href="#peso">Pesos</a></li>
			  </ul>
			</div>
		  </div>	
	  </div>
	
 	 <div class="row">
  		<div class="col-md-4">
	  	<h3>Converted Amount</h3>
		  <h4><span class="text-success">converted amount will print here</span></h4>
		  
		</div>
		</div>
	</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>