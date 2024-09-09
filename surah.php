<?php


if (isset($_POST["snum"])) {


    $snumber = $_POST["snum"];

    $response = file_get_contents("https://api.alquran.cloud/v1/surah/$snumber/ar.abdurrahmaansudais");
    $response = json_decode($response, true);

    // print_r($response);
    $dataQuran = $response["data"]["ayahs"] ;
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400..700&display=swap" rel="stylesheet">

    
    <style>
        body {
            direction: rtl;
            font-family: 'Amiri Quran', serif;
            background-color:#f9f9f9;
            font-size:29px;
            text-align:center;
            background-color: #FFF3C2;
            color: #54530a; 
           
        }


    </style>
</head>

<body>



    <?php


    foreach ($dataQuran as  $value) {
        echo '<p>' . $value["text"] . '</p>';
        echo '<audio controls src="'.$value["audio"].'"></audio>';
       
     

    }


    ?>
</body>

 
</html>