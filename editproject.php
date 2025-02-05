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
	<a href="viewprojects.php?artist_id=<?php echo $_GET['artist_id']; ?>">
	View The Projects</a>
	<h1>Edit the project!</h1>
	<?php $getProjectByID = getProjectByID($pdo, $_GET['project_id']); ?>
	<form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>
	&artist_id=<?php echo $_GET['artist_id']; ?>" method="POST">
		<p>
			<label for="firstName">Project Name</label> 
			<input type="text" name="projectName" 
			value="<?php echo $getProjectByID['project_name']; ?>">
		</p>
		<p>
			<label for="firstName">Genre</label> 
			<input type="text" name="genre" 
			value="<?php echo $getProjectByID['genre']; ?>">
			<input type="submit" name="editProjectBtn">
		</p>
	</form>
</body>
</html>