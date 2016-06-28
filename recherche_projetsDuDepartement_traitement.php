<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Projets d'un departement</title>
    </head>
    <body>        
        <?php
            require "connect.php";
            $conn = fConnect();

            //récuperation des données du formulaire
            $dpt = explode('|', $_GET['departement']); //on separe selon le delimiteur

            $sql = "SELECT * FROM projet, description WHERE nomD = '$dpt[0]' AND sigleD = '$dpt[1]' AND description.description = projet.description;";
            $query = pg_query($conn, $sql);
            if (!$query) {
                echo "<h1> Erreur lors de l'execution de la requete! </h1>";
            }
            elseif (pg_num_rows($query) == 0) { //si la requete renvoie 0 lignes
                echo "<h1> Aucun projet pour le departement ".$dpt[0].". </h1>";
            }
            else {
                echo "<h1> Projets du departement ".$dpt[0].": </h1>";
                echo "<table border='1'> 
                        <tr> 
                            <th> Nom </th>
                            <th> Sigle </th>
                            <th> Description </th>
                            <th> Date début </th>
                            <th> Date fin </th> 
                            <th> Nom laboratoire </th>
                            <th> Sigle laboratoire </th> 
                        </tr>";
                while ($result = pg_fetch_array($query)) {
                    echo "<tr>
                              <td>".$result['nom']."</td>
                              <td>".$result['sigle']."</td>
                              <td>".$result['description']."</td>
                              <td>".$result['start_date']."</td>
                              <td>".$result['end_date']."</td>
                              <td>".$result['noml']."</td>
                              <td>".$result['siglel']."</td>
                          </tr>";    
                }
                echo "</table>";
            } 
            pg_close($conn);
        ?>
        </form>
        <a href="subject.html">Accueil</a>
    </body>
</html>
