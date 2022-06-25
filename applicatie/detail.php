<?php
require_once 'utils/setup.php';
require_once 'db_connectie.php';
require_once 'data/get_movie_detail.php';

$db = maakVerbinding();

$id = htmlspecialchars($_GET["id"] ?? "", ENT_QUOTES);

$title;
$publication_year;
$genres = array();
$cast_members = array();
$director;
$description;
$duration;

if (strlen($id) < 1) {
    header("Location: index.php");
} else {
    $movie_prepared_statement = get_movie_detail($db);
    $movie_prepared_statement->execute(array(
        ':id' => intval($id)
    ));
    while ($r = $movie_prepared_statement->fetch(PDO::FETCH_ASSOC)) {
        $title = str_replace('"', '', $r['title']);
        $publication_year = $r['publication_year'] ?: 'unkown';
        $director = $r['director'] ?: 'unkown';
        $cast_members[] = $r['cast_member'] ?: 'unkown';
        $description = $r['description'] ?: 'unkown';
        $duration = $r['duration'] ?: 'unkown';

        if (isset($r['genre_name'])) {
            $genres[] = $r['genre_name'];
        }
    }

    // remove duplicate if any
    $genres = array_unique($genres);
    $cast_members = array_unique($cast_members);
}


include('views/detail_view.php');
