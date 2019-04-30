<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
//echo "$q";
$dbServername = 'localhost';
$theuser = 'root';
$pass = 'saskee';
$database_name = 'test_data';
$con = mysqli_connect($dbServername,$theuser,$pass,$database_name);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//echo $con;
mysqli_select_db($con,"test_data");
$table_select = 'members'.($q);
$sql="SELECT * FROM $table_select";
$result = mysqli_query($con,$sql);

//echo $sql; 
//echo "THIS IS RESULT".$result;

echo "<table>
<tr>
<th>#</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Username</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['#']."</td>";
    echo "<td>" . $row['Firstname'] . "</td>";
    echo "<td>" . $row['Lastname'] . "</td>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>