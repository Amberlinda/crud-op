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

if($conn->connect_error)
{
    die("Connection failed : ".$conn->connect_error);
    
}

    

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
    
    if(isset($_POST["submit"]))
    {
        $fname = $_POST["fname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $gender = $_POST['gender'];
        $sql = "INSERT INTO firstexample (name,phone_no,address,gender) VALUES ('$fname',$phone,'$address','$gender')";
        if($conn->query($sql) === true)
        {
            echo "insertion succesfull";
        }else{
            echo "insertion unsuccesfull";
        }
        
    }
    
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-elements">
            <label>Full Name</label>
            <input type="text" placeholder="Your name" name="fname" pattern="[a-zA-Z]{2,}" required>
        </div>
        <div class="form-elements">
            <label>mobile number</label>
            <input type="tel" placeholder="Your number" name="phone" pattern="[1-9]{1,}" required>
        </div>
        <div class="form-elements">
            <label>address</label>
            <input type="text" placeholder="Your address" name="address" pattern="[a-zA-Z]{2,}" required>
        </div>
        <div class="form-elements">
            <label>Gender</label>
            <input type="radio" name="gender" value="male" checked>Male
            <input type="radio" name="gender" value="female" >Female
        </div>
        <div class="form-elements">
            <input type="submit" name="submit" value="submit">
            <input type="reset" value="reset">
        </div>

    </form>

</body>

</html>