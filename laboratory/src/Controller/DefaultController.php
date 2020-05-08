<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\User;
use App\Form\UserFormType;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    /*
    public function index()
    {
        
      //Service container responsible to save in the database
      
       $entitymanager = $this->getDoctrine()->getManager();  

       $users= $this->getDoctrine()->getRepository(User::class)->findAll(); 
       
       $arra = ['Adam','Robert','John','Susan'];
       $user = new User; 
       $user->setName('Apo');

       $user1 = new User; 
       $user1->setName('misaki');

       $user2 = new User; 
       $user2->setName('Rose');

       $user3 = new User; 
       $user3->setName('Chistine');

       $entitymanager->persist($user);
       $entitymanager->persist($user1);
       $entitymanager->persist($user2);
       $entitymanager->persist($user3);

      //exit($entitymanager->flush()); //save to the database





        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users'=>$users,
        ]); 
        

        return $this->json(['username'=>'Jackson kambaragye']); for api



        return  new Response('Hello Misaki', $name);

        @Route("/default2/", name="default2")
        return $this->redirectToRoute('default2'); // Redirect to another route

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
        ]);

        *
    } */
    /**
     * @Route("/default", name="default")
     */
    public function index(Request $request)
    {
        
      //Service container responsible to save in the database
      
       $entitymanager = $this->getDoctrine()->getManager();  

       $users= $this->getDoctrine()->getRepository(User::class)->findAll(); 
       
       $user = new User(); 
      // $user->setName('Tweyambe');
       //$user->setCreatedAt(new \DateTime('tomorrow')); 
       //$user->setGender('Female');
       //$user->setAge('32');
     
       $form = $this->createForm(UserFormType::class, $user);

       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){

           dump($form->getData());

           $entitymanager->persist($user);

           $entitymanager->flush();

           return $this->redirectToRoute('default');

       }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'form' => $form->createView(),
        ]); 
    
    }
}
