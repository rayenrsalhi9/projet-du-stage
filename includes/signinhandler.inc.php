<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "login_mvc/login_model.inc.php";
        require_once "login_mvc/login_contr.inc.php";

        // error handlers
        $errors = [];

        if (empty_fields($email, $pwd)) {
            $errors["empty_fields"] = "Please fill in all fields";
        }

        if (invalid_email($email)) {
            $errors["invalid_email"] = "Invalid email entered.";
        }

        if (email_not_found($pdo, $email)) {
            $errors["email_not_found"] = "No account matches the entered email.";
        }

        if (!empty_fields($email, $pwd) && !email_not_found($pdo, $email) && incorrect_password($pdo, $email, $pwd)) {
            $errors["incorrect_password"] = "Incorrect password, try again.";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["login_errors"] = $errors;

            header("Location: ../forms/signin/signin.php");
            die();
        }

        $new_session_id = session_create_id();
        $session_id = $new_session_id . "_" . search_email($pdo, $email)["id"];
        session_id($session_id);

        $_SESSION["user_id"] = search_email($pdo, $email)["id"];
        $_SESSION["user_fname"] = htmlspecialchars(search_email($pdo, $email)["first_name"]);
        $_SESSION["user_lname"] = htmlspecialchars(search_email($pdo, $email)["last_name"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: ../forms/signin/signin.php?login=successful");
        $pdo = null;
        $stmt = null;
        die();


    } catch(PDOException $e) {
        echo "An error occured : ". $e->getMessage();
    }
} else {
    header("Location: ../forms/signin/signin.php");
    die();
}