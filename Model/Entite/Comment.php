<?php
class Comment
{
    public $id;
    public $content;
    public $comment_author;
    public $blogpost_id;
    private $validation;
    public $date;

    public function __construct()
    {
    }

    public function populate($id, $content, $date, $comment_author, $blogpost_id, $validation)
    {
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->comment_author = $comment_author;
        $this->blogpost_id = $blogpost_id;
        $this->validation = $validation;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getComment_author()
    {
        return $this->comment_author;
    }

    public function setComment_author($comment_author)
    {
        $this->comment_author = $comment_author;
    }

    public function getBlogpost_id()
    {
        return $this->blogpost_id;
    }

    public function setBlogPost_id($blogpost_id)
    {
        $this->blogpost_id = $blogpost_id;
    }

    public function getValidation()
    {
        return $this->validation;
    }

    public function setValidation($validation)
    {
        $this->validation = $validation;
    }


    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

}