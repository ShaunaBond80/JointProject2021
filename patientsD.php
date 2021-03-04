<h2>Patients Database </h2>


<?php
$sql = "SELECT id, content FROM testtable1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo '<table><tr><th>id</th><th>Content</th></tr>';
while($row = $result->fetch_assoc()) {
$id = $row['id'];
$content = $row['content'];
echo "<tr><td>$id</td><td>$content</td></tr>";
}
echo '</table>';
} else {
echo '<p>There are no new patients</p>';
}
?>

<h3>Delete Everything</h3>

<form method="post">
<button type="submit" name="delete-everything">Delete Everything!</button>
</form>
</body>
</html>