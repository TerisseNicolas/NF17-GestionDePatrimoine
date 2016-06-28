<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression employé</title>
  	</head>
  	<body>
		<h1>Supprimer un employé:</h1>
		<form method="post" action="suppression_employe_traitement.php">
		    <p>
		       	<label for="employe">Employé à supprimer :</label><br />
		    	<select name="employe">
		       	<?php
		       		require "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT * FROM employe";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value=".$result['numero_badge'].">".$result['nom']." ".$result['prenom']."</option>";
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
