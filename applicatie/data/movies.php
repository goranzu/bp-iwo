<?php

function getAllMovies($db)
{
    $allMoviesQuery = $db->query('SELECT movie_id, title, publication_year FROM Movie
                     ORDER BY title;');
    return $allMoviesQuery;
}
