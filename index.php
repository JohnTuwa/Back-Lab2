<?php
    $link = mysqli_connect("localhost", "root", "");
    if ($link) {
        echo "Connected to server", "<br>";
    } else {
        echo "Failed to connect";
    }

    // Назва бази даних
    $db = "StudentsDB";
    // Підключення до бази даних
    $query = "CREATE DATABASE IF NOT EXISTS $db";

    $create_db = mysqli_query($link, $query);
    if($create_db) {
        echo "Database $db created successfully";
    } else {
        echo "Failed to create database";
    }
?>
<br>
<a href="students.php">See students</a><br> <!-- Гіперпосилання на таблицю студентів -->
<a href="workplaces.php">See workplaces</a> <!-- Гіперпосилання на таблицю місць практики -->