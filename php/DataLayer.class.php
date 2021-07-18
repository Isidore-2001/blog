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
    function getposts2(){
		$res = <<<EOD
            select count(id_post) from "posts" 
            
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetch();
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
    

    function get_comment(int $id){
        $res = <<<EOD
            select * from "commentaires" 
            where commentaires.id_post=:id
            
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        
        
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetchAll();
        
        
        if ($res1 != NULL){
            return $res1;

        } 
        else{
            return FALSE;
        }
        
    }

    function get_comment3(){
        $res = <<<EOD
            select count(id_commentaires) from "commentaires" 
            
            
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        
        
        
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetch();
        
        
        if ($res1 != NULL){
            return $res1;

        } 
        else{
            return FALSE;
        }
        
    }

    function get_comment2(int $id){
        $res = <<<EOD
            select * from "commentaires" 
            where commentaires.id_post=:id order by commentaires.id_commentaires asc
            
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        
        
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetchAll();
        
        
        if ($res1 != NULL){
            return $res1;

        } 
        else{
            return FALSE;
        }
        
    }
    function get_comment4(){
        $res = <<<EOD
        select * from "commentaires" join "posts" on commentaires.id_post = posts.id_post where commentaires.seen = 0
            
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        
        
        
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetchAll();
        
        
        if ($res1 != NULL){
            return $res1;

        } 
        else{
            return FALSE;
        }
        
    }
    

    function insert_comment(string $email, string $name, string $comment, int $post){
        $sql = <<<EOD
        insert into "commentaires" (email, name, comment, id_post)
        values (:email, :name, :comment, :id_post)
EOD;
        
        try{
            
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":name", $name);
            $stmt->bindValue(":comment", $comment);
            $stmt->bindValue(":id_post", $post);
            

            $stmt->execute();
            return TRUE;
            }
            catch (PDOException $e){
                
                return false;
            }
        
    }
    function insert_comment2(int $id1=NULL, int $id2=NULL){
        $sql = <<<EOD
        insert into "comment" (id_post, id_commentaires)
        values (:id_post, :id_commentaires) 
EOD;
        
        try{
            
            $stmt = $this->connexion->prepare($sql);
            
            $stmt->bindValue(":id_post", $id1);
            $stmt->bindValue(":id_commentaires", $id2);
            

            $stmt->execute();
            return TRUE;
            }
            catch (PDOException $e){
                
                return false;
            }
        
    }

    function get_admin_number(){
        $sql = <<<EOD
                select count(id_admin) from "admin"
EOD;

        $stmt = $this->connexion->prepare($sql);
        
        
        
        
        $stmt->execute();
//$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetch();


if ($res1 != NULL){
    return $res1;

} 
else{
    return FALSE;
}
    }
    
    




}


?>