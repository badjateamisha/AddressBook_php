<?php
include 'dbconnection.php';
// $sql = "CREATE TABLE employeedetails(
//          id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//          firstname VARCHAR(50) NOT NULL UNIQUE,
//             lastname VARCHAR(50) NOT NULL UNIQUE,
//          email varchar(255),
//           mobile varchar(255),
//           address varchar(255)
//          )";
        
//          if ($conn->query($sql) === TRUE) {
//            echo "Table MyGuests created successfully";
//          } else {
//            echo "Error creating table: " . $conn->error;
//          }
if(isset($_POST['submit']))
{
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address']; 
    $salary=$_POST['salary'];
    $rating=$_POST['rating'];

    $sql="insert into employeedetails (firstname,lastname,email,mobile,address,salary,rating) 
    values('$firstname','$lastname','$email','$mobile','$address','$salary','$rating')";
    $result=mysqli_query($conn ,$sql);
    if($result)
    {
        echo '<script>alert("Data Inserted")</script>';
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
    <h1 class="text-center">Employee Details</h1>
    <div class ="container my-5">
    <form method="POST" action="">
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control"  placeholder="Enter First Name" name="firstname"
    pattern="[A-Z a-z 0-9]{1,15}"
       title="USER SHOULD BE  BETWEEN 6 TO 12 CHARACTERS" >
    <label >Last Name</label>
    <input type="text" class="form-control"  placeholder="Enter Last Name" name="lastname"
    pattern="[A-Z a-z 0-9]{1,15}"
       title="USER SHOULD BE  BETWEEN 6 TO 12 CHARACTERS">
    <label >Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email ID" name="email"
    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$" >
    <label >Mobile Number</label>
    <input type="num" class="form-control"  placeholder="Enter Mobile Number" name="mobile"
    pattern="[0-9]{2}-[0-9]{10}">
    <label >Address</label>
    <input type="text" class="form-control"  placeholder="Enter address" name="address">
    <label >Salary</label>
    <input type="num" class="form-control"  placeholder="Enter salary" name="salary"
    pattern="[0-9]{3-10}">
    <label >Rating</label>
    <input type="num" class="form-control"  placeholder="Enter rating" name="rating"
    pattern="[0-9]">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="search" placeholder="Enter detail to search">
  <button type ="submit"  name='search_btn' class="button1" >Search</button>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <select name="Selectoption" id="select">
    
    <option value="email">email</option>
    <option value="mobile"> mobile</option>
    
    <option value="salary">salary</option>
    <option value="rating">rating</option>

  </select> 
  <button type ="submit" name="sort" class="button1" >Sort</button>

</form>
<table class="table">
                  <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Address</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Rating</th>

                      </tr>
                    </thead>
                    <tbody>

    
                <?php
$sql="Select * from employeedetails ";

$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
        $id=$row['id'];
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $address=$row['address'];
        $salary=$row['salary'];
        $rating=$row['rating'];

        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$firstname.'</td>
        <td>'.$lastname.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$address.'</td>
        <td>'.$salary.'</td>
        <td>'.$rating.'</td>

        <td>
        <button class=button1><a href="update.php? updateid='.$id.'">Update</a></button>
        <button class=button2><a href="delete.php? deleteid='.$id.'">Delete</a></button>
    </td>
        </tr>'; 

                  if(isset($_POST['sort']))
                  {
                    $value_filter=$_POST['Selectoption'];
                    $sql="SELECT * FROM employeedetails order by $value_filter ";
                    $result=mysqli_query($conn,$sql);
                    if( mysqli_num_rows($result)>0)
                    {
                      while($row=mysqli_fetch_array($result))
                      { $id=$row['id'];
                        $firstname=$row['firstname'];
                        $lastname=$row['lastname'];
                        $email=$row['email'];
                        $mobile=$row['mobile'];
                        $address=$row['address'];
                        $salary=$row['salary'];
                        $rating=$row['rating'];
                        echo'<tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$firstname.'</td>
                        <td>'.$lastname.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mobile.'</td>
                        <td>'.$address.'</td>
                        <td>'.$salary.'</td>
                        <td>'.$rating.'</td>
                        <td>
                        <button class=button1><a href="update.php? updateid='.$id.'">Update</a></button>
                        <button class=button2><a href="delete.php? deleteid='.$id.'">Delete</a></button>
                
                    </td>
                        </tr>';
                      }
                    }
                    else{
                        echo '<script>alert("No record found")</script>';                    }
                  }
                  ?>
                  <?php
                  if(isset($_POST['search_btn']))
                  {
                    $value_filter=$_POST['search'];
                    $sql="SELECT * FROM employeedetails WHERE CONCAT(firstname,lastname,address) LIKE '%$value_filter%' ";
                    $result=mysqli_query($conn,$sql);
                    if( mysqli_num_rows($result)>0)
                    {
                      while($row=mysqli_fetch_array($result))
                      {
                        $id=$row['id'];
                        $firstname=$row['firstname'];
                        $lastname=$row['lastname'];
                        $email=$row['email'];
                        $mobile=$row['mobile'];
                        $address=$row['address'];
                        $salary=$row['salary'];
                        $rating=$row['rating'];
                        echo'<tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$firstname.'</td>
                        <td>'.$lastname.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mobile.'</td>
                        <td>'.$address.'</td>
                        <td>'.$salary.'</td>
                        <td>'.$rating.'</td>
                        <td>
                        <button class=button1><a href="update.php? updateid='.$id.'">Update</a></button>
                        <button class=button2><a href="delete.php? deleteid='.$id.'">Delete</a></button>
                
                    </td>
                        </tr>';
                      }
                    }
                    else{
                        echo '<script>alert("No record found")</script>';                    }
                  }
                }
                  ?>
                          
  </tbody>
</table>
</div>

   
  
  </body>
</html>
