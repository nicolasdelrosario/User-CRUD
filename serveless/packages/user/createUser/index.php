<?php
function main(array $args) : array
{
    $host = getenv("HOST");
    $username = getenv("USERNAME");
    $password = getenv("PASSWORD");
    $database = getenv("DATABASE");
    header("Access-Control-Allow-Origin: *");

    $mysqli = mysqli_init();
    $mysqli->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
    $mysqli->real_connect($host, $username, $password, $database);

    $name = $args["name"];
    $lastname = $args["lastname"];
    $occupation = $args["occupation"];

    $database_result = $mysqli -> query("insert into user(name, lastname, occupation) values('$name', '$lastname', '$occupation'");

    $mysqli->close();
    return ["body" => $args];
}