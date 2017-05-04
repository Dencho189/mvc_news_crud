<?php

class FileModel extends Model
{
    private $file;
    private $path = 'file/';
    private $file_name = 'news.txt';

    public function __construct()
    {
        if (!isset($this->file)){
            $this->file = fopen( $this->path . $this->file_name, 'r+' );
        }
    }

    public function get_content()
    {
        if (is_readable($this->path . $this->file_name)) {
            $contents = @fread($this->file, filesize($this->path . $this->file_name));
        } else {
            $contents = false;
        }
        return $contents;

    }

    public function save_content($string)
    {
        $this->file = fopen( $this->path . $this->file_name, 'w' );
        fwrite($this->file, $string);
    }

    public function close_file()
    {
        fclose($this->file);
    }
}