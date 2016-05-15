<?php
	include "connect.php";
?>

<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Traitement de l'insertion</title>
  	</head>
  	<body>
		<h1>Traitement de l'insertion : </h1>
		<?php
			if(isset($_POST['pseudo']
				and $_POST['typeMoyenInfo']
				and $_POST['os']
				and $_POST['responsable']
				and $_POST['proprietaire']
				and $_POST['lienMachine'])
			{
				$pseudo = htmlspecialchars($_POST['pseudo'])
				$typeMoyenInfo = htmlspecialchars($_POST['typeMoyenInfo'])
				$os = htmlspecialchars($_POST['os'])
				$responsable = htmlspecialchars($_POST['responsable'])
				$proprietaire = htmlspecialchars($_POST['proprietaire'])
				$lienMachine = htmlspecialchars($_POST['lienMachine'])

				$vConn = fConnect();
				$vSql ="INSERT INTO 
						; ";
				$vQuery=pg_query($vConn, $vSql);
				pg_close($vConn);
			}
			else
			{
				echo "<p>Les données du formulaire sont incorrectes</p>"
			}
		?>
	</body>
</html>

Nom VARCHAR(30) PRIMARY KEY,
	Type typeinfo,
	OS typeos,
	Responsable VARCHAR(30),
	Proprietaire VARCHAR(30),
	Lien_Machine BOOL,
	NomS VARCHAR(30) NOT NULL,
	FOREIGN KEY (Responsable) REFERENCES Employe(Numero_Badge),
	FOREIGN KEY (Proprietaire) REFERENCES Employe(Numero_Badge),
	FOREIGN KEY (NomS) REFERENCES Salle(Nom)