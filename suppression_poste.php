<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Suppression Poste Téléphonique</title>
  	</head>
  	<body>
		<h1>Supprimer un Poste Téléphonique :</h1>
		<form method="post" action="suppression_poste_tel.php">
		    <p>
		       	<label for="employe">Poste à supprimer :</label><br />
		    	<select name="poste">
		       	<?php
					require "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT numero,numero_direct 
			    FROM poste_telephonique
			    ORDER by numero;";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value=".$result['numero'].">".$result['numero_direct']."</option>";
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
