<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <form method="post" action="calculator.php">
	        <input name="price" type="text" class="form-control" />
            <input name="interest" type="text" class="form-control" />
            <input name="term" type="text" class="form-control" />
            <input name="downpayment" type="text" class="form-control" />
	        <select name="operation">
	        	<option value="plus">Plus</option>
	            <option value="minus">Minus</option>
	            <option value="multiply">Multiply</option>
	            <option value="divided by">Devide</option>
	        </select>
	        <input name="submit" type="submit" value="calculate" class="btn btn-primary" />
	    </form>
    </main>
    
</body>
</html>

<?php 
//PMI: Estimated at $55 per $100,000
//T&I: Estimated at $9 per $1000
//Disclaimer: This calculator is for estimation purposes only. It should not be relyed on as an accurate cost for a loan.

?>