<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 11/9/16
 * Time: 5:07 AM
 */

namespace AppBundle\Method;

class Porownanie
{
    protected $fWBlotoKredyt;
    protected $fWBlotoWynajem;
    /**
     * @var Kredyt
     */
    private $kredyt;
    /**
     * @var Wynajem
     */
    private $wynajem;

    /**
     * Porownanie constructor.
     * @param Kredyt $kredyt
     * @param Wynajem $wynajem
     */
    public function __construct(Kredyt $kredyt, Wynajem $wynajem)
    {
        $this->kredyt = $kredyt;
        $this->wynajem = $wynajem;
    }

    public function obliczRoznice()
    {
        $this->setWBlotoKredyt();
        $this->setWBlotoWynajem();
    }

    private function setWBlotoKredyt()
    {
        $this->fWBlotoKredyt = $this->kredyt->getKwotaKredytuMDM() - $this->kredyt->getWartoscMieszkania();
    }

    private function setWBlotoWynajem()
    {
        $this->fWBlotoWynajem = $this->wynajem->getKosztWynajmuMieszkania();
    }

    /**
     * @return mixed
     */
    public function getWBlotoKredyt()
    {
        return $this->fWBlotoKredyt;
    }

    /**
     * @return mixed
     */
    public function getWBlotoWynajem()
    {
        return $this->fWBlotoWynajem;
    }

    public function getRoznica()
    {
        return $this->fWBlotoKredyt - $this->fWBlotoWynajem;
    }


}