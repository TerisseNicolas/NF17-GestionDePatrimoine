<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Nouveau moyen informatique</title>
  	</head>
  	<body>
		<h1>Nouveau moyen informatique :</h1>
		<form method="post" action="insertion_moyenInformatique_traitement.php">
    		<p>
        		<label for="pseudo">Nom :</label>
        		<input type="text" name="pseudo" id="pseudo" placeholder="Nom" size="30" maxlength="10" />
		    </p>
		    <p>
		    	<label for="typeMoyenInfo">Type :</label><br />
		    	<select name="typeMoyenInfo">
		        	<option value="fixe">Fixe</option>
		            <option value="portable">Portable</option>
		            <option value="server">Serveur</option>
		       	</select>
		    </p>
		    <p>
		       	<label for="os">OS :</label><br />
		    	<select name="os">
		        	<option value="Windows">Windows</option>
		            <option value="Linux">Linux</option>
		            <option value="Mac">Mac</option>
		       	</select>
		    </p>
		    <p>
		       	<label for="responsable">Responsable :</label><br />
		    	<select name="responsable">
		       	<?php
		       		require "connect.php";
                    $conn = fConnect();
                    $sql = "SELECT * FROM employe";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value=".$result['numero_badge'].">".$result['nom']." ".$result['prenom']."</option>";
                    }
                    //pg_close($conn);
                  ?>
		       	</select>
		    </p>
		    <p>
		       	<label for="proprietaire">Proprietaire :</label><br />
		    	<select name="proprietaire">
		       <?php
		       		//require "connect.php";
                    //$conn = fConnect();
                    $sql = "SELECT * FROM employe";
                    $query = pg_query($conn, $sql);
                    while ($result = pg_fetch_array($query)) {
                        echo "<option value=".$result['numero_badge'].">".$result['nom']." ".$result['prenom']."</option>";
                    }
                    //pg_close($conn);
		       	?>
		       	</select>
		    </p>
		    <p>
		       	Lien machine :
		       	<input type="radio" name="lienMachine" value="TRUE" id="lienMachineTrue" checked /> <label for="lienMachineTrue">Vrai</label>
           		<input type="radio" name="lienMachine" value="FALSE" id="lienmachineFalse" /> <label for="lienMachineFalse">Faux</label>
		    </p>
		    <p>
		       	<label for="salle">Salle :</label><br />
		    	<select name="salle">
		       <?php
					$sql = "SELECT nom FROM salle";
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
    		<p>
			<a href="subject.html">Accueil</a>
		</p>
		</form>
	</body>
</html>
