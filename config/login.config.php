
<?php
require_once "config/config.php"; 



class UserAdmin{
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
        $caractereSpeciaux = "%?!-&/+"; 
        $verifCaractere = false ; 

        foreach(str_split($caractereSpeciaux) as $caractere){
            if(strpos($mdp, $caractere) !== false){
                $verifCaractere = true ; 
                break; 
            }
        }

        if(!$verifCaractere){
            throw new Exception(self::ERROR_MDP); 
        }else{
            $this->mdp = $mdp; 
        }

        if(strlen($mdp) >= 10 && preg_match('/[A-Za-z]/', $mdp) && preg_match('/[0-9]/', $mdp) && $verifCaractere){
            $this->mdp = password_hash($mdp, PASSWORD_DEFAULT); 
        }else{
            throw new Exception(self::ERROR_MDP); 
        }


        
}


public function getNom($nom){
    return $this->nom; 
}

public function getEmail($email){
    return $this->email; 
}
public function getMdp($mdp){
    return $this->mdp; 
}

}

?>

