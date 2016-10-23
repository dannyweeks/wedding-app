<?php

namespace Weeks\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('WeeksAppBundle:Default:index.html.twig');
    }
}
