
<?php
require_once "config/config.php"; 



class User{
    const ERROR_NOM = "Nom incorrect"; 
    const ERROR_EMAIL = "Email incorrect"; 
    const ERROR_MDP = "Mot de pass incorrect"; 

    private string $nom = ""; 
    private string $email = ""; 
    private string $mdp = ""; 

    public function __construct(array $data){
        if(empty($data["user_nom"]) && empty($data["user_email"]) && empty($data["user_mdp"])){
            $this->setNom($data["user_nom"]); 
            $this->setEmail($data["user_email"]); 
            $this->setMpd($data["user_mdp"]); 

        }else{
            throw new Exception('Vous devez remplir tous les champs');
        }
    }


    public function setNom(string $nom) : void
    {
             if(empty($nom)){
                throw new Exception(self::ERROR_NOM); 
             }

             if(!ctype_upper($nom[0])){
                throw new Exception(self::ERROR_NOM); 
             }else{
                $this->nom = $nom; 
             }
             

               
}


public function setEmail(string $email) : void
{
      $email = strtolower($email); 
    
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $this->email = $email ; 

      }else{
        throw new Exception(self::ERROR_EMAIL); 
      }
}


public function setMdp(string $mdp) : void
{
      
}

}

?>

