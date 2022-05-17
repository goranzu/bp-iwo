<?php
$movieTitle = $_GET["title"];

// gebruik de title als input voor de database query.
// let op capitalizatie etc...
echo "<p>" . "movie title: " .  $movieTitle . "</p>";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <title>Detail Page</title>
</head>

<body>
    <h1 class="fs-xl">Batman Pagina</h1>
</body>

</html>