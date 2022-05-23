<?php
require_once 'functions/getPage.php';

$movieTitle = $_GET["title"];

$currentPage = getCurrentPage();

// gebruik de title als input voor de database query.
// let op capitalizatie etc...
// echo "<p>" . "movie title: " .  $movieTitle . "</p>";
?>

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
    <title>Detail Page</title>
</head>

<body>
    <div class="container">
        <header>
            <div>
                <p class="logo-text">
                    <a href="/">flet<span class="uppercase">nix</span></a>
                </p>
            </div>
            <nav class="main-nav">
                <ul>
                    <li class=<?php echo $currentPage === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                    <li class=<?php echo $currentPage === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About Us</a></li>
                    <li class=<?php echo $currentPage === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li>
                    <li class=<?php echo $currentPage === 'register.php' ? "active" : "inactive"; ?>><a href="/register.php">Register</a></li>
                </ul>
                <button class="menu-btn" aria-labelledby="menu-btn-label">
                    <span id="menu-btn-label" class="sr-only">
                        Open the mobile navigation menu.
                    </span>
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg> </button>
            </nav>
        </header>

        <main>
            <section class="movie-detail">
                <div class="detail-image">
                    <img src="/images/batman.jpg" alt="movie poster" />
                </div>

                <div class="detail-text">
                    <div class="detail-heading">
                        <div class="detail-title">
                            <h1 class="fs-xl">Batman</h1>
                            <span class="fs-300">(2022)</span>
                        </div>
                        <div class="detail-genre">
                            <span class="genre-tag fs-300 fs-italic">Action</span>
                            <span class="genre-tag fs-300 fs-italic">Adventure</span>
                            <span class="genre-tag fs-300 fs-italic">Mystery</span>
                        </div>
                    </div>

                    <div class="detail-info">
                        <div>
                            <p class="fs-italic fs-300 f-clr-100">Director:</p>
                            <p>Matt Reeves</p>
                        </div>
                        <p class="fs-italic fs-300 f-clr-100">Cast:</p>
                        <ul>
                            <li>Robert Pattinson</li>
                            <li>Zoe Kravitz</li>
                            <li>Jeffrey Wright</li>
                        </ul>
                    </div>

                    <div class="detail-summary fs-300">
                        <p class="fs-italic f-clr-100">Summary:</p>
                        <p>
                            When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the city's hidden corruption and question his family's involvement.
                        </p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>