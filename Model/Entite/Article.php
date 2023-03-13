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

    public function getCaption()
	{
		return $this->caption;
	}

    public function setCaption($caption)
	{
		$this->caption = $caption;
	}

    public function getContent()
	{
		return $this->content;
	}

    public function setContent($content)
	{
		$this->content = $content;
	}

    public function getAuthorId()
	{
		return $this->author;
	}

    public function setAuthor($author)
	{
		$this->author = $author;
	}

}


