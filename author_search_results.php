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
			<section id="genre_results_panel" class="panel data-panel">
				<div class="panel-header">
					<h1>Author Search Results</h1>
				</div>
				<?php
					$author = $_POST['author'];
					print "<p>The following are all mangas written by ".$author.".</p>";

					$dbc = mysql_connect('localhost','root','Shorty08liz');
					mysql_select_db('mangamania', $dbc);

					$query = "SELECT * FROM mangas WHERE author = '$author' ORDER BY title";
					if ($r = mysql_query($query, $dbc)){
						print "<table><tr><td>TITLE</td><td>AUTHOR</td><td>PRICE</td></tr>";
						while ($row = mysql_fetch_array($r)){
							print "<tr><td>".$row['title']."</td><td>".$row['author']."</td><td>$".$row['price']."</td></tr>";
						}
						print "</table>";
					}
				?>
			</section>
		</div>
		<footer>
			
		</footer>
	</body>
</html>