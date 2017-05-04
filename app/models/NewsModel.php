<?php

class NewsModel extends Model
{
    protected $table = 'news_table';

    public function get_all(){

        $tasks = $this->get_all_items($this->table);

        return $tasks;
    }
}