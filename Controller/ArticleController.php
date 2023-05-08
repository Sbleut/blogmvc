<?php

class ArticleController extends BaseController
{
    /**
     * Magazine : Display list-article's view
     *
     * @return void
     */
    public function Magazine()
    {
        $this->View("list-article");
    }

    /**
     * ArticlePage : Display detailled article's view
     *
     * @return void
     */
    public function ArticlePage()
    {
        $this->View("article");
    }

    /**
     * ArtcileForm : Display Article's Creation view
     *
     * @return void
     */
    public function ArticleForm()
    {
        $this->View('create-article');
    }

    /**
     * ArticleUpdateForm : Display Artcile's Update view
     *
     * @return void
     */
    public function ArticleUpdateForm()
    {
        $this->View("update-article");
    }

    /**
     * ArticleDetail : Given the Article's ID calls the Article's manager function that provide the article object. Pass the Article objet to the article page.
     *
     * @param [integer] $iId
     * @return void
     */
    public function ArticleDetail($iId)
    {
        $article = $this->ArticleManager->getByIdWithData($iId);

        $article->commentList = array_filter($article->commentList, function ($comment) {
            return $comment->getValidation() == '1';
        });
        $this->addParam("article", $article);
        $this->ArticlePage();
    }

    /**
     * ArticleDetailUpdate : Given the Article's ID calls the Article's manager function that provide the article. Pass the article object to the article's update page.
     *
     * @param [integer] $iId
     * @return void
     */
    public function ArticleDetailUpdate($iId)
    {
        $article = $this->ArticleManager->getById($iId);

        $author = $this->ArticleManager->getAuthor($article->post_author);
        $article->setPost_author($author);

        $this->addParam("article", $article);
        $this->ArticleUpdateForm();
    }

    /**
     * ArticlesList : Display a paginated list of articles.
     *
     * @param int $page The page number to display.
     * @return void
     */
    public function ArticlesList($page = 1)
    {
        // Set number of articles to display per page
        $articlesPerPage = 5;

        // Calculate offset for SQL query
        $offset = ($page - 1) * $articlesPerPage;

        $articlesList = $this->ArticleManager->getAllArticles($offset, $articlesPerPage);
        foreach ($articlesList as $article) {
            $author = $this->ArticleManager->getAuthor($article->post_author);
            $article->setPost_author($author->getName() . ' ' . $author->getLast_name());
        }
        $totalPages = ceil($this->ArticleManager->getTotal() / $articlesPerPage);
        $data = [
            "articlesPerPage" => $articlesPerPage,
            "page" => $page,
            "totalPages" => $totalPages
        ];
        $this->addParam("data", $data);
        $this->addParam("articlesList", $articlesList);
        $this->Magazine();
    }

    /**
     * Article Create is function to create an article from 3 parameters. It pushs data in Bdd using Article Manager. If there is a Bdd Error throw the Bdd error. Eventually redirect to article's page.
     *
     * @param [string] $title
     * @param [string] $chapo
     * @param [string] $content
     * @return void
     */
    public function ArticleCreate($title, $chapo, $content)
    {
        $article = new Article();
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $author = $_SESSION['user']->getId();
        $article->populate($iId = null, $title, $chapo, $content, $author, $date);
        $result = $this->ArticleManager->create($article, ['title', 'chapo', 'content', 'post_author', 'date']);
        if (!$result) {
            throw new BDDCreationException();
        }
        $article = $this->ArticleManager->getByDate(htmlspecialchars($article->date, ENT_QUOTES, 'UTF-8'));

        $this->redirect('/Article/' . $article->id);
    }

    /**
     * Update an article in the database.
     * @param int $iId The ID of the article to update.
     * @param string $title The new title for the article.
     * @param string $chapo The new chapo for the article.
     * @param string $content The new content for the article.
     * @throws BDDCreationException If the update failed.
     * @return void
    */
    
    public function ArticleUpdate($iId, $title, $chapo, $content)
    {
        $article = $this->ArticleManager->getById($iId);

        $article->setTitle($title);
        $article->setChapo($chapo);
        $article->setContent($content);
        $result = $this->ArticleManager->update($article, ['title', 'chapo', 'content', 'post_author', 'date']);
        if (!$result) {
            throw new BDDCreationException();
        }
        $article = $this->ArticleManager->getByDate(htmlspecialchars($article->date, ENT_QUOTES, 'UTF-8'));

        $this->redirect('/Article/' . $article->id);
    }

    /**
     * Article Create is function to create an article from 3 parameters. It pushs data in Bdd using Article Manager. If there is a Bdd Error throw the Bdd error. Eventually redirect to article's page.
     *
     * @param [integer] $iId
     * @return void
     */
    public function getArtcilesByAuthor($iId)
    {

        $articlesList = $this->ArticleManager->getByAuthor($iId);
        return $articlesList;
    }
}
