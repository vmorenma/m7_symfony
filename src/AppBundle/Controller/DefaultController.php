<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/nombre/{name}", name="app_default_index")
     */
    public function indexAction($name)
    {
        return new Response("Hello".$name);
    }

    /**
     * @Route ("/prueba1", name="app_default_pruebaVista")
     */
    public function pruebaVistaAction()
    {
        return $this->render(':default:vista1.html.twig',[
            'titulo'    => 'Mi página web',
            'resultado' => '3',
        ]);

    }
}
