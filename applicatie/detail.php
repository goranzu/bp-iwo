<?php
require_once 'functions/setup.php';
require_once 'db_connectie.php';
require_once 'data/get_movie_detail.php';

$db = maakVerbinding();

$id = htmlspecialchars($_GET["id"] ?? "", ENT_QUOTES);

$title;
$publicationYear;
$genres = array();
$castMembers = array();
$director;
$description;
$duration;

if (strlen($id) < 1) {
    header("Location: index.php");
} else {
    $moviePreparedStatement = getMovieDetail($db);
    $moviePreparedStatement->execute(array(
        ':id' => intval($id)
    ));
    while ($r = $moviePreparedStatement->fetch(PDO::FETCH_ASSOC)) {
        $title = str_replace('"', '', $r['title']);
        $publicationYear = $r['publication_year'] ?: 'unkown';
        $director = $r['director'] ?: 'unkown';
        $castMembers[] = $r['cast_member'] ?: 'unkown';
        $description = $r['description'] ?: 'unkown';
        $duration = $r['duration'] ?: 'unkown';

        if (isset($r['genre_name'])) {
            $genres[] = $r['genre_name'];
        }
    }

    // remove duplicate if any
    $genres = array_unique($genres);
    $castMembers = array_unique($castMembers);
}


include('views/detail_view.php');
