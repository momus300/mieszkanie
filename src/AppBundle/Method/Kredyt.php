<?php

namespace AppBundle\Method;

use Symfony\Component\HttpFoundation\Request;

class Kredyt
{
    const OPROCENTOWANIE = 0.285;//PkoBP
    const ILOSC_MIESIECY = 12;
    protected $wartoscMieszkania;
    protected $rat;
    protected $request;
    protected $fKwotaKredytu;
    protected $fKwotaRaty;
    protected $fKwotaKredytuMDM;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->wartoscMieszkania = $request->get('wartosc_mieszkania');
        $this->rat = $request->get('rat');
    }

    public function obliczKredyt()
    {
        $this->setKwotaKredytu();
        $this->setKwotaKredytuMDM();
        $this->setKwotaRatyKredytu();
    }

    private function setKwotaKredytu()
    {
        $this->fKwotaKredytu = $this->wartoscMieszkania + ($this->wartoscMieszkania * self::OPROCENTOWANIE);
    }

    private function setKwotaKredytuMDM()
    {
        $this->fKwotaKredytuMDM = $this->getKwotaKredytu() * 0.90;
    }

    private function setKwotaRatyKredytu()
    {
        $this->fKwotaRaty = round($this->fKwotaKredytuMDM / $this->rat / self::ILOSC_MIESIECY, 2);
    }

    /**
     * @return mixed
     */
    public function getKwotaKredytu()
    {
        return $this->fKwotaKredytu;
    }

    /**
     * @return mixed
     */
    public function getKwotaRaty()
    {
        return $this->fKwotaRaty;
    }

    /**
     * @return mixed
     */
    public function getRat()
    {
        return $this->rat;
    }

    /**
     * @return mixed
     */
    public function getWartoscMieszkania()
    {
        return $this->wartoscMieszkania;
    }

    /**
     * @return mixed
     */
    public function getKwotaKredytuMDM()
    {
        return $this->fKwotaKredytuMDM;
    }



}