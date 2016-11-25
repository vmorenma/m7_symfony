<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 22/11/2016
 * Time: 20:32
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;



class UsuarioController extends Controller
{
    /**
     * @Route("/", name="app_usuario_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m= $this->getDoctrine()->getManager();
        $user1= new Usuario();
        $user1
            ->setEmail('user1@email.com')
            ->setPassword('1234')
            ->setUsername('user1')
        ;
        $m->persist($user1);

        $user2 = new Usuario();
        $user2->setEmail('user2@email.com');
        $user2->setPassword('1234');
        $user2->setUsername('user2');

        $m->persist($user2);

        $user3 = new Usuario();
        $user3->setEmail('user3@email.com');
        $user3->setPassword('1234');
        $user3->setUsername('user3');

        $m->persist($user3);

        $m->flush();



        return $this->render(':usuario:succes.html.twig');
    }
}