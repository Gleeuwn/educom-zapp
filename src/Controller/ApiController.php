<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\BezoekService;
use App\Service\HandelingService;
use App\Service\KlantService;
use App\Service\MedewerkerService;
use App\Service\TaakService;

class ApiController extends AbstractController
{

    private $bs;
    private $ks;
    private $hs;
    private $ts;
    private $ms; 

    public function __construct(BezoekService $bs, KlantService $ks, MedewerkerService $ms, HandelingService $hs, TaakService $ts) {
        $this->bs = $bs;
        $this->ks = $ks;
        $this->ms = $ms;
        $this->hs = $hs;
        $this->ts = $ts;
    }
#[Route('/savebezoek', name: 'api_bezoek', methods: ['POST'])] 
public function saveBezoek(Request $request) {

    $params = $request->request->all();
    file_put_contents('output.txt', print_r($params, true));
    $result = $this->bs->saveBezoek($params);

    $referer = $request->headers->get('referer');

    return $this->redirect($referer);

}
#[Route('/saveklant', name: 'api_klant', methods: ['POST'])] 
public function saveKlant(Request $request) {
    $params = $request->request->all();
    $result = $this->ks->saveKlant($params);
    $referer = $request->headers->get('referer');
    return $this->redirect($referer);

}
#[Route('/savemedewerker', name: 'api_medewerker', methods: ['POST'])] 
public function saveMedewerker(Request $request) {
    $params = $request->request->all();
    $result = $this->ms->saveMedewerker($params);
    $referer = $request->headers->get('referer');
    return $this->redirect($referer);

}
#[Route('/savetaak', name: 'api_taak', methods: ['POST'])] 
public function savetaak(Request $request) {
    $params = $request->request->all();
    $result = $this->ts->savetaak($params);
    $referer = $request->headers->get('referer');
    return $this->redirect($referer);

}
#[Route('/savehandeling', name: 'api_handeling', methods: ['POST'])] 
public function saveHandeling() {
    $params = $request->request->all();
    $result = $this->hs->savehandeling($params);
    $referer = $request->headers->get('referer');
    return $this->redirect($referer);

}
}
