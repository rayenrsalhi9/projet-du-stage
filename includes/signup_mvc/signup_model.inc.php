<?php

declare(strict_types= 1);

function search_email(object $pdo, string $email) {
    $sql = "
        select email
        from users
        where email = :email;
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function insert_user(object $pdo, string $first_name, string $last_name, string $email, string $pwd) {
    $sql = "
        insert into users
        (first_name, last_name, email, pwd)
        values
        (:first_name, :last_name, :email, :pwd);
    ";

    $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT, ["cost" => 12]);

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":first_name", $first_name);
    $stmt->bindParam(":last_name", $last_name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashed_pwd);
    $stmt->execute();
}