<?php

class PageController extends Controller {

    public function index() {

        $page = new Page(array(
            'name' => 'Awesome'
        ));

        $page->save();

        $page2 = new Page();
        $page2->save();

        $this->response = Page::getAll();
    }

} 