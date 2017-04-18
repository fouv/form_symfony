<?php

namespace FormsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PersonController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
