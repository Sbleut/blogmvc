<?php

class ArticleController extends BaseController
{
    public function Magazine()
    {
        $this->View("list-article");
    }

    public function ArticlePage()
    {
        $this->View("article");
    }

    public function ArticleForm()
    {
        $this->View('create-article');
    }

    public function ArticleUpdateForm()
    {
        $this->View("update-article");
    }

    public function ArticleDetail($id)
    {
        $article = $this->ArticleManager->getByIdWithData($id);
        
        $article->commentList = array_filter($article->commentList, function($comment){
            return $comment->getValidation() == '1';
        });
        $this->addParam("article", $article);
        $this->ArticlePage();
    }
    
    public function ArticleDetailUpdate($id)
    {
        $article = $this->ArticleManager->getById($id);

        $author = $this->ArticleManager->getAuthor($article->post_author);
        $article->setPost_author($author);

        $this->addParam("article", $article);
        $this->ArticleUpdateForm();
    }

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
        $article->populate($id = null, $title, $chapo, $content, $author, $date);
        $result = $this->ArticleManager->create($article, ['title', 'chapo', 'content', 'post_author', 'date']);
        if (!$result) {
            throw new BDDCreationException();
        }
        $article = $this->ArticleManager->getByDate($article->date);

        $this->redirect('/Article/' . $article->id);
    }

    public function ArticleUpdate($id, $title, $chapo, $content)
    {
        $article = $this->ArticleManager->getById($id);

        $article->setTitle($title);
        $article->setChapo($chapo);
        $article->setContent($content);
        $result = $this->ArticleManager->update($article, ['title', 'chapo', 'content', 'post_author', 'date']);
        if (!$result) {
            throw new BDDCreationException();
        }
        $article = $this->ArticleManager->getByDate($article->date);

        $this->redirect('/Article/' . $article->id);

    }

    /**
     * Article Create is function to create an article from 3 parameters. It pushs data in Bdd using Article Manager. If there is a Bdd Error throw the Bdd error. Eventually redirect to article's page.
     *
     * @param [integer] $id
     * @return void
     */
    public function getArtcilesByAuthor($id) 
    {
        
        $articlesList = $this->ArticleManager->getByAuthor($id);
        return $articlesList;
    }
}
