<?php
namespace Core\File;

class File {

    private $filename;
    private $file;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function open($opening_mode){
        $file = fopen($this->filename, $opening_mode);
        $this->file = $file;
    }

    public function close(){
        fclose($this->file);
    }
    public function readline(){
        return fgets($this->file);
    }
    public function readAll(){
        $content= "";
        while(!feof($this->file)){
            $content .= fgets($this->file) . '<br/>';
        }
        return $content;
    }
    public function write($text){
        fputs($this->file, $text);
    }

    public function delete(){
        return unlink($this->filename);
    }
}