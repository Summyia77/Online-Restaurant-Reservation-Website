<!DOCTYPE html>
<html>
<head>
<title>Signup Page</title>
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
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
p{
    color:white
}
.signup-container {
    background: white; /* Semi-transparent white background */
    border-radius: 10px;
    background: rgba(14, 13, 14, 0.76); /* Semi-transparent white background */
    padding: 40px;
    text-align: center;
    width: 600px;
}

h2 {
    margin-bottom: 30px;
    color: white;
}
input[type="age"],
input[type="text"],
input[type="password"],
input[type="email"] { /* Added for email input */
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
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
.login-link {
    margin-top: 20px;
 color:rgb(247, 30, 181);
    text-decoration: none;
}
.login-link:hover {
      color: rgb(138, 138, 236); /* Slightly darker green on hover */
        }.logo{
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
<a href="#" class="logo">Food <span>Fun</span></a>
<p style="color:black; text-align:center;font-size:15px;margin-bottom:9px;">Online Reservation In FoodFun Resturent</p>

<form action="signup.php" method="post">
<div class="signup-container">

    <h2>Signup</h2>
    <input type="text" placeholder="Username" required name="name">
    <input type="age" placeholder="age" required name="age">

    <input type="email" placeholder="Email" required name="email"> 
    <input type="password" placeholder="Strong 8 digit password" required name="passwor">
    <button type="submit">Signup</button>
    <p color:white >Already have an account? <a href="login.php" class="login-link" target="_blank">Login</a></p>
</div>
</form>
<!-- php code -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
    $email = $_POST['email'];
    $name = $_POST['name'];
    $passwor = $_POST['passwor'];
    $age = $_POST['age'];
    if ((filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/[A-Z]/', $passwor) && preg_match('/[a-z]/', $passwor) && preg_match('/[0-9]/', $passwor) && preg_match('/[^a-zA-Z0-9]/', $passwor) && strlen($passwor) >= 8)) {

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "food website";

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check for connection errors
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insertion
    $insert = "INSERT INTO `signup` (`name`, `email`, `age`, `password`) VALUES ('$name', '$email', '$age', '$passwor')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        echo '<script>alert("Signup Successfully ' . $name . '!");</script>';
        echo '<script>window.location.href = "p.php";</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }

    mysqli_close($conn); }
    else{
                echo '<script>alert("Invalid Email format or password !");</script>';

    }

} 
?>


?>
</body>
</html>