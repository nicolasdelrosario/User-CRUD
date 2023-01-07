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

    $database_result = $mysqli -> query("SELECT * FROM user order by occupation");
    while ($row = $database_result -> fetch_assoc()) {
        $query_result[] = $row;
    }
    echo json_encode($query_result, JSON_UNESCAPED_UNICODE);

    $mysqli->close();
    return ["body" => $query_result];
}