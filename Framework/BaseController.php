<?php

/**

 * The BaseController class is the parent class for all controllers in the application.

 * It provides several methods that can be used by the child classes such as rendering views,

 * adding parameters, CSS and JS files, redirecting to a specific URL, and binding managers to the object.

 * @category Framework

 * @package BaseController

 * @link [URL]
 */
class BaseController
{
    /** 
     * The HttpRequest object that represents the current HTTP request.
     * @var object
     */
    private $httpRequest;
    /**
     * The session manager object that is used to manage sessions.
     * @var object
     */
    private $sessionManager;
    /** 
     * An associative array of parameters that will be used to render views.
     * @var array
     */    
    private $param;
    /** 
     * The configuration object that stores various settings such as database credentials.
     * @var object
     */
    private $config;
    /** 
     * The FileManager object that is used to manage CSS and JS files.
     * @var object
     */
    private $fileManager;
    /** 
     * The title of the current page that will be used in the layout.
     * @var string
     */
    protected $title;

    /**

     * The constructor method that is called when a new object is created.
     * @param object $httpRequest The HttpRequest object that represents the current HTTP request.
     * @param object $config The configuration object that stores various settings such as database credentials.
     */
    public function __construct($httpRequest, $config, $sessionManager)
    {
        $this->httpRequest = $httpRequest;
        $this->sessionManager = new SessionManager();
        $this->sessionManager->set('httprequest', $httpRequest);
        $this->config = $config;
        $this->param = array();
        $this->addParam("httprequest", $this->httpRequest);
        $this->addParam("config", $this->config);
        $this->bindManager();
        $this->fileManager = new FileManager();
        $this->title = $this->httpRequest->getRoute()->getTitle();
    }

    /**
     * Renders a view with the specified filename.
     * @param string $filename The name of the view file to render.
     * @throws ViewNotFoundException if the view file does not exist.
     */
    public function view($filename)
    {
        if (file_exists("View/" . $this->httpRequest->getRoute()->getController() . "/css/" . $filename . ".css")) {
            $this->addCss("View/" . $this->httpRequest->getRoute()->getController() . "/css/" . $filename . ".css");
        }
        if (file_exists("View/" . $this->httpRequest->getRoute()->getController() . "/js/" . $filename . ".js")) {
            $this->addJs("View/" . $this->httpRequest->getRoute()->getController() . "/js/" . $filename . ".js");
        }
        if (file_exists("View/" . $this->httpRequest->getRoute()->getController() . "/" . $filename . ".php")) {

            ob_start();
            extract($this->param);
            include("View/" . $this->httpRequest->getRoute()->getController() . "/" . $filename . ".php");

            $content = ob_get_clean();

            $title = $this->title;
            $jsContent = $this->fileManager->generateJs($filename);
            $cssContent = $this->fileManager->generateCss($filename);

            include("View/layout.php");
        } else {
            throw new ViewNotFoundException();
        }
    }

    /**
     * Binds the manager objects for the current route to the controller
     *
     * @return void
     */
    public function bindManager()
    {
        foreach ($this->httpRequest->getRoute()->getManager() as $manager) {
            $this->$manager = new $manager($this->config->database);
        }
    }

    /**
     * 
     * Add a parameter to the controller's parameter array
     * @param string $name The name of the parameter
     * @param mixed $value The value of the parameter
     * @return void
     */

    public function addParam($name, $value)
    {
        $this->param[$name] = $value;
    }

    /**
     * Adds a CSS file to the file manager
     *
     * @param string $file The path to the CSS file
     *
     * @return void
     */
    public function addCss($file)
    {
        $this->fileManager->addCss($file);
    }

    /**
     * Adds a JavaScript file to the list of files to include in the view
     *
     * @param string $file The path to the JavaScript file
     *
     * @return void
     */
    public function addJs($file)
    {
        $this->fileManager->addJs($file);
    }

    /**
     * Redirects the user to the specified URL using a header location redirect
     *
     * @param string $url The URL to redirect to
     *
     * @return void
     */
    public function redirect($url)
    {
        header('location: ' . $this->config->basepath . $url);
    }
}
