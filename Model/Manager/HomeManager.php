<?php

/**
 * Class HomeManager
 *
 * This class is responsible for managing Messages from the Home page in the database. It extends the BaseManager class,
 * which provides basic CRUD functionality. It includes additional methods specific to Homes,
 * such as retrieving message by author .
 */
class HomeManager extends BaseManager
{
    /**
     * Class HomeManager
     * A manager for the Home entity, extends the BaseManager class.
     * @param string $datasource The name of the datasource to use for database connection.
     */
    public function __construct($datasource)
    {
        parent::__construct("home", "home", $datasource);
    }

    /**
     * GetMailsForUser : Fetch Mails written by a given userId and retrieve message he wrote 
     */
    public function GetMailsForGod()
    {
        $req = $this->bdd->prepare("SELECT * FROM home");
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Mail");
        return $req->fetchAll();
    }
}