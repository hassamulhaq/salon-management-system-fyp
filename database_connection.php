<?php

try {
    $conn = new PDO("mysql: host=localhost; dbname=salon_db", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ($e->getMessage());
}