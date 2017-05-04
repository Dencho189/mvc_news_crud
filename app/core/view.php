<?php

class View
{
    public $layout = 'layout.php';

    function generate($content_view, $data = null)
    {

        if(is_array($data)) {
            extract($data);
        }


        include 'app/views/layout/'.$this->layout;
    }
}