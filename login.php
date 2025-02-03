<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Salsa&display=swap');
*{
    font-family: 'Lobster', sans-serif;
    font-family: 'Salsa', cursive;
padding: 0;
margin: 0;
box-sizing: border-box;
text-decoration: none;

list-style: none;
scroll-behavior: smooth;

}
body {
    background-image:url("https://img.freepik.com/premium-photo/food-background-with-spices-two-sandwiches-aragula-white-background-top-view_646474-2351.jpg?w=826") ; /* Light Grey background */
    /* background: url('background-image.jpg'); Replace with your desired background image */
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.login-container {
    background: rgba(14, 13, 14, 0.76); /* Semi-transparent white background */
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  padding: 40px;
  text-align: center;
}

h2 {
  margin-bottom: 30px;
  color: white;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}
button #al{
  color:white
}
button {
    background-color:rgb(247, 30, 181);
    color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
button:hover {
            background-color: blue; /* Slightly darker green on hover */
        }
.signup-link {
  margin-top: 20px;
  color:rgb(247, 30, 181);
  text-decoration: none;
}
.signup-link:hover {
      color: rgb(138, 138, 236); /* Slightly darker green on hover */
        }
p{
    color:white
}
.logo{
  display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom:10px;
    font-size: 38px;
    font-weight: 700;
    color: var(--text-color);
}
span{
  margin-left:4px;
    color: var(--main-color);
}:root{
    --text-color:black;
    --main-color:rgb(233, 99, 204);
    --second-color:rgb(96, 99, 96);
    --bg-color:rgb(255, 255, 255);
    --big-font:4.5rem;
    --h2-font:2.6rem;
    --p-font:1.1rem;
}
</style>
</head>
<body>
<form action="login.php" method="post">
<a href="#" class="logo">Food <span>Fun</span></a>
<p style="color:black; text-align:center;font-size:15px;margin-bottom:9px;">Online Reservation In FoodFun Resturent</p>
<div class="login-container">
  <h2>Login</h2>
  <input type="text" placeholder="Username" required name="name">
  <input type="password" placeholder="Password" required name="passwor">
  <button type="submit">Login</button>
  <p>Don't have an account? <a href="signup.php"  target="_blank" class="signup-link">Sign Up</a></p>
</div>
</form>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
    $name = $_POST['name'];
    $passwor = $_POST['passwor'];
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "food website";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
    // Insertion
    $query = "SELECT * FROM signup WHERE password = '$passwor' AND name = '$name'  " ;
    $result = mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result) == 0){
   
    //  '<script>document.getElementById("al").href = "p.php";</script>';
     echo '<script>alert("Login Fail");</script>';

    }
    else{
      echo '<script>alert("Successfully Login!");</script>';
     echo '<script>window.location.href = "p.php";</script>';
    }

 

    mysqli_close($conn); 

} 
?>
</body>
</html>