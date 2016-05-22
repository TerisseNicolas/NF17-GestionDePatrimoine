<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Employés responsables de plusieurs moyens informatiques</title>
    </head>
    <body>        
        <?php
            require "connect.php";
            $conn = fConnect();

            $sql = "SELECT e.*, COUNT(mi.responsable) AS C 
            FROM employe AS e, moyens_infos AS mi 
            WHERE mi.responsable = e.numero_badge 
            GROUP BY e.numero_badge 
            HAVING COUNT(mi.responsable) > 1 
            ORDER BY e.numero_badge;";
            
            $query = pg_query($conn, $sql);
            if (!$query) {
                echo "<h1> Erreur lors de l'execution de la requete! </h1>";
            }
            elseif (pg_num_rows($query) == 0) { //si la requete renvoie 0 lignes
                echo "<h1> Aucun employé n'est responsable de plusieurs moyens informatiques. </h1>";
            }
            else {
                echo "<h1> Employés responsables de plusieurs moyens informatiques: </h1>";
                echo "<table border='1'> 
                        <tr> 
                            <th> Numero badge </th>
                            <th> Nom </th>
                            <th> Prénom </th>
                            <th> Email </th>
                            <th> Statut </th> 
                            <th> Salle </th>
                            <th><strong> Nombre de moyens informatiques </strong></th> 
                        </tr>";
                while ($result = pg_fetch_array($query)) {
                    echo "<tr>
                              <td>".$result['numero_badge']."</td>
                              <td>".$result['nom']."</td>
                              <td>".$result['prenom']."</td>
                              <td>".$result['e_mail']."</td>
                              <td>".$result['statut']."</td>
                              <td>".$result['nom_salle']."</td>
                              <td><strong>".$result['c']."</strong></td>
                          </tr>";    
                }
                echo "</table>";
            } 
            pg_close($conn);
        ?>
        </form>
        <a href="index.html"> Retour à l'accueil </a>
    </body>
</html>
