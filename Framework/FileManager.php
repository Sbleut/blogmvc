<?php

/**
 *FileManager class manages JavaScript and CSS files in the website
 */

class FileManager
{
    /**
     * @var array
     */
    private $listJsFile;

    /**
     * @var array
     */
    private $listCssFile;

    /**
     * @var array
     */
    private $files;

    /**
     *Constructor for FileManager class.
     *Initializes the array of JavaScript and CSS files.
     */
    public function __construct()
    {
        $this->listJsFile = array();
        $this->listCssFile = array();
        $this->files = $_FILES;
    }

    /**
     *Adds a JavaScript file to the list of files.
     *@param string $file The path to the JavaScript file to be added
     *@return void
     */
    public function addJs($file)
    {
        $this->listJsFile[] = $file;
    }

    /**
     * Adds a CSS file to the list of files.
     * @param string $file The path to the CSS file to be added
     * @return void
     */
    public function addCss($file)
    {
        $this->listCssFile[] = $file;
    }

    /**
     * Generates the HTML code for all the JavaScript files added to the list.
     * @param string $jsFile The JavaScript file to be generated
     * @return string The HTML code for all the JavaScript files added to the list
     */
    public function generateJs($jsFile)
    {
        $jsContent = '';
        foreach ($this->listJsFile as $jsFile) {
            $jsContent .= '<script src="' . $jsFile . '" ></script>';
        }
        return $jsContent;
    }

    /**
     * Generates the HTML code for all the CSS files added to the list.
     * @param string $cssFile The CSS file to be generated
     * @return string The HTML code for all the CSS files added to the list
     */
    public function generateCss($cssFile)
    {
        $cssContent = '';
        foreach ($this->listCssFile as $cssFile) {
            $cssContent .= '<link rel="stylesheet" type="text/css" href="' . $cssFile . '" />';
        }
        return $cssContent;
    }

    public function getFiles(): array
    {
        return $this->files;
    }
}
