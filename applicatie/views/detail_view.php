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
        <?php include('components/header.php') ?>

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
                                <span class="fs-300">(<?= $publication_year ?>)</span>
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
                                foreach ($cast_members as $cast_member) {
                                    echo '<li>' . $cast_member . '</li>';
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

            <iframe width="420" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY">
            </iframe>

            <?php
            include('components/footer.php');
            ?>
        </div>

    </div>
</body>

</html>