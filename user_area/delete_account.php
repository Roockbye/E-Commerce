<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcheteUnJeu.com</title>
</head>

<body>
    <h3 class="text-danger mb-4">Supprimer mon compte</h3>
    <form action="" method="POST" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Supprimer le compte définitivement">
        </div>

        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Non, finalement je le garde">
        </div>
    </form>
</body>

</html>

<!-- connect file -->
<?php
$username_session = $_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query = "DELETE FROM user_table WHERE username='$username_session'";
    $result = mysqli_query($con, $delete_query);

    if($result){
        session_destroy();
        echo "<script>alert('Compte supprimé avec succès')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}

if(isset($_POST['dont_delete'])){
    echo "<script>window.open('../index.php', '_self')</script>";
}
?>