<?php
require_once 'db_connectie.php';

$db = maakVerbinding();

$allMoviesQuery = $db->query('SELECT * FROM Movie
                     ORDER BY title;');
// $movies = $query->fetchAll(PDO::FETCH_OBJ);

// while ($r = $query->fetch(PDO::FETCH_OBJ)) {
//     echo $r->title;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <title>fletNIX</title>
</head>

<body>
    <div class="container">
        <header>
            <div>
                <p class="logo-text">
                    <a href="/">flet<span class="uppercase">nix</span></a>
                </p>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/register.php">Register</a></li>
                    <li><a href="/about.php">About Us</a></li>
                    <li><a href="/contact.php">Contact</a></li>
                </ul>
                <button class="menu-btn" aria-labelledby="menu-btn-label">
                    <span id="menu-btn-label" class="sr-only">
                        Open the mobile navigation menu.
                    </span>
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg> </button>
            </nav>
        </header>

        <main>
            <section>
                <div class="filter-controls">
                    <div class="genre">
                        <form action="/" method="post" class="genre-form">
                            <label for="genre" class="sr-only">
                                Genre:
                            </label>
                            <select id="genre">
                                <option disabled selected value="">Genre</option>
                                <option value="action">Action</option>
                                <option value="action">Adventure</option>
                                <option value="action">Comedy</option>
                            </select>
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                    <form action="/search" method="post" class="search">
                        <label for="search">
                            Search:
                        </label>
                        <input type="text" name="search" id="search">
                    </form>
                </div>
            </section>

            <section class="movie-overview">
                <h1 class="fs-xl">
                    Movies Overview
                </h1>
                <div class="movie-grid">
                    <?php
                    if ($allMoviesQuery->rowCount()) {
                        while ($r = $allMoviesQuery->fetch(PDO::FETCH_OBJ)) {
                            // echo '<p>' . $r->title . '</p>';
                            echo "
                                <article>
                                    <div>
                                        <h3>{$r->title}</h3>
                                        <h3>{$r->cover_image}</h3>
                                    </div>
                                </article>
                            ";
                        }
                    } else {
                        echo '<p>No movies in database</p>';
                    }
                    ?>
                    <!-- <a href="/detail.php" class="card-link">
                        <article class="card">
                            <div class="card-image">
                                <img src="/images/batman.jpg" alt="batman" />
                            </div>
                            <div class="card-text">
                                <p>Director: Matt Reeves</p>
                                <p>Stars:
                                <ul>
                                    <li>Robert Pattinson</li>
                                    <li>Zoe Kravitz</li>
                                    <li>Jeffrey Wright</li>
                                </ul>
                                </p>
                                <p>Duration: 180 minutes</p>
                            </div>
                        </article>
                    </a>
                    <article class="card">
                        <div class="card-image">
                            <img src="/images/batman.jpg" alt="batman" />
                        </div>
                        <div class="card-text">
                            <p>Director: Matt Reeves</p>
                            <p>Stars:
                            <ul>
                                <li>Robert Pattinson</li>
                                <li>Zoe Kravitz</li>
                                <li>Jeffrey Wright</li>
                            </ul>
                            </p>
                            <p>Duration: 180 minutes</p>
                        </div>
                    </article>
                    <article class="card">
                        <div class="card-image">
                            <img src="/images/batman.jpg" alt="batman" />
                        </div>
                        <div class="card-text">
                            <p>Director: Matt Reeves</p>
                            <p>Stars:
                            <ul>
                                <li>Robert Pattinson</li>
                                <li>Zoe Kravitz</li>
                                <li>Jeffrey Wright</li>
                            </ul>
                            </p>
                            <p>Duration: 180 minutes</p>
                        </div>
                    </article>
                    <article class="card">
                        <div class="card-image">
                            <img src="/images/batman.jpg" alt="batman" />
                        </div>
                        <div class="card-text">
                            <p>Director: Matt Reeves</p>
                            <p>Stars:
                            <ul>
                                <li>Robert Pattinson</li>
                                <li>Zoe Kravitz</li>
                                <li>Jeffrey Wright</li>
                            </ul>
                            </p>
                            <p>Duration: 180 minutes</p>
                        </div>
                    </article>
                    <article class="card">
                        <div class="card-image">
                            <img src="/images/batman.jpg" alt="batman" />
                        </div>
                        <div class="card-text">
                            <p>Director: Matt Reeves</p>
                            <p>Stars:
                            <ul>
                                <li>Robert Pattinson</li>
                                <li>Zoe Kravitz</li>
                                <li>Jeffrey Wright</li>
                            </ul>
                            </p>
                            <p>Duration: 180 minutes</p>
                        </div>
                    </article>
                    <article class="card">
                        <div class="card-image">
                            <img src="/images/batman.jpg" alt="batman" />
                        </div>
                        <div class="card-text">
                            <p>Director: Matt Reeves</p>
                            <p>Stars:
                            <ul>
                                <li>Robert Pattinson</li>
                                <li>Zoe Kravitz</li>
                                <li>Jeffrey Wright</li>
                            </ul>
                            </p>
                            <p>Duration: 180 minutes</p>
                        </div>
                    </article>
                    <article class="card">
                        <div class="card-image">
                            <img src="/images/batman.jpg" alt="batman" />
                        </div>
                        <div class="card-text">
                            <p>Director: Matt Reeves</p>
                            <p>Stars:
                            <ul>
                                <li>Robert Pattinson</li>
                                <li>Zoe Kravitz</li>
                                <li>Jeffrey Wright</li>
                            </ul>
                            </p>
                            <p>Duration: 180 minutes</p>
                        </div>
                    </article>
                </div> -->
            </section>

        </main>

        <footer>
            <p>
                <a href="/privacy.php">Privacy Statement</a>
            </p>
        </footer>
    </div>
</body>

</html>