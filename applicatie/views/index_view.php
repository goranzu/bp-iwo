<!DOCTYPE html>
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
    <title>fletNIX</title>
</head>

<body>
    <div class="container">
        <?php include('components/header.php') ?>
        <main>
            <section>
                <div class="filter-controls">
                    <div class="genre">
                        <form action="index.php" method="" class="genre-form">
                            <label for="genre" class="sr-only">
                                Genre:
                            </label>
                            <select id="genre" name="genre">
                                <option disabled selected value="">Genre</option>
                                <?= $genre_options ?>
                            </select>
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                    <form action="index.php" method="" class="search">
                        <label for="title">
                            Search:
                        </label>
                        <input type="text" name="title" id="title">
                    </form>
                </div>
            </section>

            <section class="movie-overview">
                <h1 class="fs-xl">
                    Movies Overview
                </h1>
                <div class="overview">
                    <?= $overview_of ?>
                </div>
                <div class="movie-grid">
                    <?= $movies_html ?>
            </section>

        </main>
        <?php
        include('components/footer.php');
        ?>
    </div>
</body>

</html>