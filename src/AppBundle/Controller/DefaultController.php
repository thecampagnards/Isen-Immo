<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $annonces = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Annonce')->findByActive(true);

        return $this->render('pages/index.html.twig', array('annonces' => $annonces));
    }
}
