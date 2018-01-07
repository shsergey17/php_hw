<?php

use shsergey17\brackets_checker\App;
use shsergey17\brackets_checker\File;
use shsergey17\brackets_checker\ArgumentException;
use shsergey17\brackets\Brackets;

class AppTest extends PHPUnit_Framework_TestCase
{
    public function testEmptyArgument()
    {
        $this->expectException(ArgumentException::class);
        new App(null);
    }
    
    public function testArgument()
    {
        $filename = 'file';
        $app = new App([null,$filename]);
        $this->assertTrue($filename == $app->getFilename());
    }
    
    /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp /^File not found$/
     */
    public function testFileNotFound()
    {
        $file = new File('not');
    }

    public function testFile()
    {
        $filename = 'file_test';
        $content = 'test';
        file_put_contents($filename, $content);
        $file = new File($filename);
        $this->assertTrue($content == $file->getContent());
        unlink($filename);
    }
    
    public function testBracketsOk()
    {
        $filename = 'file_test';
        $content = '()';
        file_put_contents($filename, $content);
  
        $BracketsChecker = new App([null,$filename]);
        $file = new File($BracketsChecker->getFilename());
        $this->assertTrue(Brackets::check($file->getContent()));
        unlink($filename);
    }
    
    public function testBracketsError()
    {
        $filename = 'file_test';
        $content = '(()()()()))((((()()()))(()()()(((()))))))';
        file_put_contents($filename, $content);
  
        $BracketsChecker = new App([null,$filename]);
        $file = new File($BracketsChecker->getFilename());
        $this->assertFalse(Brackets::check($file->getContent()));
        unlink($filename);
    }
}