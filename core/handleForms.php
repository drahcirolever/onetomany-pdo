<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertArtistBtn'])) {

	$query = insertArtist($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['gender'], $_POST['dateOfBirth'], $_POST['specialization']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}

if (isset($_POST['editArtistBtn'])) {
	$query = updateArtist($pdo, $_POST['firstName'], $_POST['lastName'],$_POST['gender'], 
		$_POST['dateOfBirth'], $_POST['specialization'], $_GET['artist_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}

if (isset($_POST['deleteArtistBtn'])) {
	$query = deleteArtist($pdo, $_GET['artist_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertNewProjectBtn'])) {
	$query = insertProject($pdo, $_POST['projectName'], $_POST['genre'], $_GET['artist_id']);

	if ($query) {
		header("Location: ../viewprojects.php?artist_id=" .$_GET['artist_id']);
	}
	else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editProjectBtn'])) {
	$query = updateProject($pdo, $_POST['projectName'], $_POST['genre'], $_GET['project_id']);

	if ($query) {
		header("Location: ../viewprojects.php?artist_id=" .$_GET['artist_id']);
	}
	else {
		echo "Update failed";
	}

}

if (isset($_POST['deleteProjectBtn'])) {
	$query = deleteProject($pdo, $_GET['project_id']);

	if ($query) {
		header("Location: ../viewprojects.php?artist_id=" .$_GET['artist_id']);
	}
	else {
		echo "Deletion failed";
	}
}



