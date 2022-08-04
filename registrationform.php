<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
include 'dbconnection.php';
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];  
    $cpassword=$_POST['cpassword'];  
    if($password!=$cpassword)
    {
      echo "Both Password Should be Same";
    }
    else{
      $hash=password_hash($password,PASSWORD_DEFAULT);
    
$sql="Select * from registrationform where username='$username'";
$result=mysqli_query($conn,$sql);
if($result)
{
    $num=mysqli_num_rows($result);
    if($num>0)
    {
        echo "User is already exists";
    }
    else{
        $sql="insert into `registrationform` (username,email,password) values('$username','$email','$hash')";
            $result=mysqli_query($conn,$sql);
            if($result)
    {
    
    header('location:index.php');
    echo "SignUp Sucessfull";
}
else
{
    die(mysqli_error($conn));
}
    }
}
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
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
    <title>Signup </title>
  </head>
  <body>
    <h1 class="text-center">Register</h1>
   <div class ="container mt-5">
    <form method="POST">
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username"
      autocomplete="off"pattern="[A-Z a-z 0-9]{3,20}"
       title="USER SHOULD BE  BETWEEN 3 TO 12 CHARACTERS" required>
    
  </div>  
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control"   name="email"  autocomplete="off"
    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$"title="Mustcontain.and after 3characters one special character"  required>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control"  name="password" autocomplete="off"  
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, 
  and at least 8 or more characters"required>
  </div>
  <div class="mb-3">
    <label class="form-label">Confirm Password</label>
    <input type="password" class="form-control"  name="cpassword" autocomplete="off"required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Register</button>
  <div >Already a user? &nbsp;&nbsp;&nbsp; <button type="submit"name="submit" ><a href="index.php" class="btn btn-primary">Login</a></button>    
</div>
    </form>
</div>

  </body>
  </head>
</html>