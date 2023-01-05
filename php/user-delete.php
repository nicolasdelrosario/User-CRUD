<?php
define('DB_SERVER_URL', 'us-east.connect.psdb.cloud');
define('DB_USERNAME', 'odulyxa067w19zx2nxji');
define('DB_PASSWORD', 'pscale_pw_5pjsUEuroOWeCUm5qYlAkWAawruPAYiUOWAR5Brkdt9');
define('DB_DATABASE_NAME', 'competo');

function main(array $args): array
{
    header("Access-Control-Allow-Origin: *");
    $database_connection = mysqli_init();
    $database_connection->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
    $database_connection->real_connect(DB_SERVER_URL, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

    $iduser = $args["iduser"];
    $database_result = $database_connection->query("DELETE FROM user WHERE iduser = '$iduser' ");
    $database_connection->close();
    return ["body" => $args];
}
