<?php
namespace shsergey17\brackets_checker;

Class File {
    
    private $filename;
    
    /**
     * 
     * @param string $filename
     * @throws \Exception
     */
    public function __construct($filename) {
        
        if(!file_exists($filename)){
            throw new \Exception("File not found");
        }
        if(!is_readable($filename)){
            throw new \Exception("File not readable");
        }
        $this->filename = $filename;
    }

    public function getContent()
    {
        return file_get_contents($this->filename);
    }
}