<?php
function get_filter_movies_by_genre($db)
{
    $prepared = $db->prepare('
        SELECT movie_id, title, publication_year
        FROM Movie
        WHERE movie_id IN (
            SELECT movie_id
            FROM Movie_Genre
            WHERE lower(genre_name) = :genre
        )
    ');

    return $prepared;
}
