<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modifier directeur</title>
    </head>
    <body>        
        <?php
            require "connect.php";
            $conn = fConnect();
            $profil=$_POST['num_badge'];
            $labo = $_POST['laboratoire'];
            if(!empty($labo)){
                $sql = "SELECT nom,sigle FROM laboratoire WHERE nom='$labo';";
                $query = pg_query($conn, $sql);
                while ($result = pg_fetch_array($query)) {
                    $sigle_labo=$result[1];
                }
                $sql = "UPDATE directeur SET nomL='$labo',sigleL='$sigle_labo' WHERE numero_badge='$profil';";
                $query = pg_query($conn, $sql);
            }
            $departement = $_POST['departement'];
            if(!empty($departement)){
                $sql = "SELECT nom,sigle FROM departement WHERE nom='$departement';";
                $query = pg_query($conn, $sql);
                while ($result = pg_fetch_array($query)) {
                    $sigle_dep=$result[1];
                }
                $sql = "UPDATE directeur SET nomD='$departement',sigleD='$sigle_dep' WHERE numero_badge='$profil';";
                $query = pg_query($conn, $sql);
            }
            $sql = "SELECT * FROM directeur WHERE numero_badge='$profil';";
            $query = pg_query($conn, $sql);
            while ($result = pg_fetch_array($query)) {
                echo $result[0]." ".$result[1]." ".$result[3]." ";
            }
            pg_close($conn);
        ?>
        <a href="subject.html">Accueil</a>
    </body>
</html>