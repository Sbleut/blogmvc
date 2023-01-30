<?php
	class BDD
	{
		private $bdd;
        private static $instance;
		
        public static function getInstance($datasource)
		{
			if(empty(self::$instance))
			{
				self::$instance = new BDD($datasource);
			}
			return self::$instance->bdd;
		}
		public function __construct($database)
		{
			$this->bdd = new PDO('mysql:dbname=' . $database->dbname . ';host=' . $database->host,
								  $database->user,
								  $database->password);
		}
		
		public function getBdd()
		{
			return $this->bdd;
		}
	}