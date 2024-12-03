<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // gather data

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // check non empty fields 
    $errors = false;
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $errors = true;
    }

    if (!$errors) {
        try {
            require_once "dbh.inc.php";

            $query = "
                insert into users
                (first_name, last_name, email, pwd)
                values(?, ?, ?, ?);
            ";

            $statement = $pdo -> prepare($query);

            $statement -> execute([$first_name, $last_name, $email, $password]);

            // close connection
            $pdo = null;
            $statement = null;

            // redirect to signin page
            header("Location: ../forms/signin/signin.html");

            die();

        } catch(PDOException $e) {
            die("query failed : " . $e->getMessage());
        }
    }

} else {
    header("Location: ../forms/signup/signup.html");
}