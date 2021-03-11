<?php

if (isset($_POST['submitUpload']) && isset($_FILES['targetFile'])) {

    $error_int = $_FILES['targetFile']['error'];

    $fileSize = $_FILES['targetFile']['size'];

    $upload_dir = 'C:/xampp/htdocs/uploads/';

    $targetFile = $upload_dir . $_FILES['targetFile']['name'];


    $path_info = pathinfo($_FILES["targetFile"]["name"]);

    $tmpName = $_FILES["targetFile"]["tmp_name"];


    $fileType = ['png', 'jpg', 'jpeg', 'gif'];

    if ($error_int === 1) {
        echo "File is too large | The uploaded file exceeds the upload_max_filesize.";
    } // IF EMPTY FILE
    elseif ($error_int === 4) {
        header('Location: index.php');
        exit;
    } elseif ($fileSize > 1048576) {
        echo "The file size is over 1MB, that's why this file is not allowed to upload.";
    } // IF THE FILE EXTENSION IS NOT IN ARRAY
    elseif (!in_array($path_info['extension'], $fileType)) {
        echo "Please choose an Image file.";
    } else {

        $number = 1;
        while (file_exists($targetFile)) {
            $targetFile = $upload_dir . $path_info['filename'] . '-' . $number . '.' . $path_info['extension'];
            $number++;
        }

        $is_uploaded = move_uploaded_file($tmpName, $targetFile);

        if ($is_uploaded) {
            echo "The file uploaded successfully";
        } else {
            echo "The file not uploaded.";
        }

    }

    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Order</title>
    <style>
        body {
            line-height: 2.0;
            color: black;
            background-color: #e9e9e9;
            font-family: "Times New Roman";
            font-size: 20px;
        }

        /* Add a black background color to the top navigation */
        .topnav {
            background-color: #e9e9e9;
            overflow: hidden;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Add a color to the active/current link */
        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }
        .topnav .search-container {
            float: right;
        }

        .topnav input[type=text] {
            float: right;
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

        @media screen and (max-width: 600px) {
            .topnav .search-container {
                float: none;
            }
            .topnav a, .topnav input[type=text], .topnav .search-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }
            .topnav input[type=text] {
                border: 1px solid #ccc;
            }
        }
        textarea{
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="topnav">
    <a class="active" href="Homepage.html">Home</a>
    <a href="Cars.html">Car Sales</a>
    <a href="#contact">Contact</a>
    <a href="http://localhost/Greyson%20Auto%20Shop/Car%20Order.php">Car Order</a>
    <a href="http://localhost/Login/signup.php">Login</a>
    <div class="search-container">
        <form action="Payment.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
<h1><u>CAR ORDER</u></h1>
<h2><u>Owner Information Details</u></h2>
<form action="Payment.html" target="_blank">
    <label for="fname">First Name:</label>
    <input type="text" id="fname" placeholder="First Name" required><br>

    <label for="mname">Middle Name:</label>
    <input type="text" id="mname" placeholder="Middle Name" required><br>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" placeholder="Last Name" required><br>

    <label for="Gender 1">Male:</label>
    <input type="radio" id="Gender 1">

    <label for="Gender 2">Female:</label>
    <input type="radio" id="Gender 2">

    <label for="Gender 3">Other:</label>
    <input type="radio" id="Gender 3"><br>

    <label for="dates">Date Of Birth:</label>
    <input type="date" id="dates" required><br>

    <label for="emailaddress">E-mail Address:</label>
    <input type="email" id="emailaddress" placeholder="abcd@gmail.com" required><br>

    <label for="phone">Telephone Number:</label>
    <input type="tel" id="phone"name="phone" placeholder="123-45-678" required><br>

    <label for="address">Mailing Address:</label>
    <input type="number" value="address" placeholder="1234-567" required><br>

    <label for="address">Street Number:</label>
    <input type="text" id="address" required><br>

    <label for="car model">Select Car Model:</label>
    <select name="car model" id="car model">
        <option value="none"></option>
        <option value="2020 Nissan Altima">2020 Nissan Altima</option>
        <option value="Aston Martin">Aston Martin</option>
        <option value="Acura TLX">Acura TLX</option>
        <option value="Audi R4">Audi R4</option>
        <option value="2020 Chevrolet Corvette ">2020 Chevrolet Corvette</option>
        <option value="Toyota Camry">Toyota Camry</option>
        <option value="Maserati Mc20">Maserati Mc20</option>
        <option value="Tesla Model X">Tesla Model X</option>
        <option value="Genesis G80">Genesis G80</option>
        <option value="GMC HUMMER EV">GMC HUMMER EV</option>
        <option value="Kia K5">Kia K5</option>
        <option value="Porsche 911">Porsche 911</option>

    </select><br>

    <textarea name="message" cols="70" rows="20" placeholder="Describe the car features to your satisfaction both
interior and exterior.How you want your car delivered etc; with a gift bow?"></textarea><br>

    <label for="week">Week for the car to be delivered:</label>
    <input type="week" id="week" name="week" required><br>

    <label for="amount">Car Whole Pricing (KES):</label>
    <input type="number" id="amount" placeholder="KES" required>

    <p>Kindly attach a copy of your <b>Identification Card, your Passport and Birth Certificate</b>.This is will
        help with the Verification Process to know if it's fraud.</p>

    <form action="./index.php" method="POST" enctype="multipart/form-data">
        <label for="myFile"><b>Select file to upload:</b></label><br>
        <input type="file" name="targetFile" id="myFile">
        <input type="submit" name="submitUpload" value="Upload">
    </form>

    <input type="reset">
    <input type="submit" value="Submit">


</form>

</body>
</html>

