<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/// WE CREATE A CONTROLLER BY THE COMMAND IN THE TERMINAL : php bin/console make: controller AuthorController
class AuthorController extends AbstractController
{
   
   
   
    #[Route('/showauthor/{name}', name: 'showAuth')] /// route is a case sensitive
    public function index($name): Response
    {
        return $this->render('author/showauthor.html.twig', [    // render(): A method that tells Symfony to render a Twig template (HTML with embedded PHP-like syntax) and return it as part of the Response.
            'name' => $name, // 'name'  is a KEY THAT REFERS TO THE VALUE OF IN $name 
                             // $name is PHP variable that holds the actual value.
        ]);
    }
   
   
   
   
   
    #[Route('/listauthors', name: 'listauthors')] 
    public function listauthors(): Response  // Response is how Symfony sends back the content (webpages, data) to the user.
    {
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william_shakespeare.jpg','username' => ' William Shakespeare', 'email' =>  ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha-Hussein.jpg','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
            );
            
        return $this->render('author/list.html.twig', [
            'authors' => $authors, //// 'authors' is sent to the twig file under author
        ]);
    }


    
    #[Route('/authorDetails/{id}', name: 'authorDetails')] 
    public function authorDetails($id): Response
    {
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william_shakespeare.jpg','username' => ' William Shakespeare', 'email' =>  ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha-Hussein.jpg','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
            );
            $author = array_filter($authors, fn($a) => $a['id'] == $id); 
        return $this->render('author/detailsShow.html.twig', [    
            'id' => $id, 
            'author'=> reset($author) //The reset() function is called on the $author array, which is the result of the array_filter().
                             
        ]);
    }
}
