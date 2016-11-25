<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class ProductoController extends Controller
{
    /**
     * @Route("/", name="app_producto_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m= $this->getDoctrine()->getManager();
        $repo= $m->getRepository('AppBundle:Producto');
        /*
        $p= new Producto();
        $p->setName('Meizu MX5');
        $p->setDescripcion('Chino con cierta garantia');
        $p->setPrecio('125');

        $m->persist($p);

        $m->flush();
        */

        //$p=$repo->find(1);
        //$p = $repo->findOneBy(['name'=> 'Meizu MX5']);
        //$p = $repo->findAll();
        $p= $repo->findOneBy(['id'=>1]);
        $p->setPrecio('1100');
        $p->setDescripcion('Black Friday - Que nos lo quitan de las manos');


        $m->flush();

        $products = $repo->findAll();


        return $this->render(':producto:index.html.twig',
            [
                'productos'=> $products,
            ]
            );
    }
}
