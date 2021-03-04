<?php
//$dbc = mysqli_connect('root@localhost:3306', 'root', 'root', 'teepee’') or die('Error connecting to MySQL server.');
$dbc = mysqli_connect('pdickie01.web.eeecs.qub.ac.uk', 'pdickie01', 'r3h43b55b22ls9gp', 'pdickie01') or die('Error connecting to MySQL server.');
$name_of_investor = $_POST['nameOinvestor'];
$company_invested_in = $_POST['companyInvestedIn'];
$stock_symbol = $_POST['stockSymbol'];
$query = "INSERT INTO investments (name_of_investor, company_invested_in, stock_symbol)" .
"VALUES (‘$name_of_investor’, ‘$company_invested_in’, ‘$stock_symbol’)";
mysqli_query($dbc, $query) or die('Error querying database.');
echo 'Customer added.';
mysqli_close($dbc);
?>