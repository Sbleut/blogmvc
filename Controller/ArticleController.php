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

    public function ArticleDetail($id)
    {
        $article = $this->ArticleManager->getById($id);

        $author = $this->ArticleManager->getAuthor($article->post_author);
        $article->setPost_author($author->getName() . ' ' . $author->getLast_name());

        $this->addParam("article", $article);
        $this->ArticlePage();
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

    public function ArticleUpdate($title, $chapo, $content)
    {
    }
}
