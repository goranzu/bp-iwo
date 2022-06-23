<?php
require_once 'functions/setup.php';

require_once 'db_connectie.php';
require_once 'data/movies.php';
require_once 'data/get_genre_options.php';
require_once 'data/get_select_options.php';
require_once 'views/movie_card.php';
require_once 'data/get_filtered_movies.php';
require_once 'data/movie_search.php';

$db = maakVerbinding();

// dit moet een get zijn, hetzelfde verhaal als $genre
$title = htmlspecialchars($_GET["title"] ?? "", ENT_QUOTES);

$genre = htmlspecialchars($_GET["genre"] ?? "", ENT_QUOTES);


$genreSql = 'SELECT DISTINCT genre_name FROM Movie_Genre;';
$genre_options = get_select_options($db, $genreSql, 'genre_name');

// film html maken
$moviesQuery;
$moviesHtml = '';
$overviewOf = 'All Movies';

if (strlen($genre) > 0) {
    // dit is prepared statement omdat ik input van de gebruiker krijg
    $moviesQuery = getFilterMoviesByGenre($db);
    $moviesQuery->execute(array(
        ':genre' => strtolower($genre)
    ));

    $overviewOf = ucwords($genre);
} else if (strlen($title) > 0) {
    $moviesQuery = movieSearch($db);

    $moviesQuery->execute(array(
        ':title' => '%' . strtolower($title) . '%'
    ));
} else {
    // hier gebruik geen gebruiker input maar haal alle films op
    // daarom geen prepared statement
    $moviesQuery = getAllMovies($db);
}

while ($r = $moviesQuery->fetch(PDO::FETCH_ASSOC)) {
    $moviesHtml .= mainPageCard($r['movie_id'], str_replace('"', '', $r['title']), $r['publication_year']);
}

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
                        <form action="index.php" method="" class="genre-form">
                            <label for="genre" class="sr-only">
                                Genre:
                            </label>
                            <select id="genre" name="genre">
                                <option disabled selected value="">Genre</option>
                                <?= $genre_options ?>
                            </select>
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                    <form action="index.php" method="" class="search">
                        <label for="title">
                            Search:
                        </label>
                        <input type="text" name="title" id="title">
                    </form>
                </div>
            </section>

            <section class="movie-overview">
                <h1 class="fs-xl">
                    Movies Overview
                </h1>
                <div class="overview">
                    <?= $overviewOf ?>
                </div>
                <div class="movie-grid">
                    <?= $moviesHtml ?>
            </section>

        </main>
        <?= echoFooter() ?>
    </div>
</body>

</html>