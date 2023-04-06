<?php

class About extends Controller {
    public function index($param1 = 'param1', $param2 = 'param2') {
        $data['param1'] = $param1;
        $data['param2'] = $param2;
        $data['title'] = "About Page";
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/header');
    }

    public function page() {
        $data['title'] = "Pages page";
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/header');
    }
}
