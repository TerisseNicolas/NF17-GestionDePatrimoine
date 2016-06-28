<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression projet</title>
  	</head>
  	<body>
		<h1>Supprimer un projet:</h1>
		<form method="post" action="suppression_projet_traitement.php">
		    <p>
		       	<label for="projet">Projet à supprimer :</label><br />
		    	<select name="projet">

		       	<?php
					require "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT * FROM projet ORDER BY nom";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value=".$result['nom'].">".$result['nom']."</option>";
                    }
                    pg_close($conn);
		       	?>
		       	</select>
		    </p>
		    <p>
        		<input type="submit" value="Valider" >
    		</p>
		</form>
		<p>
			<a href="subject.html">Accueil</a>
		</p>
	</body>
</html>
