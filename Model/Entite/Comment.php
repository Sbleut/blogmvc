<?php

/**
 * Represents a comment object.
 */
class Comment
{
    public $id; // Comment ID
    public $content; // Comment content
    public $comment_author; // Name of the author who posted the comment
    public $blogpost_id; // ID of the blog post that the comment is associated with
    private $validation; // Validation status of the comment
    public $date; // Date and time the comment was posted

    /**
     * Constructor for the Comment object.
     */
    public function __construct()
    {
    }

    /**
     * Populates the Comment object with data.
     * @param int $id The ID of the comment.
     * @param string $content The content of the comment.
     * @param string $date The date and time the comment was posted.
     * @param string $comment_author The name of the author who posted the comment.
     * @param int $blogpost_id The ID of the blog post that the comment is associated with.
     * @param int $validation The validation status of the comment.
     * @return void
     */
    public function populate($id, $content, $date, $comment_author, $blogpost_id, $validation)
    {
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->comment_author = $comment_author;
        $this->blogpost_id = $blogpost_id;
        $this->validation = $validation;
    }

    /**
     * Gets the ID of the comment.
     * @return int The ID of the comment.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the content of the comment.
     * @return string The content of the comment.
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content of the comment.
     * @param string $content The content of the comment.
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Gets the name of the author who posted the comment.
     * @return string The name of the author who posted the comment.
     */
    public function getComment_author()
    {
        return $this->comment_author;
    }

    /**
     * Sets the name of the author who posted the comment.
     * @param string $comment_author The name of the author who posted the comment.
     * @return void
     */
    public function setComment_author($comment_author)
    {
        $this->comment_author = $comment_author;
    }

    /**
     * Gets the ID of the blog post that the comment is associated with.
     * @return int The ID of the blog post that the comment is associated with.
     */
    public function getBlogpost_id()
    {
        return $this->blogpost_id;
    }

    /**
     * Sets the ID of the blog post that the comment is associated with.
     * @param int $blogpost_id The ID of the blog post that the comment is associated with.
     * @return void
     */
    public function setBlogPost_id($blogpost_id)
    {
        $this->blogpost_id = $blogpost_id;
    }

    /**
     * Gets the validation status of the comment.
     * @return int The validation status of the comment.
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
    * Set the validation status of the comment.
    * @param bool $validation The validation status of the comment.
    * @return void
    */
    public function setValidation($validation)
    {
        $this->validation = $validation;
    }


    /**
    * Get the date of the comment
    * @return string The date of the comment
    */
    public function getDate()
    {
        return $this->date;
    }

    /**
    * Getter method for the date the comment was created.
    * @return string The date the comment was created.
    */
    public function setDate($date)
    {
        $this->date = $date;
    }
}
