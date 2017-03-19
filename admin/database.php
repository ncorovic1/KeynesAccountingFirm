<?php

	class Database {
		private $DB_host = "localhost";
		// private $DB_user = "infobosn_admin";
		// private $DB_pass = "admin";
		// private $DB_name = "infobosn_db";
		private $DB_user = "admin";
		private $DB_pass = "admin";
		private $DB_name = "keynes";
		private $DB_port = "3306";
		public  $DB_con;
		
		public function connect() {
			$this->DB_con = null;
			try
			{
				 $this->DB_con = new PDO("mysql:host={$this->DB_host};dbname={$this->DB_name};port={$this->DB_port};charset=utf8",$this->DB_user,$this->DB_pass);
                 return $this->DB_con;
			}
			catch(PDOException $e)
			{
				 echo $e->getMessage();
			}
		}

	}
	
?>