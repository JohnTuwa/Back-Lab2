<?php
$link = mysqli_connect("localhost", "admin", "admin");

$db = "StudentsDB";
$select = mysqli_select_db($link, $db);
if($select){
    echo "Successfully selected $db", "<br>";
} else {
    echo "Failed to select $db";
}

$query = "SELECT * FROM students";

$response = mysqli_query($link, $query);
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>Birth Year</th>
        <th>Gender</th>
        <th>Group Name</th>
        <th>Faculty</th>
        <th>Average Grade</th>
        <th>Workplace ID</th>
    </tr>

    <?php
    while ($list = mysqli_fetch_array($response)) {
        echo "<tr>";
        echo "<td>" . $list['id'] . "</td>";
        echo "<td>" . $list['last_name'] . "</td>";
        echo "<td>" . $list['birth_year'] . "</td>";
        echo "<td>" . $list['gender'] . "</td>";
        echo "<td>" . $list['group_name'] . "</td>";
        echo "<td>" . $list['faculty'] . "</td>";
        echo "<td>" . $list['avg_grade'] . "</td>";
        echo '<td><a href="workplace.php?workplace_id=' . $list['workplace_id'] . '">' . $list['workplace_id'] . '</a></td>';
        echo "</tr>";
    }
    ?>
</table>
