<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modification employé</title>
    </head>
    <body>
        <h1>Modification employé :</h1>
        <br>
        <h2>Ancien Profil: </h2>
        <?php
            include "connect.php";
            $profil = $_POST['nom_employe'];
            $conn = fConnect();
            $sql = "SELECT * FROM employe WHERE numero_badge='$profil';";
            $query = pg_query($conn, $sql);
            while ($result = pg_fetch_array($query)) {
                echo $result[0]." ".$result[1]." ".$result[2]." ".$result[3]." ".$result[4]." ".$result[5];
            }
        ?>
        <br>
        <?php
        $num_badge=$_POST['num_badge'];
        if(!empty($num_badge)){
            $sql = "UPDATE employe SET numero_badge=$num_badge WHERE numero_badge='$profil';";
            $profil = $num_badge;
            $query = pg_query($conn, $sql);
        }
        $nom=$_POST['nom']; 
        if(!empty($nom)){
            $sql = "UPDATE employe SET nom='$nom' WHERE numero_badge='$profil';";
            $query = pg_query($conn, $sql);
        }
        $prenom=$_POST['prenom'];
        if(!empty($prenom)){
            $sql = "UPDATE employe SET prenom='$prenom' WHERE numero_badge='$profil';";
            $query = pg_query($conn, $sql);
        }
        $email=$_POST['email'];
        if(!empty($email)){
            $sql = "UPDATE employe SET e_mail='$email' WHERE numero_badge='$profil';";
            $query = pg_query($conn, $sql);
        }
        $statut=$_POST['statut'];
        if(!empty($statut)){
            $sql = "UPDATE employe SET statut='$statut' WHERE numero_badge='$profil';";
            $query = pg_query($conn, $sql);
        }
        $nom_salle==$_POST['nom_salle'];
        if(!empty($nom_salle)){
            $sql = "UPDATE employe SET nom_salle='$nom_salle' WHERE numero_badge='$profil';";
            $query = pg_query($conn, $sql);
        }
        ?>
        <h2>Nouveau profil : </h2>
        <?php
        $sql = "SELECT * FROM employe WHERE numero_badge='$profil';";
        $query = pg_query($conn, $sql);
        while ($result = pg_fetch_array($query)) {
            echo $result[0]." ".$result[1]." ".$result[2]." ".$result[3]." ".$result[4]." ".$result[5];
        }

        pg_close($conn);
        ?>
    </body>
</html>
