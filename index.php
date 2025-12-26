<?php
$insert=false;
//if(isset($_POST['name'])){
 //set conn variable   
$server="localhost";
$username="root";
$password="";
//create a connection
$con=mysqli_connect($server,$username,$password,"trip");
//check for conn success
if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}if(isset($_POST['submit'])){
//echo "Success connecting to the db";
//collect post var
$name=$_POST['name'];//not start with digit if else
$gender=$_POST['gender'];
$age=$_POST['age'];//age less than 40 as clg student
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['desc'];//not many character only 40
$sql="INSERT INTO `trip`(`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
//echo $sql;
//execute the query
if(mysqli_query($con,$sql))
{//flag for successful insertion
    $insert=true;
//echo "Successfully inserted";
}
else{
    echo "ERROR:".mysqli_error($con);
}
}
//close database conn
$con->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg"src="bg.jpg" alt="KCMT">
    <div class="container">
        <h1>Welcome to KCMT Dubai Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
       <?php
       if($insert==true){
        echo "<p class='submitMsg'>Thanks for submitting your form.We are happy to see you joining us for the Trip</p>";
        }
         ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <!--<button class="btn">Submit</button>-->
            <input type="submit"name="submit"value="submit"class="btn">

        </form>

    </div>
    <script src="index.js"></script>
</body>

</html>

<!--INSERT INTO `trip` (`S.no.`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testName', '23', 'male', 'this@this.com', '9999999999', 'this is my first ever myphpadmin page', current_timestamp());
