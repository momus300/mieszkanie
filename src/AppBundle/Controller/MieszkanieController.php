<?php

namespace AppBundle\Controller;

use AppBundle\Method\Kredyt;
use AppBundle\Method\Porownanie;
use AppBundle\Method\Wynajem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MieszkanieController extends Controller
{
    public function indexAction(Request $request)
    {
        $kredyt = $wynajem = $porownanie = null;
        if ($request->isMethod('POST')) {
            $kredyt = new Kredyt($request);
            $kredyt->obliczKredyt();
            $wynajem = new Wynajem($request);
            $wynajem->obliczWynajem();

            $porownanie = new Porownanie($kredyt, $wynajem);
            $porownanie->obliczRoznice();
        }

        return $this->render('@App/mieszkanie/mieszkanie.html.twig', ['kredyt' => $kredyt, 'wynajem' => $wynajem, 'porownanie' => $porownanie]);
    }
}
