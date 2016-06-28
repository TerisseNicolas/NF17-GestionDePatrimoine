<?php
	include "connect.php";
?>

<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Nouvelle Machine</title>
  	</head>
  	<body>
		<h1>Nouvelle Machine :</h1>
		<form method="post" action="insertion_machine_traitement.php">
    		<p>
        		<label for="modele">Modèle :</label>
        		<input type="text" name="modele" id="modele" placeholder="Nom" size="30" maxlength="30" />
		    </p>
			<p>
		       	<label for="contrat">Numéro de Contrat de maintenance:</label><br />
		    	<select name="contrat">
		       <?php
		       		$vConn = fConnect();
		       		echo $vConn;
					$vSql ="Select Num_Contrat,Entreprise_Maintenance
							FROM Contrat
							ORDER by Entreprise_Maintenance; ";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<option value=".$vResult[0].">".$vResult[0]."->".$vResult[1]."</option>";
					}
					pg_close($vConn);
		       	?>
		       	</select>
		    </p>
			
			
			<p>
        		<label for="description">Description:</label>
        		<input type="text" name="description" id="description" size="30"  />
		    </p>
			
			<p>
        		<label for="puissance">Puissance électrique:</label>
        		<input type="number" name="puissance" id="puissance"  size="30" maxlength="10" min="0" max ="360"/>
		    </p>
			
			<p>
		       	Besoin triphasé :
		       	<input type="radio" name="triphase" value="t" id="triphaseTrue" checked /> <label for="triphaseTrue">Vrai</label>
           		<input type="radio" name="triphase" value="f" id="triphaseFalse" /> <label for="triphaseFalse">Faux</label>
		    </p>
			
			<p>
		       	Besoin Besoin gaz :
		       	<input type="radio" name="gaz" value="t" id="gazTrue" checked /> <label for="gazTrue">Vrai</label>
           		<input type="radio" name="gaz" value="f" id="gazFalse" /> <label for="gazFalse">Faux</label>
		    </p>
			
			<p>
        		<label for="gaztype">Si oui, quel type de gaz</label>
        		<input type="text" name="gaztype" id="gaztype"  size="30" maxlength="10" />
		    </p>
		    <p>
		    	<label for="taille">Taille de la Machine :</label><br />
		    	<select name="taille">
		        	<option value="Petite">Petite</option>
		            <option value="Moyenne">Moyenne</option>
		            <option value="Grande">Grande</option>
		       	</select>
		    </p>
		   
		    <p>
		       	<label for="salle">Salle :</label><br />
		    	<select name="salle">
		       <?php
		       		$vConn = fConnect();
		       		//echo $vConn;
					$vSql ="Select nom
						FROM salle";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<option value=".$vResult[0].">".$vResult[0]."</option>";
					}
					pg_close($vConn);
		       	?>
		       	</select>
		    </p>
			
			 <p>
		       	<label for="labo">Labo :</label><br />
		    	<select name="labo">
		       <?php
		       		$vConn = fConnect();
		       		//echo $vConn;
					$vSql ="Select nom,Sigle
							FROM Laboratoire
							ORDER by nom; ";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<option value='".$vResult[0]."|".$vResult[1]."'>".$vResult[0]."</option>";
					}
					pg_close($vConn);
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
