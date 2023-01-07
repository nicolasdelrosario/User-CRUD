<?php
function main(array $args) : array
{
    $host = getenv("HOST");
    $username = getenv("USERNAME");
    $password = getenv("PASSWORD");
    $database = getenv("DATABASE");

    $mysqli = mysqli_init();
    $mysqli->ssl_set(null, null, "/etc/ssl/certs/ca-certificates.crt", null, null);
    $mysqli->real_connect($host, $username, $password, $database);

    $name = $args["name"];
    $lastname = $args["lastname"];
    $occupation = $args["occupation"];

    $database_result = $mysqli -> query("insert into user(name, lastname, occupation) values('$name', '$lastname', '$occupation')");

    $mysqli->close();
    return ["body" => $args];
}