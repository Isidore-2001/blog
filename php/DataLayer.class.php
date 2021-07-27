<?php

class DataLayer {
	// private ?PDO $conn = NULL; // le typage des attributs est valide uniquement pour PHP>=7.4

	private  $connexion = NULL; // connexion de type PDO   compat PHP<=7.3
	
	/**
	 * @param $DSNFileName : file containing DSN 
	 */
	function __construct(string $DSNFileName){
		
            try {
                
                $this->connexion = new PDO('mysql:host=codingschool-togo.com;dbname=u391525461_amevigbe','u391525461_amevigbe','Kanoli2014');
              } 
              catch ( Exception $e ) {
                echo "Connection à la BDD impossible : ", $e->getMessage();
                
              }
              
              
           
            // paramètres de fonctionnement de PDO :
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // déclenchement d'exception en cas d'erreur
            $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); // fetch renvoie une table associative
            // réglage d'un schéma par défaut :*/
            
            /*$this->connexion->query('*/
            
        
		
	}
	
	function getcontent(){
		$res = <<<EOD
            select * from posts 
            order by id_post limit 2 
            
        EOD;
        
        try{
            $stmt = $this->connexion->prepare($res);
        
        
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetchAll();
        $count = $stmt->fetchColumn();
        
        
        return $res1;}
        
        catch (PDOException $e){
                
            var_dump($e);
        }
	}

	function getposts(){
		$res = <<<EOD
            select * from posts
            
            
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
            select count(id_post) from posts 
            
            
        EOD;
        
        try{$stmt = $this->connexion->prepare($res);
        
        
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetch();
        $count = $stmt->fetchColumn();
        
        
        return $res1;}
        catch (PDOException $e){
                
            var_dump($e);
        }
    }
    
    function getposts_id(int $id){
		$res = <<<EOD
            select * from posts 
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
            select * from commentaires 
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
            select count(id_commentaires) from commentaires
            
            
            
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
            select * from commentaires
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
        select * from commentaires join posts on commentaires.id_post = posts.id_post where commentaires.seen = 0
            
            
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
        insert into commentaires (email, name, comment, id_post)
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
        insert into comment (id_post, id_commentaires)
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



    function delete_comment(?int $id){
        $sql = <<<EOD
        DELETE FROM commentaires WHERE id_commentaires=:id
EOD;
        try{
        $stmt = $this->connexion->prepare($sql);
        
        
        $stmt->bindValue(":id", $id);
        
        $stmt->execute();



        return TRUE;
    }
    catch (PDOException $e){
        
        return $e;
    }

}

    function get_admin_number(){
        $sql = <<<EOD
                select count(id_admin) from admin
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

    function view_comment(int $id){
        $sql = <<<EOD
        UPDATE commentaires SET seen = 1 WHERE id_commentaires=:id
EOD;
        try{
        $stmt = $this->connexion->prepare($sql);
        
        
        $stmt->bindValue(":id", $id);
        
        $stmt->execute();



        return TRUE;
    }
    catch (PDOException $e){
        
        return $e;
    }
    }

    function get_modo_not_password(){
        $sql = <<<EOD
        SELECT * FROM admin WHERE role != admin and password = NULL 
EOD;
        try{
        $stmt = $this->connexion->prepare($sql);
        
        
        
        
        $stmt->execute();

        $res1 = $stmt->fetchAll();


        return $res1;
    }
    catch (PDOException $e){
        
        return $e;
    }
    }

    function get_modo_have_password(){
        $sql = <<<EOD
        SELECT * FROM admin WHERE role != admin and password != NULL 
EOD;
        try{
        $stmt = $this->connexion->prepare($sql);
        
        
        
        
        $stmt->execute();

        $res1 = $stmt->fetchAll();


        return $res1;
    }
    catch (PDOException $e){
        
        return $e;
    }
    }

    function add_modo(string $email, string $nom, string $prenom
    ){
        $sql = <<<EOD
        insert into admin (nom, prenom, role, token, email)
        values (:nom, :prenom, :role, :token, :email)  
EOD;
        try{
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":nom", $nom);
        $stmt->bindValue(":prenom", $prenom);
        $stmt->bindValue(":token", $token);
       
        
        
        
        $stmt->execute();

        


        return TRUE;
    }
    catch (PDOException $e){
        
        return $e;
    }
    }

    function update_password(int $id, string $password){
        $sql = <<<EOD
        UPDATE admin SET password =: password WHERE id_admin=:id
EOD;
        try{
        $stmt = $this->connexion->prepare($sql);
        
        
        $stmt->bindValue(":id_admin", $id);
        
        $stmt->execute();



        return TRUE;
    }
    catch (PDOException $e){
        
        return $e;
    }
    }
    
    




}


?>