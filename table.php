<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @AlaCode
//-------------------------

// ------- Sql Code -------
include("config.php");

mysqli_multi_query(
    $conn,
    "CREATE TABLE `users` (
        `id` bigint PRIMARY KEY,
        `step` varchar(20),
        `accunt` varchar(20),
        `coin` bigint
        ) default charset = utf8mb4;
        CREATE TABLE `off_on` (
        `bot_res` varchar(200) DEFAULT 'ok'
        ) default charset = utf8mb4;
        CREATE TABLE `zarib` (
        `zarib` varchar(200) DEFAULT 'ranrom'
        ) default charset = utf8mb4;
        CREATE TABLE `pay` (
        `id` bigint,
        `coin_pay` text
        ) default charset = utf8mb4;
        CREATE TABLE `ress` (
        `id` bigint
        ) default charset = utf8mb4;");
    if (mysqli_connect_errno()) {
    echo "به دلیل مشکل زیر، اتصال برقرار نشد : <br />" . mysqli_connect_error();
    die();
}
echo "دیتابیس متصل و نصب شد .";

mysqli_close($conn);
?>