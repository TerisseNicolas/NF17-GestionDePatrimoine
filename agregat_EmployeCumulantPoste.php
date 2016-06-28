<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
  		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Personnes cumulants les rôles de directeur,chef de projet et Supérieur </title>
  	</head>
  	<body>
		<h1>Personnes cumulants les rôles de directeur,chef de projet et Supérieur :</h1>
		<p>
			<?php
		       		$vConn = fConnect();
					$vSql ="SELECT E.nom, E.prenom
					FROM employe E, Superieur S, Chef_de_projet C, directeur D
					WHERE E.Numero_Badge=S.Numero_Superieur AND E.Numero_Badge=C.numero_badge AND E.Numero_Badge=D.numero_badge ;";
					$vQuery=pg_query($vConn, $vSql);
					while ($vResult = pg_fetch_array($vQuery))
					{

						echo "<p>".$vResult[0]." ".$vResult[1]." cumule les trois postes</p>";
					}
					pg_close($vConn);
		       	?>
		</p>
		<p>
			<a href="subject.html">Accueil</a>
		</p>
	</body>
</html>
