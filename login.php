<?php
session_start(); 
require_once "config/config.php"; 

?>

<?php include "inc/head.inc.php" ?>
<body>
    <form action="" method="post" class="form">
    <label for="">Nom</label>
    <input type="text" name="user_nom">

    <label for="">Email</label>
    <input type="text" name="user_email">
    
    <label for="">Mot de passe</label>
    <input type="text" name="user_mdp">
    
    <button type="submit">Connexion</button>

    </form>
</body>
</html>