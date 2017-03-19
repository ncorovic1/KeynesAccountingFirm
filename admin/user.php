<?php
require_once('database.php');

class USER
{
    private $konekcija;
 
    function __construct()
    {
        $baza = new Database();
		$this->konekcija = $baza->connect();
    }
    
    public function login($uname,$upass)
    {
        
        try
        {
            $uname = strtolower($uname);
            $query = "SELECT * FROM users WHERE username=:uname LIMIT 1";
            $stmt = $this->konekcija->prepare($query);
            $stmt->bindparam(":uname", $uname);
            $stmt->execute();
            
            $rezultat=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
               
                if(password_verify($upass, $rezultat['password']))
                {
                    $_SESSION['idKorisnika'] = $rezultat['id'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
 
    public function logovan()
    {
        if( isset($_SESSION['idKorisnika']) )
        {
            return true;
        }
        return false;
    }
 
    public function preusmjeri($url)
    {
        header("Location: $url");
    }
 
    public function logout()
    {
        session_destroy();
        unset($_SESSION['idKorisnika']);
        return true;
    }
}
?>