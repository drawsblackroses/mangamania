<!DOCTYPE html>
<html>
	<head>
		<title>Manga Mania Admin Panel</title>
		<link href='http://fonts.googleapis.com/css?family=Bubblegum+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="/css/main.css">
	</head>
	<body>
		<header>
			<h1>Manga Mania</h1>
		</header>
		<div id="content">
			<section id="admin_panel" class="panel">
				<div class="panel-header">
					<h1>Admin Panel</h1>
				</div>
				<?php

					$title = $_POST['title'];
					$author = $_POST['author'];
					$price = $_POST['price'];
					$genre = $_POST['genre'];

					$dbc = mysql_connect('localhost','root','Shorty08liz');
					mysql_select_db('mangamania', $dbc);
					$query = "INSERT INTO mangas (title, author, price, genre) VALUES ('$title','$author','$price','$genre')";

					if (@mysql_query($query, $dbc)){
						print "<p>You have successfully added ".$title." by ".$author.", priced at $".$price.". Thank you.</p>";
						print "<p><a href='/new_manga.html'>Click here</a> to add another manga.</p>";
					}
					else{
						print "<p>Your manga was not successfully added.</p>";
						print "<p><a href='/new_manga.html'>Click here</a> to try again.</p>";
					}
					mysql_close($dbc);

				?>
			</section>
		</div>
		<footer>
			
		</footer>
	</body>
</html>