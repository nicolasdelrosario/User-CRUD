<?php
function main(array $args) : array
{
    $host = getenv("HOST");
    $username = getenv("USERNAME");
    $password = getenv("PASSWORD");
    $database = getenv("DATABASE");

    $mysqli = mysqli_init();
    $mysqli->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
    $mysqli->real_connect($host, $username, $password, $database);

    $iduser = $args["iduser"];
    $name = $args["name"];
    $lastname = $args["lastname"];
    $occupation = $args["occupation"];

    $database_result = $mysqli -> query("UPDATE user SET name='$name', lastname='$lastname', occupation='$occupation' WHERE iduser='$iduser'");
    $mysqli->close();
    return ["body" => $args];
}