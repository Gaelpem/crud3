<?php
session_start(); 
require_once "config/config.php"; 
require_once "config/login.config.php"; 



if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["user_nom"], $_POST["user_email"],$_POST["user_mdp"])){
        $user_nom = trim($_POST["user_nom"]); 
        $user_email = trim($_POST["user_email"]); 
        $user_mdp = trim($_POST["user_mdp"]); 

        //connexion à la base de donnée 
        $sql = "SELECT * FROM user_admin WHERE user_email = :user_email"; 
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_email' => $_POST['user_email']]);
        $user = $stmt->fetch();

    }
    try{
        if(!empty($user_nom) && !empty($user_email) && !empty($user_mdp)){
            
            new userAdmin = new UserAdmin($user_nom, $user_email, $user_mdp ); 
            
        }
    }
}

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