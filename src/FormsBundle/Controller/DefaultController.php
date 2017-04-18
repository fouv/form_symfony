<?php

namespace FormsBundle\Controller;

use FormsBundle\Entity\Person;
use FormsBundle\Form\PersonForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('FormsBundle:Default:index.html.twig');
    }
    /**
     * @Route("/add", name="add")
     */
    public function addAction(Request $request)
    {
        $person = new Person();


        $form = $this->createForm(PersonForm::class, $person);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('FormsBundle:Default:add.html.twig', array(
            'form'  => $form->createView(),
        ));
    }
}
