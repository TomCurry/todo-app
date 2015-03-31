<?php

namespace Todo\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TaskBundle:Default:index.html.twig', array('name' => $name));
    }
}
