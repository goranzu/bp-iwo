<?php

function get_genre_options($db)
{
    $sql = 'SELECT DISTINCT genre_name FROM Movie_Genre;';
    $query = $db->query($sql);
    $genre_options = '';

    while ($r = $query->fetch()) {
        $genre_name = $r['genre_name'];
        $genre_options = $genre_options . '<option value="' . strtolower($genre_name) . '">' . $genre_name . '</option>';
    }

    return $genre_options;
}
