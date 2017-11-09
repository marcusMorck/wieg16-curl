<?php
include "config.php";

$query = "INSERT INTO user (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':username', $_POST['username']);
$stmt->bindParam(':password', $_POST['password']);
$stmt->execute();
