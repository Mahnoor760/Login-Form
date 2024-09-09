<?php
$servername="localhost";
$username="root";
$password="";
$db="fileupload";

$con = mysqli_connect($servername, $username, $password, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_FILES["files"])) {
    $name = $_FILES["files"]["name"];
    $tmpname = $_FILES["files"]["tmp_name"];
    $type = $_FILES["files"]["type"];
    $size = $_FILES["files"]["size"];
    $path = "images/" . $name; // Construct path

    // Check if the file is a PDF or other allowed types (you can add more types)
    if ($type == "application/pdf") {

        $upload = move_uploaded_file($tmpname, $path);

        if ($upload) {
           
            $sqlinsert = "INSERT INTO `box` (`name`, `tmpname`, `type`, `size`, `path`) 
                          VALUES ('$name', '$tmpname', '$type', '$size', '$path')";

            $res = mysqli_query($con, $sqlinsert);

            if ($res) {
                echo "<div class='success-msg'>File uploaded successfully!</div>";
                header("Location: /images.php");
                
            } else {
                echo "<div class='error-msg'>Error saving file information to the database.</div>" . mysqli_error($con);
            }
        } else {
            echo "<div class='error-msg'>Failed to upload the file.</div>";
        }
    } else {
        echo "<div class='error-msg'>Only PDF files are allowed.</div>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="file"] {
            display: block;
            margin-bottom: 20px;
            padding: 8px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-msg, .error-msg {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success-msg {
            background-color: #d4edda;
            color: #155724;
        }

        .error-msg {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Upload Your File</h1>
        <form action="fileuploading.php" method="post" enctype="multipart/form-data">
            <label for="uf">File Uploading</label>
            <input type="file" name="files" id="uf" accept=".pdf" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
