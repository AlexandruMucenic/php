<?php
$db_conn_string = "host=localhost port=5432 dbname=x user=x password=x";
$db = pg_connect($db_conn_string);

if (!$db) {
    die("Connection failed: " . pg_last_error());
}