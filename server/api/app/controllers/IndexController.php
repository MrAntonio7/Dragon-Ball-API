<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->disable();
        header("Location: http://dragonballapi.com");
        die();
    }

}

