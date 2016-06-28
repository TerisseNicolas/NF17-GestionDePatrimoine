<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modifier acteur</title>
    </head>
    <body>        
        <?php
            require "connect.php";
            $conn = fConnect();
            $acteur=$_POST['num_badge'];
            $projet = $_POST['nom_projet'];
            $role = $_POST['role'];
            if(empty($acteur)||empty($projet)){
                echo "Pas de projet et/ou d' acteur séléctionné";
            }
            else{
                $profil=$acteur;
                $sql = "UPDATE acteur SET nom='$projet' WHERE numero_badge='$profil';";
                $query = pg_query($conn, $sql);
                if(!empty(role))
                {
                    $sql = "UPDATE acteur SET role='$role' WHERE numero_badge='$profil';";
                    $query = pg_query($conn, $sql);
                }
                $sql = "SELECT * FROM acteur WHERE numero_badge='$profil';";
                $query = pg_query($conn, $sql);
                while ($result = pg_fetch_array($query)) {
                    echo $result[0]." ".$result[1]." ".$result[2]." ";
                }
            }
        ?>
        </form>
        <a href="subject.html">Accueil</a>
    </body>
</html>