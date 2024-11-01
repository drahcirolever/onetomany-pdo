<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getArtistByID = getArtistByID($pdo, $_GET['artist_id']); ?>
	<h1>Edit the Artist!</h1>
	<form action="core/handleForms.php?artist_id=<?php echo $_GET['artist_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getArtistByID['first_name']; ?>">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getArtistByID['last_name']; ?>">
		</p>
		<p>
			<label for="firstName">Gender</label> 
			<input type="text" name="gender" value="<?php echo $getArtistByID['gender']; ?>">
		</p>
		<p>
			<label for="firstName">Date of Birth</label> 
			<input type="date" name="dateOfBirth" value="<?php echo $getArtistByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="firstName">Specialization</label> 
			<input type="text" name="specialization" value="<?php echo $getArtistByID['specialization']; ?>">
			<input type="submit" name="editArtistBtn">
		</p>
	</form>
</body>
</html>