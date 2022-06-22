<?php

function getMovieDetail($db)
{
    $prepared = $db->prepare("
    SELECT m.movie_id,
        title,
        publication_year,
        duration,
        [description],
        p.firstname + ' ' + p.lastname AS cast_member,
        p2.firstname + ' ' + p2.lastname AS director,
        mg.genre_name
    FROM Movie m
        LEFT JOIN Movie_Cast mc
        ON m.movie_id = mc.movie_id
        LEFT JOIN Person p
        ON mc.person_id = p.person_id
        LEFT JOIN Movie_Director md
        ON m.movie_id = md.movie_id
        LEFT JOIN Person p2
        ON md.person_id = p2.person_id
        LEFT JOIN Movie_Genre mg
        ON m.movie_id = mg.movie_id
    WHERE m.movie_id = :id
    ");

    return $prepared;
}
