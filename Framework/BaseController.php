<?php
class BaseController
{
    private $httpRequest;
    private $param;
    private $config;
    private $fileManager;
    protected $title;

    public function __construct($httpRequest, $config)
    {
        $this->httpRequest = $httpRequest;
        $this->config = $config;
        $this->param = array();
        $this->addParam("httprequest", $this->httpRequest);
        $this->addParam("config", $this->config);
        $this->bindManager();
        $this->fileManager = new FileManager();
        $this->title = $this->httpRequest->getRoute()->getTitle();
    }

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
            include("View/layout.php");
        } else {
            throw new ViewNotFoundException();
        }
    }

    public function bindManager()
    {
        foreach ($this->httpRequest->getRoute()->getManager() as $manager) {
            $this->$manager = new $manager($this->config->database);
        }
    }

    public function addParam($name, $value)
    {
        $this->param[$name] = $value;
    }

    public function addCss($file)
    {
        $this->fileManager->addCss($file);
    }

    public function addJs($file)
    {
        $this->fileManager->addJs($file);
    }
}
