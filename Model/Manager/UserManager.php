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
			//$aFetch = parent::getProperties($req->fetch(PDO::FETCH_OBJ));
			//extract($aFetch);
			//$user = new User ($id, $mail, $password, $name, $last_name, $pic, $catch_phrase);
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