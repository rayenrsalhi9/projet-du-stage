<?php

declare(strict_types= 1);

function fields_empty(string $first_name, string $last_name, string $email, string $pwd) {
    if (empty($first_name) || empty($last_name) || empty($email) || empty($pwd)) {
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

function used_email(object $pdo, string $email) {
    if (search_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
} 

function create_user(object $pdo, string $first_name, string $last_name, string $email, string $pwd) {
    insert_user($pdo, $first_name, $last_name, $email, $pwd);
}