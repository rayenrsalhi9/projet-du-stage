<?php

declare(strict_types= 1);

function empty_fields($email, $pwd) {
    if (empty($email) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function invalid_email(string $email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

function email_not_found(object $pdo, string $email) {
    if (search_email($pdo, $email)) {
        return false;
    } else {
        return true;
    }
} 

function incorrect_password(object $pdo, string $email, string $pwd) {
    $db_pwd = search_email($pdo, $email)["pwd"];
    if (password_verify($pwd, $db_pwd)) {
        return false;
    } else {
        return true;
    }
}