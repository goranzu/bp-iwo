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
        <?php include('components/header.php') ?>

        <main class="register">

            <section class="contract-types">
                <p>
                    We have <?= $contract_types_amount ?> contract types that you can choose from.
                </p>
                <div class="types-row">
                    <?= $contract_types_html ?>
                </div>
            </section>

            <form action="/utils/handle_register.php" method="post" class="register-form">
                <h1 class="fs-xl">Create account</h1>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="first_name" required>
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="last_name" required>
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
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                </div>

                <div class="form-group">
                    <label for="contract">
                        Contract Type:
                    </label>
                    <select id="contract" name="contract" required>
                        <option disabled selected value="">Select your contract type</option>
                        <?php
                        echo $contract_type_options;
                        ?>
                    </select>
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
                    <label for="card_number">
                        Card Number:
                    </label>
                    <input type="number" name="card_number" id="card_number" required>
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
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="f">
                </div>

                <div class="form-group">
                    <label for="birth_date">
                        Birth Date:
                    </label>
                    <input type="date" name="birth_date" id="birth_date">
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
        include('components/footer.php');
        ?>
    </div>
</body>

</html>