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
		        	<option value="w">Windows</option>
		            <option value="l">Linux</option>
		            <option value="m">Mac</option>
		       	</select>
		    </p>
		    <p>
		       	<label for="responsable">Responsable :</label><br />
		    	<select name="responsable">
		       	<?php
		       			echo "<option value="w">Windows</option> sur employé"
		       	?>
		       	</select>
		    </p>
		    <p>
		       	<label for="proprietaire">Proprietaire :</label><br />
		    	<select name="proprietaire">
		       	<?php
		       			echo "<option value="w">Windows</option> sur employé"
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
		</form>
	</body>
</html>
