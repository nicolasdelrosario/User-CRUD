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

    $iduser = $args["iduser"];
    $database_result = $mysqli -> query("DELETE FROM user WHERE iduser = '$iduser'");
    $mysqli->close();
    return ["body" => $args];
}