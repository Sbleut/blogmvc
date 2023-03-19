<?php
    class userManager extends BaseManager
    {
        public function __construct($datasource)
		{
			parent::__construct("user","User",$datasource);
		}

        public function getByMail($mail)
		{
			$req = $this->bdd->prepare("SELECT * FROM user WHERE mail=?");
			$req->execute(array($mail));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");
			return $req->fetch();			
		}

		public function getById($id)
		{
			$req = $this->bdd->prepare("SELECT * FROM user WHERE mail=id");
			$req->execute(array($id));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");
			return $req->fetch();			
		}

		public function getRole($id)
		{
			$req = $this->bdd->prepare("SELECT role.* FROM user_has_role
			INNER JOIN role 
			ON role.id = user_has_role.roleid WHERE userid=?");
			$req->execute(array($id));
			$req->setFetchMode(PDO::FETCH_ASSOC);
			return $req->fetchAll();
		}
		

    }