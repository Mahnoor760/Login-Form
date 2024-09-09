<?php

$response = file_get_contents("http://api.alquran.cloud/v1/meta");
$response = json_decode($response, true);

$dataQuranIndex = $response["data"]["surahs"]["references"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quran Surahs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400..700&display=swap" rel="stylesheet">
    <style>
    
        body {
            direction: rtl;
            font-family: "jameel";
            background-color: #FFF3C2;
            color: #54530a; 
}
        h1 {
    direction: ltr;
    color: #034A01;
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px;
    font-family: serif;
    font-size: 2.3rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    transition: color 0.4s ease, transform 0.4s ease, text-shadow 0.4s ease;
}
 h1:hover {
    color: #0c5717; 
    transform: scale(1.05); 
    text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5); 
}
        .card {
            margin: 0 auto; 
            margin-bottom: 20px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-color: #d4af37;
            border-width: 8px;
            background-color: #FFF3C2;
            color: #54530a; 
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
    transform: translateY(-20px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    border-color: #034A01;  
} 
.card-text {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 10px;
}

        .card-title {
            font-size: 20px;
            color: #333;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .btn {
    background-color: #54530a; 
    border-color: #d4af37; 
    color: white;
}

.btn:hover {
    background-color: #d4af37; 
    color: #ffffff; 
    border-color:  black ;
}
    </style>
</head>
<body>
<?php include 'base/navbar.php'?>
<br><br>

<h1><center>The QURAN of the Prophet Muhammad (صلى الله عليه و سلم)</center></h1>
<div class="container">
    <div class="container">
        <div class="row">
            <?php foreach ($dataQuranIndex as $item): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item["englishName"] ?> (<?= $item["name"] ?>)</h5>
                            <p class="card-text">Translation: <?= $item["englishNameTranslation"] ?></p>
                            <p class="card-text">Verses: <?= $item["numberOfAyahs"] ?></p>
                            <p class="card-text">Revelation Type: <?= $item["revelationType"] ?></p>
                            <form action="surah.php" method="post">
                                <input type="hidden" name="snum" value="<?= $item["number"] ?>">
                                <input class="btn btn-warning" type="submit" value="Read Surah">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
