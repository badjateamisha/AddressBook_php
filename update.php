<?php
include 'dbconnection.php';
$id=$_GET['updateid'];
$sql="Select * from employeedetails where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$email=$row['email'];
$mobile=$row['mobile'];
$address=$row['address'];
$salary=$row['salary'];
$rating=$row['rating'];

if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $salary=$_POST['salary'];
    $rating=$_POST['rating'];

    $sql="update employeedetails set id=$id,firstname='$firstname',lastname='$lastname',
    email='$email',mobile='$mobile',address='$address',salary='$salary',rating='$rating'
    where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
    header('location:dashboard.php');
    }
else
{
    die(mysqli_error($conn));
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>form</title>
  </head>
  <body>
    
    <div class ="container my-5">
    <form method="post">
  <div class="form-group">
    <label>firstname</label>
    <input type="text" class="form-control"  placeholder="Enter your Name" name="firstname" value="<?php
    echo $firstname;?>">
    </div>
  <div class="form-group">
    <label >lastname</label>
    <input type="text" class="form-control"  placeholder="Enter Last Name" name="lastname" value="<?php
    echo $lastname;?>">
  </div>
  <div class="form-group">
    <label >email</label>
    <input type="email" class="form-control"  placeholder="Enter Your Email" name="email" value="<?php
    echo $email;?>">
  </div>
  <div class="form-group">
    <label >mobile</label>
    <input type="num" class="form-control"  placeholder="Enter Mobile Number" name="mobile" value="<?php
    echo $mobile;?>">
  </div>
  <div class="form-group">
    <label >address</label>
    <input type="text" class="form-control"  placeholder="Enter Your Address" name="address" value="<?php
    echo $address;?>">
  </div>
  <div class="form-group">
    <label >Salary</label>
    <input type="num" class="form-control"  placeholder="Enter Your salary" name="salary" value="<?php
    echo $salary;?>">
  </div>
  <div class="form-group">
    <label >Rating</label>
    <input type="num" class="form-control"  placeholder="Enter Your rating" name="rating" value="<?php
    echo $rating;?>">
  </div>
  <button type="update" class="btn btn-primary" name="submit">Update</button> 
</form>
   
  
  </body>
</html>
<?php
