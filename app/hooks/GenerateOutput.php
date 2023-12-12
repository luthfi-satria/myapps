<?php

namespace App\Hooks;

use CodeIgniter\Files\File;
use CodeIgniter\HTTP\Response;

class GenerateOutput extends Response{
    private $content;

    function setOutput($content){
        $files = new File($content);
        $this->content = $content;
        return $this;
    }

    function htmlOutput(){
        $this->setContentType('text/html')
             ->setHeader('Accept-Ranges','bytes')
             ->appendHeader('Cache-Control','no-cache, no-store, must-revalidate post-check=0, pre-check=0')
             ->appendHeader('Pragma', 'no-cache')
             ->appendHeader('X-Content-Type-Options', 'nosniff')
             ->appendHeader('X-XSS-Protection', '1; mode=block')
             ->appendHeader('X-Frame-Options', 'SAMEORIGIN')
             ->setBody($this->content);
            
    }

    function JsonOutput($content){

    }
}