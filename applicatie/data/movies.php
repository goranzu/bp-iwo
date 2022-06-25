<?php

function get_all_movies($db)
{
    $all_movies_query = $db->query('SELECT movie_id, title, publication_year FROM Movie
                     ORDER BY title;');
    return $all_movies_query;
}
