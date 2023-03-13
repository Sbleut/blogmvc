<?php

class ArticleController extends BaseController
{
    public function Magazine()
    {
        $this->View("list-article");
    }

    public function ArticlesList()
    {
        $articlesList = $this->ArticleManager->getAllArticles();
        foreach($articlesList as $article)
        {
           $author = $this->ArticleManager->getAuthor($article->post_author);
           $article->setAuthor($author->getName() . $author->getLast_name());
        }
        
        parent::addParam("articlesList", $articlesList);
        $this->Magazine();
    }
}

?>