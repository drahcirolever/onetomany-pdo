<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this Artist?</h1>
	<?php $getArtistByID = getArtistByID($pdo, $_GET['artist_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>FirstName: <?php echo $getArtistByID['first_name']; ?></h2>
		<h2>LastName: <?php echo $getArtistByID['last_name']; ?></h2>
        <h2>Gender: <?php echo $getArtistByID['gender']; ?></h2>
		<h2>Date Of Birth: <?php echo $getArtistByID['date_of_birth']; ?></h2>
		<h2>Specialization: <?php echo $getArtistByID['specialization']; ?></h2>
		<h2>Date Added: <?php echo $getArtistByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?artist_id=<?php echo $_GET['artist_id']; ?>" method="POST">
				<input type="submit" name="deleteArtistBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>