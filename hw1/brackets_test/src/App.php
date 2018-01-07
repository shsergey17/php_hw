<?php
namespace shsergey17\brackets_checker;
Class ArgumentException extends \Exception{}

Class App {

    private $filename;
    
    /**
     * 
     * @param string $argv - filename
     * @throws OptionException
     */
    public function __construct($argv)
    {
        if(empty($argv[1])){
            throw new ArgumentException("No file specified");
        }
        $this->filename = $argv[1];
    }
    
    public function getFilename()
    {
        return $this->filename;
    }

    public static function help()
    {
        return <<<HELP

BracketsChecker
    Usage: ./brackets_checker <file>


HELP;
    }
}