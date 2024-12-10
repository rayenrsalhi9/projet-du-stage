<?php

declare(strict_types= 1);

function check_login_errors() {
    if (isset($_SESSION["login_errors"])) {
        $errors = $_SESSION["login_errors"];
        foreach( $errors as $error ) {
            echo '<p style="color:red; text-align:center;">'.$error.'</p>';
        }
        unset($_SESSION["login_errors"]);
    } else if (isset($_GET["login"]) && $_GET["login"] === "successful") {
        echo '<p style="color:green; text-align:center;">Login successful, redirecting to your account in seconds...</p>';
    }
}