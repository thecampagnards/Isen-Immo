<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PartenairesController extends Controller
{
    /**
     * @Route("/partenaires", name="partenaires")
     */
    public function indexAction()
    {
        return $this->render('pages/partenaires.html.twig');
    }
}
