<?php

class PageController extends Controller{

    public function __construct()
    {
        $this->model = new PageModel();
        $this->view = new View();
    }

    public function action_index()
    {

        $file = new FileModel();

        $news_content = json_decode($file->get_content(), true);

        $this->view->generate('page/index.php', ['news' => $news_content]);
    }
}