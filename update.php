<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">

    <?php 



$server_name = "localhost";
$dbname = "example";
$user = "root";
$pass = "";

$conn = new mysqli($server_name,$user,$pass,$dbname);


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

        <?php
        
        if($conn->connect_error)
{
    die("Connection failed : ".$conn->connect_error);
    
}

    echo "connection successfull";
    if(isset($_POST["update"]))
    {
        $id = $_POST["id"];
        $fname = $_POST["fname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $sql = "UPDATE firstexample SET name='$fname',phone_no='$phone',address='$address' WHERE id = '$id'";
        if($conn->query($sql) === true)
        {
            echo "update succesfull";
        }else{
            echo "update unsuccesfull".$conn->error;
        }
        
    }
        
        ?>

    </nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-elements">
            <label>ID</label>
            <input type="number" placeholder="Your id" name="id" pattern="[1-9]{1,}" required>
        </div>
        <div class="form-elements">
            <label>Full Name</label>
            <input type="text" placeholder="Your name" name="fname" pattern="[a-zA-Z]{1,}" required>
        </div>
        <div class="form-elements">
            <label>mobile number</label>
            <input type="tel" placeholder="Your number" name="phone" min="10" pattern="[1-9]{1,}" required>
        </div>
        <div class="form-elements">
            <label>address</label>
            <input type="text" placeholder="Your address" name="address" pattern="[a-zA-Z]{1,}" required>
        </div>
        <div class="form-elements">
            <input type="submit" name="update" value="update">
            <input type="reset" value="reset">
        </div>

    </form>

</body </html>