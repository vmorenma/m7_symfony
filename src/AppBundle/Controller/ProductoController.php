<?php

namespace AppBundle\Controller;

use AppBundle\Form\ProductoType;
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

        $form=$this->createForm(ProductoType::class,$producto);

        return $this->render(':producto:form.html.twig',
            [
                'form'=>$form->createView(),
                'action'=>$this->generateUrl('app_producto_doUpdate',['id'=>$id])
            ]
        );
    }

    /**
     * @Route("/doUpdate/{id}", name="app_producto_doUpdate")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function doUpdateAction($id,Request $request)
    {
        $m= $this->getDoctrine()->getManager();
        $repo= $m->getRepository('AppBundle:Producto');
        $p1= $repo->find($id);
        $form=$this->createForm(ProductoType::class,$p1);

        //El producto es actualizado con los estos datos
        $form->handleRequest($request);
        $p1->setUpdatedAt();

        if($form->isValid()){
            $m->flush();
            $this->addFlash('messages','Product Updated');

            return $this->redirectToRoute('app_producto_index');
        }

        $this->addFlash('message' , 'Review your form');
        return $this->render(':producto:form.html.twig',
            [
                'form'=> $form->createView(),
                'action'=> $this->generateUrl('app_producto_doUpdate',['id'=>$id]),
            ]

        );

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
        $p= new Producto();
        $form= $this->createForm(ProductoType::class,$p);

        return $this->render(':producto:form.html.twig',
            [
                'form'    =>  $form->createView(),
                'action'  => $this->generateUrl('app_producto_doInsert')
            ]
        );
    }

    /**
     * @Route ("/doInsert", name="app_producto_doInsert")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doInsertAction(Request $request)
    {
        $p=new Producto();
        $form=$this->createForm(ProductoType::class,$p);
        $form->handleRequest($request);
        if($form->isValid()) {
            $m = $this->getDoctrine()->getManager();
            $m->persist($p);
            $m->flush();

            $this->addFlash('messages', 'Product added');
            return $this->redirectToRoute('app_producto_index');
        }
        $this->addFlash('messages','Review your form data');

        return $this->render(':producto:form.html.twig',
            [
                'form'  =>  $form->createView(),
                'action'=>  $this->generateUrl('app_producto_doInsert')
            ]
        );
    }
}
