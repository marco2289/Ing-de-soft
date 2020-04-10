<?php
 // CREATE CONNECTION
$conn = mysqli_connect('localhost', 'root', '', 'sobsuza');

// FETCH DATA
$sql = mysqli_query($conn, "SELECT * FROM medicines");

// STORE DATA IN result VARIABLE
$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

exit(json_encode($result));
