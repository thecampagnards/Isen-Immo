<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $annonces = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Annonce')->findBy(array('active'=> true), array('dateCreation' => 'DESC'));

        return $this->render('pages/index.html.twig', array('annonces' => $annonces));
    }
}
