<?php
/**
 * Article Entity defines the different Attributes of the class and its differents methods
 */
class Article
{
	/**
	* The id of the objet in Bdd
	* @var integer
	*/
	public $iId;
	/**
	* A string defining the title. Stored in Bdd as varchar(45)
	* @var string
	*/
	public $title;
	/**
	* A string defining the chapo. Stored in Bdd as tinytext
	* @var string
	*/
	public $chapo;
	/**
	* A string defining the chapo. Stored in Bdd as longtext
	* @var string
	*/
	public $content;
	/**
	* A User Object stored in Bdd as integer but instanciated when called.
	* @var object
	*/
	public $post_author;
	/**
	* A datetime of the article's creation. Stored in format (YYYY-MM-DD hh:mm:ss)
	* @var datetime
	*/
	public $date;

	/**
	 * The construct function is called directly by the manager, so it's not defined in the entity
	 * 
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * The populate function has purpose to give the class the data when needed. 
	 *
	 * @param [int] $iId
	 * @param [string] $title
	 * @param [string] $caption
	 * @param [string] $content
	 * @param [object] $author
	 * @param [datetime] $date
	 * @return void
	 */
	public function populate($iId, $title, $caption, $content, $author, $date)
	{
		$this->id = $iId;
		$this->title = $title;
		$this->chapo = $caption;
		$this->content = $content;
		$this->post_author = $author;
		$this->date = $date;
	}

	/**
	 * Getters for the id
	 *
	 * @return void
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Getters for the title
	 *
	 * @return string 
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Setters for the title
	 *
	 * @return void
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	* Getters for the Chapo
	* 
	* @return string
	*/
	public function getChapo()
	{
		return $this->chapo;
	}

	/**
	* Setters for the chapo
	*
	* @return void
	*/
	public function setChapo($chapo)
	{
		$this->chapo = $chapo;
	}

	/**
	* Getters for the Content
	* 
	* @return string
	*/
	public function getContent()
	{
		return $this->content;
	}

	/**
	* Setters for the content
	*
	* @return void
	*/
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	* Getters for the Author
	* 
	* @return object
	*/
	public function getPost_author()
	{
		return $this->post_author;
	}

	/**
	* Setters for the author
	*
	* @return void
	*/
	public function setPost_author($post_author)
	{
		$this->post_author = $post_author;
	}

	/**
	* Getters for the Author
	* 
	* @return datetime
	*/
	public function getDate()
	{
		return $this->date;
	}

	/**
	* Setters for the date
	*
	* @return void
	*/
	public function setDate($date)
	{
		$this->date = $date;
	}
}
