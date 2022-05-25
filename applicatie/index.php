<?php
require_once 'functions/setup.php';

require_once 'db_connectie.php';
require_once 'data/movies.php';


$db = maakVerbinding();
$testThumbnailAmount = 10;

$searchTerm = htmlspecialchars($_POST["searchTerm"] ?? "", ENT_QUOTES);
$genre = htmlspecialchars($_POST["genre"] ?? "", ENT_QUOTES);

$allMoviesQuery = getAllMovies($db);


// var_dump($allMoviesQuery);

// $movies = $query->fetchAll(PDO::FETCH_OBJ);

// while ($r = $query->fetch(PDO::FETCH_OBJ)) {
//     echo $r->title;
// }

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
    <title>fletNIX</title>
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
            if (isset($_SESSION['email'])) {
            ?>
                <nav class="main-nav">
                    <ul>
                        <li class=<?php echo $currentPage === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                        <li class=<?php echo $currentPage === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About Us</a></li>
                        <!-- <li class=<?php echo $currentPage === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li> -->
                    </ul>
                </nav>
                <div class="user">
                    <p class="fs-300 fs-italic id-email"><?= $_SESSION['email'] ?></p>
                    <form action="/functions/logout.php" method="post">
                        <button type="submit" class="logout-btn fs-300 fs-italic">Logout</button>
                    </form>
                </div>
            <?php
            } else {
            ?>
                <nav class="main-nav">
                    <ul>
                        <li class=<?php echo $currentPage === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                        <li class=<?php echo $currentPage === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About Us</a></li>
                        <!-- <li class=<?php echo $currentPage === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li> -->
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

        <main>
            <section>
                <div class="filter-controls">
                    <div class="genre">
                        <form action="/" method="post" class="genre-form">
                            <label for="genre" class="sr-only">
                                Genre:
                            </label>
                            <select id="genre" name="genre">
                                <option disabled selected value="">Genre</option>
                                <option value="action">Action</option>
                                <option value="adventure">Adventure</option>
                                <option value="comedy">Comedy</option>
                            </select>
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                    <form action="/search" method="post" class="search">
                        <label for="searchTerm">
                            Search:
                        </label>
                        <input type="text" name="searchTerm" id="searchTerm">
                    </form>
                </div>
            </section>

            <section class="movie-overview">
                <h1 class="fs-xl">
                    Movies Overview
                </h1>
                <div class="movie-grid">
                    <!-- <?php
                            if ($allMoviesQuery->rowCount()) {
                                while ($r = $allMoviesQuery->fetch(PDO::FETCH_OBJ)) {
                                    // echo '<p>' . $r->title . '</p>';
                                    echo "
                                <article>
                                    <div>
                                        <h3>{$r->title}</h3>
                                        <h3>{$r->cover_image}</h3>
                                    </div>
                                </article>
                            ";
                                }
                            } else {
                                echo '<p>No movies in database</p>';
                            }
                            ?> -->
                    <?php
                    for ($i = 0; $i < $testThumbnailAmount; $i++) {
                        echo '<a href="/detail.php?title=batman" class="card-link">
                        <article class="card">
                            <div class="card-image">
                                <img src="/images/batman.jpg" alt="batman" />
                            </div>
                            <div class="card-title">
                                <h3>Batman</h3><span class="fs-300">(2022)</span>
                            </div>
                        </article>
                    </a>';
                    }
                    ?>
            </section>

        </main>

        <?php
        echoFooter();
        ?>
    </div>
</body>

</html>