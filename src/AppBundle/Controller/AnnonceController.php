<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\AnnonceType;
use AppBundle\Entity\Annonce;

class AnnonceController extends Controller
{

  /**
   * @Route("/annonces/ajouter", name="annonce_ajouter")
   */
  public function annonceAjouterAction(Request $request)
  {
      $annonce = new Annonce();
      $annonce->setActive(false);
      $form = $this->createForm(AnnonceType::class, $annonce);
      $form->handleRequest($request);
      if ($form->isSubmitted()){
        if($form->isValid()){
          $em = $this->getDoctrine()->getManager();
          $em->persist($annonce);
          $em->flush();
          //creation du mail
          $adminMails = $this
                  ->getDoctrine()
                  ->getManager()
                  ->getRepository('AppBundle:Utilisateur')->findEmailsByRole('ADMIN');

          $message = \Swift_Message::newInstance()
            ->setSubject('Nouvelle annonce de logement')
            ->setFrom($this->getParameter('mailer_user'))
            ->setBcc($adminMails)
            ->setBody(
              $this->renderView(
                'emails/annonce.html.twig',
                  array('annonce' => $annonce)
                ),
              'text/html'
            );
          //envoi du mail
          $this->get('mailer')->send($message);
        }
      }
      return $this->render('pages/annonce-ajouter.html.twig', array('form' => $form->createView()));
  }

  /**
   * @Route("/annonces/{id}", name="annonce")
   * @ParamConverter("annonce", class="AppBundle:Annonce")
   */
  public function annonceAction(Annonce $annonce)
  {
      return $this->render('pages/annonce.html.twig', array('annonce' => $annonce));
  }
}
