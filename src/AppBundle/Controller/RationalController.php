<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 15/11/2016
 * Time: 19:46
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\RationalCalculator;


class RationalController extends Controller
{
    /**
     * @Route("/", name="app_rational_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(':rational:index.html.twig');
    }

    /**
     * @Route("/multi", name="app_rational_multi")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function multiAction()
    {
        return $this->render(':rational:form.html.twig',
            [
                'action'=> 'app_rational_doMulti'
            ]
        );
    }
    /**
     * @Route("/doMulti", name="app_rational_doMulti")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function doMultiAction(Request $request)
    {
        $RCalculator= new RationalCalculator($request->request->get('op1'),$request->request->get('op2')
            ,$request->request->get('op3'),$request->request->get('op4'));
        $RCalculator->multiply();
        $r= $RCalculator->getResult();
        return $this->render(':rational:resultado.html.twig',
            [
                'resultado'=>$r
            ]);
    }

    /**
     * @Route ("/divide", name="app_rational_divide")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function divideAction()
    {
        return $this->render(':rational:form.html.twig',
            [
                'action'=>'app_rational_doDivision'
            ]);
    }

    /**
     * @Route ("/doDivision", name="app_rational_doDivision")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doDivisionAction(Request $request)
    {
        $RCalculator= new RationalCalculator($request->request->get('op1'),$request->request->get('op2')
            ,$request->request->get('op3'),$request->request->get('op4'));
        $RCalculator->divide();
        $r= $RCalculator->getResult();
        return $this->render(':rational:resultado.html.twig',
            [
                'resultado'=>$r
            ]);
    }
}