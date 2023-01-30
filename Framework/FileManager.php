<?php 

class FileManager
	{
		private $listJsFile;
        private $listCssFile;
		
		public function __construct()
		{
			$this->listJsFile = array();
			$this->listCssFile = array();
		}
		
		public function addJs($file)
        {
            $this->listJsFile[] = $file;
        }

        public function addCss($file)
        {
            $this->listCssFile[] = $file;
        }
		
		public function generateJs($jsFile)
        {
            $jsContent = '';
            foreach($this->listJsFile as $jsFile)
            {
                $jsContent .= '<script src="'. $jsFile . '" ></script>';
            }
            return $jsContent;
        }

        public function generateCss($cssFile)
        {
            $cssContent = '';
            foreach($this->listCssFile as $cssFile)
            {
                $cssContent .= '<link rel="stylesheet" type="text/css" href="' . $cssFile . '" />';
            }
            return $cssContent;
        }
	}