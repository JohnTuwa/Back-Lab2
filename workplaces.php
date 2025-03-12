<?php
$link = mysqli_connect("localhost", "admin", "admin");

$db = "StudentsDB";
$select = mysqli_select_db($link, $db);
if($select){
    echo "Successfully selected $db", "<br>";
} else {
    echo "Failed to select $db";
}

// По дефолту сортуємо по полю id
$sortBy = "id"; 

// По натисканню кнопки у формі сортування змінюємо поле по якому сортуємо
if (isset($_POST['sortBy']) && $_POST['sortBy'] === "workplace_name") {
    $sortBy = "workplace_name";
}

$query = "SELECT * FROM workplaces ORDER BY $sortBy";
$response = mysqli_query($link, $query);
?>

<!-- Кнопка зміни поля сортування -->
<form method="post">
    <input type="hidden" name="sortBy" value="<?php echo ($sortBy === "id") ? "workplace_name" : "id"; ?>">
    <button type="submit">Sort by <?php echo ($sortBy === "id") ? "Name" : "ID"; ?></button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Workplace Name</th>
        <th>Workplace City</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
    while ($workplace = mysqli_fetch_assoc($response)) {
        echo "<tr>";
        echo '<td><a href="student.php?student_id=' . $workplace['id'] . '">' . $workplace['id'] . '</a></td>';
        echo "<td>" . $workplace['workplace_name'] . "</td>";
        echo "<td>" . $workplace['workplace_city'] . "</td>";
        echo '<td><a href="editWorkplc.php?workplace_id=' . $workplace['id'] . '">' . 'edit' . '</a></td>';
        echo '<td><a href="delWorkplc.php?workplace_id=' . $workplace['id'] . '">' . 'delete' . '</a></td>';
        echo "</tr>";
    }
    ?>
</table>
<p></p>
<a href="index.php">To main page</a><br>
