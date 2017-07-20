<?php

include "db.php";

$sql = "SELECT * FROM messages INNER JOIN users ON messages.id=users.messageID";
$rows = mysqli_query($db, $sql);

while($row = mysqli_fetch_assoc($rows)) {				
	echo "<b>$row[username]</b> $row[message] <br>";
}
