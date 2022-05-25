<?php
require_once 'functions/setup.php';

if (isset($_SESSION['email'])) {
    header('Location: index.php');
}

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

    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="css/index.css">
    <title>Register for fletNIX</title>
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

        <main class="login">

            <form action="/login.php" method="post" class="register-form">
                <h1 class="fs-xl">Login</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>

            <p class="fs-300 fs-italic reg-link">
                Don't have an account yet? Click <a href="/register.php">here</a> to create one.
            </p>
        </main>

        <?php
        echoFooter();
        ?>
    </div>
</body>

</html>