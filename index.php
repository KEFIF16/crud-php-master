<?php 
  session_start();
if (isset($_SESSION['login']))
{
    echo 'Bonjour ' . $_SESSION['login'];
}else{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud en php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
        img {
            width: 100px;
        }
        </style>
    </head>
    <body>
        <div class="container">
        <div class="row">
        <h2>Crud en Php</h2>
        </div>
            <!-- <div class="row">
                <a href="add.php" class="btn btn-success">Ajouter un user</a>
                <div class="table-responsive">
                <div class="container"> -->
                    <br />
            <div class="row">
                </div>
                <div class="row">
                    <p>
                        <a href="add.php" class="btn btn-success">Ajouter un user</a>
                        <a href="logout.php" class="btn btn-danger">Deconnexion</a>
                    </p>
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Firstname</th>
                    <th>Age</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Pays</th>
                    <th>Comment</th>
                    <th>metier</th>
                    <th>Url</th>
                    <th>Photo</th>
                    <th colspan="3">Edition</th>
                </thead>
                <tbody>
                    <?php include 'database.php'; //on inclut notre fichier de connection 
                    $pdo = Database::connect(); //on se connecte à la base 
                    $sql = 'SELECT * FROM user ORDER BY id DESC'; //on formule notre requete 
                    foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['firstname'] . '</td>';
                        echo '<td>' . $row['age'] . '</td>';
                        echo '<td>' . $row['tel'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['pays'] . '</td>';
                        echo '<td>' . $row['comment'] . '</td>';
                        echo '<td>' . $row['metier'] . '</td>';
                        echo '<td>' . $row['url'] . '</td>';
                        if (!empty($row['profile_image_url'])) {
                            echo '<td>' . '<img src="' . $row['profile_image_url'] . '"alt="' . $row['profile_image_url'] . '"></td>';
                        } else {
                            echo '<td>' . '<img src="./uploads/default.webp" alt="' . $row['profile_image_url'] . '"></td>';
                        }
                        echo '<td>';
                        echo ' <a class="btn btn-primary" href="edit.php?id= ' . $row['id'] . '">Read</a>'; // un autre td pour le bouton d'edition
                        echo '</td>';
                        echo '<td>';
                        echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>'; // un autre td pour le bouton d'update
                        echo '</td>';
                        echo '<td>';
                        echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>'; // un autre td pour le bouton de suppression
                        echo '</td>';
                        echo '</tr>';
                    }
                            Database::disconnect(); //on se deconnecte de la base
                        ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>