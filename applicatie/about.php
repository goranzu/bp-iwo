<?php
require_once 'functions/getPage.php';

session_start();

$currentPage = getCurrentPage();

$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="css/index.css">
    <title>About fletNIX</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <p class="logo-text">
                    <a href="/">flet<span class="uppercase">nix</span></a>
                </p>
            </div>
            <?php
            if (isset($email)) {
            ?>
                <nav class="main-nav">
                    <ul>
                        <li class=<?php echo $currentPage === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                        <li class=<?php echo $currentPage === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About Us</a></li>
                        <li class=<?php echo $currentPage === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li>
                    </ul>
                </nav>
                <p class="fs-300 fs-italic id-email"><?= $email ?></p>
            <?php
            } else {
            ?>
                <nav class="main-nav">
                    <ul>
                        <li class=<?php echo $currentPage === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                        <li class=<?php echo $currentPage === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About Us</a></li>
                        <li class=<?php echo $currentPage === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li>
                        <li class=<?php
                                    echo $currentPage === 'register.php' ? "active" : "inactive"; ?>>
                            <a href="/register.php">Register</a>
                        </li>
                    </ul>
                </nav>
            <?php
            }
            ?>
        </header>

        <div class="container about">
            <section>
                <h1 class="fs-xl">
                    About Us
                </h1>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quod provident possimus voluptatem quidem neque qui, architecto quia est eligendi excepturi fugit a, officia quam? Vel deleniti in voluptates minima.
                </p>

            </section>

            <section>
                <h2>
                    More info
                </h2>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quo consequuntur magnam minus. Nemo, dolorem architecto enim dolorum aliquid rem harum quasi accusantium, natus quo nulla deserunt voluptas debitis quibusdam.
                </p>
            </section>
        </div>
    </div>
</body>

</html>