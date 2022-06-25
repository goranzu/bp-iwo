<?php

session_start();

require_once '../db_connectie.php';

$db = maakVerbinding();

$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$username = $_POST['username'];

// check if passwords match
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$contract = $_POST['contract'];
$payment = $_POST['payment'];
$card_number = $_POST['card_number'];
$country = $_POST['country'];
$gender = $_POST['gender'];
$birth_date = $_POST['birth_date'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$user_insert_sql = '
    INSERT INTO Customer (
        [customer_mail_address],
        [lastname],
        [firstname],
        [payment_method],
        [payment_card_number],
        [contract_type],
        [subscription_start],
        [user_name],
        [password],
        [country_name],
        [gender],
        [birth_date]
        )
    VALUES (
        :email,
        :last_name,
        :first_name,
        :payment,
        :card_number,
        :contract,
        GETDATE(),
        :username,
        :hashed_password,
        :country,
        :gender,
        :birth_date
    );
';

$insert_user_query = $db->prepare($user_insert_sql);
$insert_user_query->execute(array(
    ':email' => $email,
    ':last_name' => $last_name,
    ':first_name' => $first_name,
    ':payment' => $payment,
    ':card_number' => $card_number,
    ':contract' => $contract,
    ':username' => $username,
    ':hashed_password' => $hashed_password,
    ':country' => $country,
    ':gender' => $gender,
    ':birth_date' => $birth_date
));

$_SESSION['email'] = $email;

var_dump($first_name);
var_dump($last_name);
var_dump($email);
var_dump($username);
var_dump($password);
var_dump($confirm_password);
var_dump($contract);
var_dump($payment);
var_dump($country);
var_dump($gender);
var_dump($birth_date);
// save the user in database here`

// header('Location: /index.php');