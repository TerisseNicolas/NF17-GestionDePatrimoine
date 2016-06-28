<html>
<head>
	<title>Salles en sur-effectif</title>
</head>
<body> 
	<h1>Liste des salles en sur-effectif</h1>
	<table border="1"> 
	<tr>
		<td width="100pt"><b>Nom de la salle</b></td> 
		<td width="100pt"><b>Nb en sur-effectif</b></td> 
	</tr> 
	<?php
	include "connect.php";
	$vConn = fConnect();
	$vSql ="SELECT vNbPersoSalle.nom_salle,effectif,capacite_humain FROM vNbPersoSalle,taille WHERE vNbPersoSalle.superficie=taille.superficie; ";
	$vQuery=pg_query($vConn, $vSql);
	while ($vResult = pg_fetch_array($vQuery)) {
	$a=$vResult[2]-$vResult[1];
	if ($a<0)
	{
		$a=-$a;
		echo "<tr>";
		echo "<td>$vResult[0]</td>";
		echo "<td>$a</td>";
		echo "</tr>";
		$a=0;
	}
	
	   }

	pg_close($vConn);
	?> 
	</table>
	<hr/>
	<a href="subject.html">Accueil</a>
</body> 
</html>
