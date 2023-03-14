<?php 
class Article
{
    public $id;
    public $title;
    public $chapo;
    public $content;
    public $post_author;
    public $date;

    public function __construct()
    {
    }

    public function populate($id, $title, $caption, $content, $author, $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->chapo = $caption;
        $this->content = $content;
        $this->post_author = $author;
        $this->date = $date;

    }

    public function getId()
	{
		return $this->id;
	}

    public function getTitle()
	{
		return $this->title;
	}

    public function setTitle($title)
	{
		$this->title = $title;
	}

    public function getChapo()
	{
		return $this->chapo;
	}

    public function setChapo($chapo)
	{
		$this->chapo = $chapo;
	}

    public function getContent()
	{
		return $this->content;
	}

    public function setContent($content)
	{
		$this->content = $content;
	}

    public function getPost_author()
	{
		return $this->post_author;
	}

    public function setPost_author($post_author)
	{
		$this->post_author = $post_author;
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


