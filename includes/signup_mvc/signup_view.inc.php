<?php

declare(strict_types= 1);

function display_form() {
    if (isset($_SESSION["input_data"]["first_name"])) {
        echo "
            <div class='mb-3'>
                <label for='first_name' class='form-label'>First name</label>
                <input type='text' class='form-control' name='first_name' value = ".$_SESSION["input_data"]["first_name"].">
            </div>
        ";
    } else {
        echo "
            <div class='mb-3'>
                <label for='first_name' class='form-label'>First name</label>
                <input type='text' class='form-control' name='first_name'>
            </div>
        ";
    }

    if (isset($_SESSION["input_data"]["last_name"])) {
        echo "
            <div class='mb-3'>
                <label for='last_name' class='form-label'>Last name</label>
                <input type='text' class='form-control' name='last_name' value = ".$_SESSION["input_data"]["last_name"].">
            </div>
        ";
    } else {
        echo "
            <div class='mb-3'>
                <label for='last_name' class='form-label'>Last name</label>
                <input type='text' class='form-control' name='last_name'>
            </div>
        ";
    }

    if (isset($_SESSION["input_data"]["email"]) && !isset($_SESSION["signup_errors"]["invalid_email"]) && !isset($_SESSION["signup_errors"]["used_email"])) {
        echo "
            <div class='mb-3'>
                <label for='email' class='form-label'>Email</label>
                <input type='email' class='form-control' name='email' value = ".$_SESSION["input_data"]["email"].">
            </div>
        ";
    } else {
        echo "
            <div class='mb-3'>
                <label for='email' class='form-label'>Email</label>
                <input type='email' class='form-control' name='email'>
            </div>
        ";
    }

    echo "
        <div class='mb-3'>
            <label for='pwd' class='form-label'>Password</label>
            <input type='password' class='form-control' name='pwd'>
        </div>
        <p class='form-text'>Already having an account?<a href='../signin/signin.php'> Sign in</a></p>
        <button type='submit' class='btn btn-dark submit-button'>Create account</button>
    ";

    
}

function check_signup_errors() {
    if (isset($_SESSION["signup_errors"])) {
        $errors = $_SESSION["signup_errors"];
        foreach( $errors as $error ) {
            echo '<p style="color:red; text-align:center;">'.$error.'</p>';
        }
        unset($_SESSION["signup_errors"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "successful") {
        echo '<p style="color:green; text-align:center;">Account created successfully.</p>';
    }
}