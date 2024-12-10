<?php

declare(strict_types= 1);

function search_email(object $pdo, string $email) {
    $sql = "
        select * from users
        where email = :email;
    ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}