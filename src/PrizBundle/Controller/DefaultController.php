<?php

namespace PrizBundle\Controller;


use PrizBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $pm = new Project();
        $form = $this->createFormBuilder($pm)
                ->add('name', TextType::class)
                ->add('submit', SubmitType::class, array('label'=>'Salva'))
                ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $pm = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);



            // $em->flush();

            return $this->redirectToRoute('success');
        }
        return $this->render('PrizBundle:Default:index.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/success", name="success")
     */
    public function successAction(){

        return $this->render('PrizBundle:Default:success.html.twig');
    }
}
