<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cours;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Seminaire;


class AppliController extends Controller
{
    
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/creercours", name="CreerCours")
     */
    public function creerCoursACtion(Request $request){
        $cours = new Cours();
        $form = $this->createFormBuilder($cours)
            ->add('libellecours', TextType::class, array('label' => 'Libéllé du cours :'))
            ->add('nbjours', IntegerType::class, array('label' => 'Nb jours : :'))
            ->add('save', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$task = $form->getData(); Transitivité made by Rémy
            $em = $this->getDoctrine()->getManager();
            $em->persist($cours);
            $em->flush();
            return $this->render('ok.html.twig', array('message' => 'Cours Créé'));
        }
        return $this->render('cours.html.twig', array('leFormulaire' => $form->createView()));
    }

    /**
     * @Route("/creerseminaire", name="creerSeminaire")
     */
    public function creerSeminaireAction(Request $request){
        $seminaire = new Seminaire();
        $form = $this->createFormBuilder($seminaire)
            ->add('dateDebutSem', DateType::class, array('label' => 'Date du début du Séminaire : ', 'data' => new \DateTime()))
            ->add('cours', EntityType::class, array('class' => 'AppBundle:Cours',
                'label' => 'Cours :',
                'required' => 'true:',
                'multiple' => false,
                'choice_label' => 'libelleCours',
                ))
            ->add('Enrengistrer', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$task = $form->getData(); Transitivité made by Rémy
            $em = $this->getDoctrine()->getManager();
            $em->persist($seminaire);
            $em->flush();
            return $this->render('ok.html.twig', array('message' => 'Cours Créé'));
        }
        return $this->render('cours.html.twig', array('leFormulaire' => $form->createView()));
    }


}
