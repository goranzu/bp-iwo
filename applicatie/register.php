<?php
require_once 'db_connectie.php';
require_once 'functions/setup.php';
require_once 'data/get_country_options.php';
require_once 'data/get_payment_options.php';

if (isset($_SESSION['email'])) {
    header('Location: index.php');
}

$db = maakVerbinding();

$country_options = get_country_options($db);
$payment_options = get_payment_options($db);

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

        <main class="register">

            <form action="/functions/register.php" method="post" class="register-form">
                <h1 class="fs-xl">Create account</h1>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" required>
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="form-group">
                    <label for="payment">
                        Payment Method:
                    </label>
                    <select id="payment" name="payment" required>
                        <option disabled selected value="">Select your payment method</option>
                        <?php
                        echo $payment_options;
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="country">
                        Country:
                    </label>
                    <select id="country" name="country" required>
                        <option disabled selected value="">Select your country</option>
                        <?php
                        echo $country_options;
                        ?>
                    </select>
                </div>

                <div>
                    <p>Gender:</p>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="m">
                    <label for="femal">Female</label>
                    <input type="radio" name="gender" id="femal" value="f">
                </div>

                <div class="form-group">
                    <label for="birthDate">
                        Birth Date:
                    </label>
                    <input type="date" name="birthDate" id="birthDate">
                </div>
                <div class="form-group">
                    <button type="submit">Create account</button>
                </div>
            </form>

            <p class="fs-300 fs-italic reg-link">
                Already have an account? Click <a href="/login.php">here</a> to login.
            </p>
        </main>

        <?php
        echoFooter();
        ?>
    </div>
</body>

</html>