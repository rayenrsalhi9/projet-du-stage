<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "signup_mvc/signup_model.inc.php";
        require_once "signup_mvc/signup_contr.inc.php";

        // error handlers
        $errors = [];

        if (fields_empty($first_name, $last_name, $email, $pwd)) {
            $errors["empty_fields"] = "Fill in all fields.";
        }

        if (invalid_email($email)) {
            $errors["invalid_email"] = "Invalid email.";
        }

        if (used_email($pdo, $email)) {
            $errors["used_email"] = "Email already signed up with, try another one.";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["signup_errors"] = $errors;
            $input_data = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email
            ];
            $_SESSION["input_data"] = $input_data;

            header("Location: ../forms/signup/signup.php");
            die();
        }

        create_user($pdo, $first_name, $last_name, $email, $pwd);

        header("Location: ../forms/signup/signup.php?signup=successful");
        $pdo = null;
        $stmt = null;
        die();
        
    } catch(PDOException $e) {
        echo "An error occured : ". $e->getMessage();
    }
} else {
    header("Location: ../forms/signup/signup.php");
    die();
}