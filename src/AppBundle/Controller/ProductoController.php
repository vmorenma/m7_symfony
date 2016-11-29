<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Producto;
use Symfony\Component\HttpFoundation\Request;



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
        $p=$repo->find(1);
        $p = $repo->findOneBy(['name'=> 'Meizu MX5']);
        $p = $repo->findAll();
        $p= $repo->findOneBy(['id'=>1]);
        $p->setPrecio('1100');
        $p->setDescripcion('Black Friday - Que nos lo quitan de las manos');
        $m->flush();
        */
        $products = $repo->findAll();


        return $this->render(':producto:index.html.twig',
            [
                'productos'=> $products,
            ]
            );
    }
    /**
     * @Route("/update/{id}", name="app_producto_update")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateAction($id)
    {

        $m= $this->getDoctrine()->getManager();
        $repository= $m->getRepository('AppBundle:Producto');

        $producto = $repository->find($id);

        return $this->render(':producto:update.html.twig',
            [
                'producto'=>$producto,
            ]
        );
    }

    /**
     * @Route("/doUpdate", name="app_producto_doUpdate")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function doUpdateAction(Request $request)
    {
        $m= $this->getDoctrine()->getManager();
        $repo= $m->getRepository('AppBundle:Producto');
        $p1= $repo->find($request->request->get('id'));

        $p1
            ->setName($request->request->get('name'))
            ->setDescripcion($request->request->get('description'))
            ->setPrecio($request->request->get('prize'))
            ->setUpdatedAt(new \DateTime())
        ;

        $m->flush();
        return $this->redirectToRoute('app_producto_index');
    }

    /**
     * @Route("/remove/{id}", name="app_producto_remove")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeAction($id)
    {
        $m= $this->getDoctrine()->getManager();
        $repo= $m->getRepository('AppBundle:Producto');
        $producto = $repo->find($id);
        $m->remove($producto);
        $m->flush();

        return $this->redirectToRoute('app_producto_index');
    }
    /**
     * @Route("/insert", name="app_producto_insert")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function insertAction()
    {
        return $this->render(':producto:insert.html.twig');
    }

    /**
     * @Route ("/doInsert", name="app_producto_doInsert")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doInsertAction(Request $request)
    {
        $m= $this->getDoctrine()->getManager();

        $p1= new Producto();

        $p1
            ->setName($request->request->get('name'))
            ->setDescripcion($request->request->get('description'))
            ->setPrecio($request->request->get('prize'))
        ;
        $m->persist($p1);
        $m->flush();

        return $this->redirectToRoute('app_producto_index');
    }
}
