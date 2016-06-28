<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Modifier chef de projet</title>
    </head>
    <body>        
        <?php
            require "connect.php";
            $conn = fConnect();

            $to_change=$_POST['to_change'];
            $chef=$_POST['num_badge'];
            $projet = $_POST['nom_projet'];
            if(empty($chef)||empty($projet)){
                echo "Pas de projet et/ou de chef séléctionné";
            }
            else{
                $profil=$chef;
                $sql = "UPDATE chef_de_projet SET nomP='$projet' WHERE numero_badge='$profil';";
                $query = pg_query($conn, $sql);
                $sql = "SELECT * FROM chef_de_projet WHERE numero_badge='$profil';";
                $query = pg_query($conn, $sql);
                while ($result = pg_fetch_array($query)) {
                    echo $result[0]." ".$result[1]." ";
                }
            }
        ?>
        </form>
        <a href="subject.html">Accueil</a>
    </body>
</html>
