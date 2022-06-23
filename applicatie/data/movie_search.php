<?php
function movieSearch($db)
{
    $prepared = $db->prepare("
        SELECT movie_id, title, publication_year
        FROM Movie
        WHERE lower(title) LIKE :title
        ORDER BY title;
    ");

    return $prepared;
}
