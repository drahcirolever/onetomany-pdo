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
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByArtistID = getAllInfoByArtistID($pdo, $_GET['artist_id']); ?>
	<h1>Artist: <?php echo $getAllInfoByArtistID['first_name']; ?>
    <?php echo $getAllInfoByArtistID['last_name']; ?></h1>
	<h1>Add New Project</h1>
	<form action="core/handleForms.php?artist_id=<?php echo $_GET['artist_id']; ?>" method="POST">
		<p>
			<label for="firstName">Project Name</label> 
			<input type="text" name="projectName">
		</p>
		<p>
			<label for="firstName">Genre</label> 
			<input type="text" name="genre">
			<input type="submit" name="insertNewProjectBtn">
		</p>
	</form>

    <table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Project ID</th>
	    <th>Project Name</th>
	    <th>genre</th>
	    <th>Project Artist</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getProjectsByArtist = getProjectsByArtist($pdo, $_GET['artist_id']); ?>
	  <?php foreach ($getProjectsByArtist as $row) { ?>
	  <tr>
	  	<td><?php echo $row['project_id']; ?></td>	  	
	  	<td><?php echo $row['project_name']; ?></td>	  	
	  	<td><?php echo $row['genre']; ?></td>	  	
	  	<td><?php echo $row['project_owner']; ?></td>	  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editproject.php?project_id=<?php echo $row['project_id']; ?>&artist_id=<?php echo $_GET['artist_id']; ?>">Edit</a>

	  		<a href="deleteproject.php?project_id=<?php echo $row['project_id']; ?>&artist_id=<?php echo $_GET['artist_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>