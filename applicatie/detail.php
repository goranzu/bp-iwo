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

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="css/index.css">
    <title>Detail Page</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <p class="logo-text">
                    <a href="/">flet<span class="uppercase">nix</span></a>
                </p>
            </div>
            <?php
            if (isset($_SESSION['email'])) {
            ?>
                <nav class="main-nav">
                    <ul>
                        <li class=<?php echo $currentPage === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                        <li class=<?php echo $currentPage === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About Us</a></li>
                        <!-- <li class=<?php echo $currentPage === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li> -->
                    </ul>
                </nav>
                <div class="user">
                    <p class="fs-300 fs-italic id-email"><?= $_SESSION['email'] ?></p>
                    <form action="/functions/logout.php" method="post">
                        <button type="submit" class="logout-btn fs-300 fs-italic">Logout</button>
                    </form>
                </div>
            <?php
            } else {
            ?>
                <nav class="main-nav">
                    <ul>
                        <li class=<?php echo $currentPage === 'index.php' ? "active" : "inactive"; ?>><a href="/">Home</a></li>
                        <li class=<?php echo $currentPage === 'about.php' ? "active" : "inactive"; ?>><a href="/about.php">About Us</a></li>
                        <!-- <li class=<?php echo $currentPage === 'contact.php' ? "active" : "inactive"; ?>><a href="/contact.php">Contact</a></li> -->
                        <li class=<?php
                                    echo $currentPage === 'register.php' ? "active" : "inactive"; ?>>
                            <a href="/register.php">Register</a>
                        </li>
                    </ul>
                </nav>
            <?php
            }
            ?>
        </header>

        <div class="container">
            <main>
                <section class="movie-detail">
                    <div class="detail-image">
                        <img src="/images/batman.jpg" alt="movie poster" />
                    </div>
                    <div class="detail-text">
                        <div class="detail-heading">
                            <div class="detail-title">
                                <h1 class="fs-xl"><?= $title ?></h1>
                                <span class="fs-300">(<?= $publicationYear ?>)</span>
                            </div>
                            <?php
                            if (count($genres) > 0) {
                            ?>
                                <div class="detail-genre">
                                    <?php
                                    foreach ($genres as $genre) {
                                        echo '<span class="genre-tag fs-300 fs-italic">' . $genre . '</span>';
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="detail-info">
                            <div>
                                <p class="fs-italic fs-300 f-clr-100">Director:</p>
                                <p><?= $director ?></p>
                            </div>
                            <p class="fs-italic fs-300 f-clr-100">Cast:</p>
                            <ul>
                                <?php
                                foreach ($castMembers as $castMember) {
                                    echo '<li>' . $castMember . '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="detail-summary">
                            <p class="fs-italic f-clr-100 fs-300">Summary:</p>
                            <p>
                                <?= $description ?>
                            </p>
                        </div>
                        <div class="detail-duration">
                            <p class="fs-italic f-clr-100 fs-300">Duration:</p>
                            <p><?= $duration ?> minutes</p>
                        </div>
                    </div>
                </section>
            </main>

            <?php
            echoFooter();
            ?>
        </div>
    </div>
</body>

</html>