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

include('views/index_view.php');
