<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\Calculator;

class CalculatorController extends Controller
{
    /**
     * @Route("/", name="app_calculator_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(':calculator:index.html.twig');
    }

    /**
     * @Route (path="/sum",name="app_calculator_sum")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function sumAction(){
        return $this->render(':calculator:form.html.twig',
            [
                'action'=> 'app_calculator_doSum'
            ]
        );

    }

    /**
     * @Route (path="/doSum", name="app_calculator_doSum")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function doSumAction(Request $request){
        $calculator= new Calculator($request->request->get('op1'),$request->request->get('op2'));
        $calculator->suma();
        $r=$calculator->getRes();
        return $this->render(':calculator:resultado.html.twig',
            [
                'resultado'=>$r
            ]);
    }

    /**
     * @Route (path="/resta",name="app_calculator_resta")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function restaAction(){
        return $this->render(':calculator:form.html.twig',
            [
                'action'=> 'app_calculator_doResta'
            ]
        );

    }

    /**
     * @Route (path="/doResta", name="app_calculator_doResta")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function doRestaAction(Request $request){
        $calculator= new Calculator($request->request->get('op1'),$request->request->get('op2'));
        $calculator->resta();
        $r=$calculator->getRes();
        return $this->render(':calculator:resultado.html.twig',
            [
                'resultado'=>$r
            ]);
    }

    /**
     * @Route (path="/multi",name="app_calculator_multi")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function multiAction(){
        return $this->render(':calculator:form.html.twig',
            [
                'action'=> 'app_calculator_doMulti'
            ]
        );

    }

    /**
     * @Route (path="/doMulti", name="app_calculator_doMulti")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function doMultiAction(Request $request){
        $calculator= new Calculator($request->request->get('op1'),$request->request->get('op2'));
        $calculator->multiplicacion();
        $r=$calculator->getRes();
        return $this->render(':calculator:resultado.html.twig',
            [
                'resultado'=>$r
            ]);
    }

    /**
     * @Route (path="/division",name="app_calculator_division")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function divisionAction(){
        return $this->render(':calculator:form.html.twig',
            [
                'action'=> 'app_calculator_doDivision'
            ]
        );

    }

    /**
     * @Route (path="/doDivision", name="app_calculator_doDivision")
     * @return \Symfony\Component\HttpFoundation\Response
     * $request->request->get('op1');
     */

    public function doDivisionAction(Request $request){
        $calculator= new Calculator($request->request->get('op1'),$request->request->get('op2'));
        $calculator->division();
        $r=$calculator->getRes();
        return $this->render(':calculator:resultado.html.twig',
            [
                'resultado'=>$r
            ]);
    }
}
