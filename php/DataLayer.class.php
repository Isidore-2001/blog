<?php

class DataLayer {
	// private ?PDO $conn = NULL; // le typage des attributs est valide uniquement pour PHP>=7.4

	private  $connexion = NULL; // connexion de type PDO   compat PHP<=7.3
	
	/**
	 * @param $DSNFileName : file containing DSN 
	 */
	function __construct(string $DSNFileName){
		$dsn = "uri:$DSNFileName";
		$this->connexion = new PDO($dsn);
		// paramètres de fonctionnement de PDO :
		$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // déclenchement d'exception en cas d'erreur
		$this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); // fetch renvoie une table associative
        // réglage d'un schéma par défaut :
        $this->connexion->query('set search_path=blog');
		
	}
	
	function getcontent(){
		$res = <<<EOD
            select * from "posts" 
            order by id_post limit 2 
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetchAll();
        $count = $stmt->fetchColumn();
        
        
        return $res1;
	}

	function getposts(){
		$res = <<<EOD
            select * from "posts" 
            
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetchAll();
        $count = $stmt->fetchColumn();
        
        
        return $res1;
    }
    
    function getposts_id(int $id){
		$res = <<<EOD
            select * from "posts" 
            where id_post=:id
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        
        
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetch();
        
        
        
        return $res1;
	}
    
    




}


?>