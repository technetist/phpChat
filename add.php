<?php
	include "db.php";

	if (isset($_SESSION['username'])) {

		$userName = $_SESSION['username'];

		$message = $_POST['message'];

		$query = "INSERT INTO messages (message) VALUES ('$message')";

		mysqli_query($db, $query);

		$messageID = mysqli_insert_id($db);

		$userQuery = "INSERT INTO users (username, messageID) VALUES ('$userName', '$messageID')";

		mysqli_query($db, $userQuery);

	} else {
		$_SESSION['username'] = $_POST['username'];

		$userName = $_SESSION['username'];

		$message = $_POST['message'];

		$query = "INSERT INTO messages (message) VALUES ('$message')";

		mysqli_query($db, $query);

		$messageID = mysqli_insert_id($db);

		$userQuery = "INSERT INTO users (username, messageID) VALUES ('$userName', '$messageID')";

		mysqli_query($db, $userQuery);
	}