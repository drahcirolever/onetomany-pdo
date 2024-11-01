<?php  

function insertArtist($pdo, $first_name, $last_name, $gender, 
	$date_of_birth, $specialization) {

	$sql = "INSERT INTO artist (first_name, last_name, gender, 
		date_of_birth, specialization) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender,
		$date_of_birth, $specialization]);

	if ($executeQuery) {
		return true;
	}
}

function getAllArtist($pdo) {
	$sql = "SELECT * FROM artist";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getArtistByID($pdo, $artist_id) {
	$sql = "SELECT * FROM artist WHERE artist_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$artist_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateArtist($pdo, $first_name, $last_name, $gender, 
	$date_of_birth, $specialization, $artist_id) {

	$sql = "UPDATE artist
				SET first_name = ?,
					last_name = ?,
					gender = ?,
					date_of_birth = ?, 
					specialization = ?
				WHERE artist_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$date_of_birth, $specialization, $artist_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function deleteArtist($pdo, $artist_id) {
	$deleteArtistProj = "DELETE FROM projects WHERE artist_id = ?";
	$deleteStmt = $pdo->prepare($deleteArtistProj);
	$executeDeleteQuery = $deleteStmt->execute([$artist_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM artist WHERE artist_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$artist_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

function getProjectsByArtist($pdo, $artist_id) {
	
	$sql = "SELECT 
				projects.project_id AS project_id,
				projects.project_name AS project_name,
				projects.genre AS genre,
				projects.date_added AS date_added,
				CONCAT(artist.first_name,' ',artist.last_name) AS project_owner
			FROM projects
			JOIN artist ON projects.artist_id = artist.artist_id
			WHERE projects.artist_id = ? 
			GROUP BY projects.project_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$artist_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAllInfoByArtistID($pdo, $artist_id) {
	$sql = "SELECT * FROM artist WHERE artist_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$artist_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function insertProject($pdo, $project_name, $genre, $artist_id) {
	$sql = "INSERT INTO projects (project_name, genre, artist_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $genre, $artist_id]);
	if ($executeQuery) {
		return true;
	}

}

function getProjectByID($pdo, $project_id) {
	$sql = "SELECT 
				projects.project_id AS project_id,
				projects.project_name AS project_name,
				projects.genre AS genre,
				projects.date_added AS date_added,
				CONCAT(artist.first_name,' ',artist.last_name) AS project_owner
			FROM projects
			JOIN artist ON projects.artist_id = artist.artist_id
			WHERE projects.project_id  = ? 
			GROUP BY projects.project_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateProject($pdo, $project_name, $genre, $project_id) {
	$sql = "UPDATE projects
			SET project_name = ?,
				genre = ?
			WHERE project_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $genre, $project_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteProject($pdo, $project_id) {
	$sql = "DELETE FROM projects WHERE project_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return true;
	}
}





?>