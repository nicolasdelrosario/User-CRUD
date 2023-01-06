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

    $iduser = $args["iduser"];
    $database_result = $mysqli -> query("DELETE FROM user WHERE iduser = '$iduser'");
    $mysqli->close();
    return ["body" => $args];
}