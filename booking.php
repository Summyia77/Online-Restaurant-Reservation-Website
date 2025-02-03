<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Reservation</title>
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
            background-image:url("https://img.freepik.com/free-photo/assortment-different-snacks-top-view-copyspace_144627-22887.jpg?t=st=1738255884~exp=1738259484~hmac=3b4ab64ebb078290d40be632ea8b4bb68f68a8bf56a841669ddd2136823883ab&w=826") ; /* Light Grey background */
    /* background: url('background-image.jpg'); Replace with your desired background image */
    background-size: cover;
    display: flex;
     background-repeat: no-repeat;;
    background-attachment: fixed;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 180vh;
    margin: 0;
    padding-top:150px;
        }

        .container {
            width: 600px;
            margin-top: 3px;
             background: rgba(14, 13, 14, 0.76); /* Semi-transparent white background */
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    padding: 40px;
    }

        h2 {
          
            text-align: center;
            margin: 30px 30px;
            color: white; /* Dark Grey heading color */
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: white; /* Slightly darker label color */
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="date"],
        input[type="time"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd; /* Light grey border */
            border-radius: 5px;
            box-sizing: border-box; /* Include padding and border in width */
        }

        textarea {
            height: 120px;
        }

        button {
            background-color:rgb(247, 30, 181);
            color: black;
            padding: 15px 25px;
            border: none;
            font-weight: 700;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: blue; /* Slightly darker green on hover */
        }
        span{
  margin-left:2px;
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
a{
    font-weight: 700;
    font-size:20px;
}
    </style>
</head>
<body>
<a href="#" class="logo" style="font-size:35px;color:black" >Food <span>Fun</span></a>
<p style="color:black; text-align:center;font-size:15px;margin-bottom:9px;">Online Reservation In FoodFun Resturent</p>

    <div class="container">
        <h2>Restaurant Reservation</h2>
        <form action="booking.php" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <label for="guests">Number of Guests:</label>
            <input type="number" id="guests" name="guests" min="1" required>

            <label for="seating">Seating Preference:</label>
            <select id="seating" name="seating">
                <option value="">Select</option>
                <option value="window">Window</option>
                <option value="non-smoking">Non-Smoking</option>
                <option value="booth">Booth</option>
            </select>

            <label for="occasion">Occasion (Optional):</label>
            <select id="occasion" name="occasion">
                <option value="">Select</option>
                <option value="birthday">Birthday</option>
                <option value="anniversary">Anniversary</option>
                <option value="other">Other</option>
            </select>

            <label for="message">Special Requests:</label>
            <textarea id="message" name="message" placeholder="e.g., dietary restrictions, allergies"></textarea>

            <button type="submit">Make Reservation</button>
        </form>
    </div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];
    $seating = $_POST['seating'];
    $occasion = $_POST['occasion'];
    $message = $_POST['message'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($phone) == 11) {


    // Database connection (replace with your actual credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "food website"; 

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check for connection errors
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO reservations (name, phone, email, date, time, guests, seating, occasion, message) 
            VALUES ('$name', '$phone', '$email', '$date', '$time', '$guests', '$seating', '$occasion', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Reservation made successfully!");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }

    mysqli_close($conn);
}
    else{
        echo '<script>alert("Invalid Email format or phone !");</script>';
        mysqli_close($conn);
    }
 
}
?>
</body>
</html>