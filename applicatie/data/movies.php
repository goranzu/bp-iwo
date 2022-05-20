<?php

function getAllMovies($db)
{
    $allMoviesQuery = $db->query('SELECT * FROM Movie
                     ORDER BY title;');
    return $allMoviesQuery;
}
