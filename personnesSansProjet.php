<html>
<head>
    <title>Personnes sans projet</title>
</head>
<body> 
    <h1>Liste des personnes ne participant a aucun projet</h1>
    <table border="1"> 
        <tr>
            <td width="100pt"><b>Badge</b></td> 
            <td width="100pt"><b>Nom</b></td> 
            <td width="100pt"><b>Prenom</b></td> 
            <td width="100pt"><b>Statut</b></td>
            <td width="100pt"><b>Salle</b></td> 
        </tr> 
<?php
    include "connect.php";
    $vConn = fConnect();
    $vSql ="SELECT employe.numero_badge, employe.nom, prenom,statut,nom_salle FROM employe LEFT OUTER JOIN acteur ON employe.numero_badge=acteur.numero_badge WHERE acteur.numero_badge IS NULL;";
    $vQuery=pg_query($vConn, $vSql);
    while ($vResult = pg_fetch_array($vQuery)) {
        echo "<tr>";
        echo "<td>$vResult[0]</td>";
        echo "<td>$vResult[1]</td>";
        echo "<td>$vResult[2]</td>";
        echo "<td>$vResult[3]</td>";
        echo "<td>$vResult[4]</td>";
        echo "</tr>";
    }
    pg_close($vConn);
?> 
    </table>
    <hr/>
    <a href="subject.html">Accueil</a>
</body> 
</html>
