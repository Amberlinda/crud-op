<!DOCTYPE html>
<html>

<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
    <?php

$conn = new mysqli("localhost","root","","example");




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
    if($conn->connect_error)
    {
        die("Connection failed :".$conn->connect_error);
    }else{
        echo "connection successfull";
    }
    
    if(isset($_POST["delete"]))
    {
        echo "yeah";
        $id = $_POST["id"];
        $sql = "DELETE FROM firstexample WHERE id = '$id'";
        if($conn->query($sql) === true)
        {
            echo "deletion successfull";
        }
        else{
            echo "deletion unsuccessfull".$conn->error;
        }
    
    }
    
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
            <label for="id">ID</label><br>
            <input type="number" name="id" placeholder="id to delete" pattern="[1-9]{1,}" required>
        </div>
        <div>
            <input type="submit" value="delete" name="delete">
        </div>

    </form>


</body>

</html>