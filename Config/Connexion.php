<?php
class Connexion
{
    private $serveur;
    private $base;
    private $username;
    private $password;
    private $pdo=null;

 
   public function __construct()
    {
        require_once("ParamConn.php");
        $this->serveur = $serveur;
        $this->base = $base;
        $this->username = $username;
        $this->password = $password;
    }

    public function getConnection(){
        try {
            //creation de l'objet PDO
            $pdo = new PDO("mysql:host=$this->serveur;dbname=$this->base","$this->username","$this->password");
           
           if($pdo != null) //echo "Connexion réussi";
            return $pdo;
            } catch (PDOException $e){ //erreur de connexion à la basse
            print "Erreur : ".$e->getMessage();
            die();
            }
            
    }
    public function __destruct()
    {
        $pdo=null;  
    }
}
?>