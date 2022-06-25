<?php
require_once 'utils/setup.php';

require_once 'db_connectie.php';
require_once 'data/movies.php';
require_once 'data/get_genre_options.php';
require_once 'data/get_select_options.php';
require_once 'views/components/movie_card.php';
require_once 'data/get_filtered_movies.php';
require_once 'data/movie_search.php';

$db = maakVerbinding();

// dit moet een get zijn, hetzelfde verhaal als $genre
$title = htmlspecialchars($_GET["title"] ?? "", ENT_QUOTES);

$genre = htmlspecialchars($_GET["genre"] ?? "", ENT_QUOTES);


$genre_sql = 'SELECT DISTINCT genre_name FROM Movie_Genre;';
$genre_options = get_select_options($db, $genre_sql, 'genre_name');

// film html maken
$movies_query;
$movies_html = '';
$overview_of = 'All Movies';

if (strlen($genre) > 0) {
    // dit is prepared statement omdat ik input van de gebruiker krijg
    $movies_query = get_filter_movies_by_genre($db);
    $movies_query->execute(array(
        ':genre' => strtolower($genre)
    ));

    $overview_of = ucwords($genre);
} else if (strlen($title) > 0) {
    $movies_query = movie_search($db);

    $movies_query->execute(array(
        ':title' => '%' . strtolower($title) . '%'
    ));
} else {
    // hier gebruik geen gebruiker input maar haal alle films op
    // daarom geen prepared statement
    $movies_query = get_all_movies($db);
}

while ($r = $movies_query->fetch(PDO::FETCH_ASSOC)) {
    $movies_html .= main_page_card($r['movie_id'], str_replace('"', '', $r['title']), $r['publication_year']);
}

include('views/index_view.php');
