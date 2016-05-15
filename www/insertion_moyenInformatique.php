<?php
	include "connect.php";
?>

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
		        	<option value="f">Fixe</option>
		            <option value="p">Portable</option>
		            <option value="s">Serveur</option>
		       	</select>
		    </p>
		    <p>
		       	<label for="os">OS :</label><br />
		    	<select name="os">
		        	<option value="W">Windows</option>
		            <option value="L">Linux</option>
		            <option value="M">Mac</option>
		       	</select>
		    </p>
		    <p>
		       	<label for="responsable">Responsable :</label><br />
		    	<select name="responsable">
		       	<?php
		       		$vConn = fConnect();
                  $vSql ="Select numero_badge, nom, prenom
                        FROM employe
                        ORDER by nom; ";
                  $vQuery=pg_query($vConn, $vSql);
                  while ($vResult = pg_fetch_array($vQuery))
                  {

                     echo "<option value=\"$result[0]\">$result[1]  $result[2]</option>";
                  }
                  pg_close($vConn);
                  ?>
		       	</select>
		    </p>
		    <p>
		       	<label for="proprietaire">Proprietaire :</label><br />
		    	<select name="proprietaire">
		       <?php
		       		$vConn = fConnect();
		       		echo $vConn;
					$vSql ="Select numero_badge, nom, prenom
							FROM employe
							ORDER by nom; ";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<option value=\"$result[0]\">$result[1]  $result[2]</option>";
					}
					pg_close($vConn);
		       	?>
		       	</select>
		    </p>
		    <p>
		       	Lien machine :
		       	<input type="radio" name="lienMachine" value="t" id="lienMachineTrue" checked /> <label for="lienMachineTrue">Vrai</label>
           		<input type="radio" name="lienMachine" value="f" id="lienmachineFalse" /> <label for="lienMachineFalse">Faux</label>
		    </p>
		    <p>
        		<input type="submit" value="Valider" >
    		</p>
    		<p>
			<a href="index.html">Accueil</a>
		</p>
		</form>
	</body>
</html>
