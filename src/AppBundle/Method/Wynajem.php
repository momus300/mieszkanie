<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 11/9/16
 * Time: 4:34 AM
 */

namespace AppBundle\Method;


use Symfony\Component\HttpFoundation\Request;

class Wynajem
{
    protected $przezOkresMiesiecy;
    protected $request;
    protected $kwotaWynajmu;

    /**
     * Wynajem constructor.
     * @param Request $request
     */
    public function __construct( Request $request)
    {
        $this->request = $request;
        $this->kwotaWynajmu = $request->get('kwota');
        $this->przezOkresMiesiecy = $request->get('przez_okres_miesiecy');
    }

    public function obliczWynajem()
    {
        $this->koszWynajmu = $this->getKosztWynajmuMieszkania();
    }

    public function getKosztWynajmuMieszkania()
    {
        return $this->kwotaWynajmu * $this->przezOkresMiesiecy;
    }

    /**
     * @return mixed
     */
    public function getKwotaWynajmu()
    {
        return $this->kwotaWynajmu;
    }

    /**
     * @return mixed
     */
    public function getPrzezOkresMiesiecy()
    {
        return $this->przezOkresMiesiecy;
    }
}