<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modification projet</title>
    </head>
    <body>
        <h1>Modification projet :</h1>
        <br>
        <h2>Ancien Profil: </h2>
        <?php
            include "connect.php";
            $profil = $_POST['nom_projet'];
            $conn = fConnect();
            $sql = "SELECT * FROM projet WHERE nom='$profil';";
            $query = pg_query($conn, $sql);
            while ($result = pg_fetch_array($query)) {
                echo $result[0]." ".$result[1]." ".$result[2]." ".$result[3]." ".$result[4]." ".$result[5]." ".$result[6];
            }
        ?>
        <br>
        <?php
        $nom=$_POST['nom'];
        if(!empty($nom)){
            $sql = "UPDATE projet SET nom=$nom WHERE nom='$profil';";
            $profil = $nom;
            $query = pg_query($conn, $sql);
        }
        $sigle=$_POST['sigle'];
        if(!empty($sigle)){
            $sql = "UPDATE projet SET sigle='$sigle' WHERE nom='$profil';";
            $query = pg_query($conn, $sql);
        }




        $description=$_POST['description'];
        if(!empty($description)){
            $sql = "UPDATE projet SET description='$description' WHERE nom='$profil';";
            $query = pg_query($conn, $sql);
        }


        $statut=$_POST['statut'];
        if(!empty($statut)){
            $sql = "UPDATE projet SET statut='$statut' WHERE nom='$profil';";
            $query = pg_query($conn, $sql);
        }
        $nom_salle==$_POST['nom_salle'];
        if(!empty($nom_salle)){
            $sql = "UPDATE projet SET nom_salle='$nom_salle' WHERE nom='$profil';";
            $query = pg_query($conn, $sql);
        }
        ?>
        <h2>Nouveau profil : </h2>
        <?php
        $sql = "SELECT * FROM projet WHERE nom='$profil';";
        $query = pg_query($conn, $sql);
        while ($result = pg_fetch_array($query)) {
            echo $result[0]." ".$result[1]." ".$result[2]." ".$result[3]." ".$result[4]." ".$result[5];
        }

        pg_close($conn);
        ?>
    </body>
</html>
