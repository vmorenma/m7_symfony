<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 15/11/2016
 * Time: 19:44
 */

namespace AppBundle\Service;


require_once "Racional";


class RationalCalculator
{
    private  $n1;
    private $n2;
    private $result;

    public function __construct($op1=null , $op2=null , $op3=null , $op4=null)
    {
        $this->n1= new Racional();
        $this->n2= new Racional();
        $this->result= new Racional();
        $this->n1->setNumerador($op1);
        $this->n1->setDenominador($op2);
        $this->n2->setNumerador($op3);
        $this->n2->setDenominador($op4);
    }

    /**
     * @return Racional
     */
    public function getN1()
    {
        return $this->n1;
    }

    /**
     * @param Racional $n1
     */
    public function setN1($n,$d)
    {
        $this->n1->setNumerador($n);
        $this->n1->setDenominador($d);
    }

    /**
     * @return Racional
     */
    public function getN2()
    {
        return $this->n2;
    }

    /**
     * @param Racional $n2
     */
    public function setN2($n,$d)
    {
        $this->n2->setNumerador($n);
        $this->n2->setDenominador($d);
    }



    public function multiply(){
        $this->result->setNumerador($this->n1->getNumerador()*$this->n2->getNumerador());
        $this->result->setDenominador($this->n1->getDenominador()*$this->n2->getDenominador());
    }
    public function divide(){
        $this->result->setNumerador($this->n1->getNumerador()*$this->n2->getDenominador());
        $this->result->setDenominador($this->n1->getDenominador()*$this->n2->getNumerador());
    }

    public function getResult(){
        return $this->result;
    }


}