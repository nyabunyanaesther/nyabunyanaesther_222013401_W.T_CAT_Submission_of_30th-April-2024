<?php
    session_start();

    if(isset($_SESSION['admin'])){
      header('location: adminhome.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Home Page</title>
    <style>
 
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo-container img {
            height: 40px; 
            width: 100px;
            margin-left: 20px; 
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
        }
        nav a:hover {
            background-color: #555;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 120px;
            z-index: 1;
        }
        .dropdown-content a {
            color: #fff;
            padding: 6px 10px;
            display: block;
            text-decoration: none;
        }
        .dropdown-content a:hover {
            background-color: #555;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }


        main {
            display: flex;
            justify-content: space-between;
            margin: 20px auto;
            max-width: 1200px;         }

        main img {
            height: 400px;
            width: 48%; 
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo-container">
            <img src="image/1.jpg" alt="Logo">
        </div>
        <a href="adminhome.php">Home</a>
        <a href="viewcandidate.php">CANDIDATE</a>
        <a href="postion.html">POSITION</a>
        <a href="votingview.php">VOTING</a>
       <a href="logout.php">LOGOUT</a>
    </nav>

    <center><h1>Welcome to Our student voting system Admin side!</h1></center>
    <main>
        <img src="image/photo.jpg" alt="Image 1">
        <img src="image/2.jpg" alt="Image 2">
    </main>

    <footer>
  &copy; 2024 STUDENT VOTING SYSTEM NYABUNYANA ESTHER GROUP TWO| All rights reserved.
    </footer>
</body>
</html>
