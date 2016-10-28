<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 28/10/2016
 * Time: 17:27
 */

namespace AppBundle\Service;


class Calculator
{
    /**
     * @var int
     */
    private $op1;
    /**
     * @var int
     */
    private $op2;
    /**
     * @var int
     */
    private $res;

    /**
     * Calculator constructor.
     * @param null $op1
     * @param null $op2
     * @param null $res
     */
    public function __construct($op1=null,$op2=null,$res=null)
    {
        $this->setOp1($op1);
        $this->setOp2($op2);
        $this->setRes($res);
    }

    /**
     * @return int
     */
    public function getOp1()
    {
        return $this->op1;
    }

    /**
     * @param int $op1
     */
    public function setOp1($op1)
    {
        $this->op1 = (int)$op1;
        return $this;
    }

    /**
     * @return int
     */
    public function getOp2()
    {
        return $this->op2;
    }

    /**
     * @param int $op2
     */
    public function setOp2($op2)
    {
        $this->op2 = (int)$op2;
        return $this;
    }

    /**
     * @return int
     */
    public function getRes()
    {
        return $this->res;
    }

    /**
     * @param int $res
     */
    public function setRes($res)
    {
        $this->res = (int)$res;
        return $this;
    }

    public function suma()
    {
        $this->setRes($this->getOp1()+$this->getOp2());
    }

    public function resta()
    {
        $this->setRes($this->getOp1()-$this->getOp2());
    }

    public function multiplicacion()
    {
        $this->setRes($this->getOp1()*$this->getOp2());
    }

    public function division()
    {
        $this->setRes($this->getOp1()/$this->getOp2());
    }

}