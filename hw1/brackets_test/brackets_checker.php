#!/usr/bin/env php 
<?php
require_once 'autoload.php';

use shsergey17\brackets_checker\App;
use shsergey17\brackets_checker\File;
use shsergey17\brackets_checker\ArgumentException;
use shsergey17\brackets\Brackets;

try{
    
    $BracketsChecker = new App($argv);
    $file = new File($BracketsChecker->getFilename());

    if(Brackets::check($file->getContent())){
        print "Brackets - OK" . PHP_EOL;
    } else {
        print "Brackets - error" . PHP_EOL;
    }
    
} catch (\InvalidArgumentException $ex) {
    die(sprintf("Error: %s\n", $ex->getMessage()));
} catch (ArgumentException $ex) {
    die(sprintf("Argument error: %s\n%s", $ex->getMessage(), App::help()));
} catch (\Exception $ex) {
    die(sprintf("Error: %s\n", $ex->getMessage()));
}


