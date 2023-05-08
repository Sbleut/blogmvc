<?php

/**
 * Class ArticleManager
 *
 * This class is responsible for managing articles in the database. It extends the BaseManager class,
 * which provides basic CRUD functionality. It includes additional methods specific to articles,
 * such as retrieving articles by author or date, and getting comments for an article.
 */
class ArticleManager extends BaseManager
{
    /**
     * Class ArticleManager
     * A manager for the Article entity, extends the BaseManager class.
     * @param string $datasource The name of the datasource to use for database connection.
     */
    public function __construct($datasource)
    {
        parent::__construct("article", "Article", $datasource);
    }

    /**
     * Get all articles with a limit and an offset.
     * @param int $offset The offset to start from.
     * @param int $articlesPerPage The number of articles per page.
     * @return array Returns an array of Article objects.
     */
    public function getAllArticles($offset, $articlesPerPage)
    {
        $req = $this->bdd->prepare("SELECT * FROM article ORDER BY date DESC LIMIT :offset, :limit");
        $req->bindValue(':offset', $offset, PDO::PARAM_INT);
        $req->bindValue(':limit', $articlesPerPage, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        return $req->fetchAll();
    }

    /**
     * Returns the total number of articles in the database.
     *
     * @return int The total number of articles.
     */
    public function getTotal()
    {
        $req = $this->bdd->query("SELECT COUNT(*) FROM article");
        return $req->fetchColumn();
    }

    /**
     * Returns an Article object with the given id.
     * @param int $id The id of the article to retrieve.
     * @return Article|null The Article object if found, or null if not found.
     */
    public function getById($id)
    {
        $req = $this->bdd->prepare("SELECT * FROM article WHERE id=?");
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        return $req->fetch();
    }

    /**
     * Fetches an article by ID along with its author and comments.
     *
     * @param int $id The ID of the article to fetch.
     *
     * @return Article|null The article with the specified ID, or null if not found.
     */
    public function getByIdWithData($id)
    {
        $req = $this->bdd->prepare(
            "SELECT article.*, CONCAT(user.name, ' ',  user.last_name) AS author FROM article 
            INNER JOIN user
                ON article.post_author = user.id
            WHERE article.id=?"
        );
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        $article = $req->fetch();
        $req = $this->bdd->prepare(
            "SELECT comment.*, CONCAT(user.name, ' ',  user.last_name) AS author FROM comment
            INNER JOIN user
                ON comment.comment_author = user.id
            WHERE comment.blogpost_id=?
            ORDER BY comment.date"
        );
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comment");
        $article->commentList = $req->fetchAll();
        return $article;
    }

    /**
     * Retrieves all articles written by a given author, along with their associated comments.
     *
     * @param int $id The ID of the author.
     * @return array An array of Article objects.
     */
    public function getArticlesByAuthorWithData($id)
    {
        $req = $this->bdd->prepare(
            "SELECT article.*, CONCAT(user.name, ' ',  user.last_name) AS author FROM article 
            INNER JOIN user
                ON article.post_author = user.id
            WHERE article.post_author=?"
        );
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        $articles = $req->fetchAll();
        foreach ($articles as $article) {
            $req = $this->bdd->prepare(
                "SELECT comment.*, CONCAT(user.name, ' ',  user.last_name) AS author FROM comment
                    INNER JOIN user
                        ON comment.comment_author = user.id
                    WHERE comment.blogpost_id=? AND comment.validation=0
                    ORDER BY comment.date"
            );
            $req->execute(array($article->id));
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comment");
            $article->commentList = $req->fetchAll();
        }
        return $articles;
    }

    /**
     * Get the user by author ID.
     * @param int $author The author ID.
     * @return array|false The array of user object or false if not found.
     */
    public function getByAuthor($author)
    {
        $req = $this->bdd->prepare("SELECT * FROM user WHERE id=?");
        $req->execute(array($author));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
        return $req->fetchAll();
    }

    /**
     * Returns a list of comments for a given article.
     *
     * @param int $article The ID of the article to retrieve comments for.
     * @return array An array of Comment objects representing the comments for the given article.
     */
    public function getComment($article)
    {
        $req = $this->bdd->prepare("SELECT * FROM comment WHERE blogpost_id=?");
        $req->execute(array($article));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comment");
        return $req->fetchAll();
    }

    /**
     * Retrieves an article by its date.
     * @param string $date The date of the article to retrieve.
     * @return Article|null The article object if found, null otherwise.
     */
    public function getByDate($date)
    {
        $req = $this->bdd->prepare("SELECT * FROM article WHERE date=?");
        $req->execute(array($date));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Article");
        return $req->fetch();
    }

    /**
     * Fetches a User object by their ID.
     * @param int $author The ID of the author.
     * @return User|null The User object if found, null otherwise.
     */
    public function getAuthor($author)
    {
        $req = $this->bdd->prepare("SELECT * FROM user WHERE id=?");
        $req->execute(array($author));
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
        return $req->fetch();
    }
}
