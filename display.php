
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">

<?php

$server_name = "localhost";
$user = "root";
$pass = "";
$dbname = "example";

$conn = new mysqli($server_name,$user,$pass,$dbname);

if($conn->connect_error)
{
    die("connection failed : ".$conn->connect_error);
}

$sql = "SELECT * FROM firstexample";
$result = $conn->query($sql);
?>

</head>
<body>

<nav>
        <ul class="main-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="display.php">Display</a></li>
            <li><a href="delete.php">Delete</a></li>
            <li><a href="update.php">Update</a></li>
        </ul>

    </nav>

<?php 
if($result->num_rows > 0)
{
    echo "<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>phone</th>
        <th>address</th>
        <th>gender</th>
    </tr>";
    
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['phone_no']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "<td>".$row['gender']."</td>";
        echo "</tr>";        
    }

    echo "</table>";

}else{
    echo "0 results";
}

?>



</body>


</html>



