<?php
    $link = mysqli_connect("localhost", "admin", "admin");

    $db = "StudentsDB";
    $select = mysqli_select_db($link, $db);
    if($select){
        echo "Successfully selected $db", "<br>";
    } else {
        echo "Failed to select $db";
    }

    // Створення таблиці students в базі даних
    $query = "CREATE TABLE students (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        last_name VARCHAR(50) NOT NULL,
        birth_year YEAR NOT NULL,
        gender ENUM('Чоловік', 'Жінка') NOT NULL,
        group_name VARCHAR(20) NOT NULL,
        faculty VARCHAR(100) NOT NULL,
        avg_grade DECIMAL(3,2) CHECK (avg_grade BETWEEN 0 AND 10),
        workplace_id SMALLINT NOT NULL,
        FOREIGN KEY (workplace_id) REFERENCES workplaces(id))";

    $create_tbl = mysqli_query($link, $query);
    if($create_tbl){
        echo "Table created", "<br>";
    } else {
        echo "Failed to create table";
    }
?>