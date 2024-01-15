<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\BezoekService;
use App\Service\HandelingService;
use App\Service\KlantService;
use App\Service\MedewerkerService;
use App\Service\TaakService;


class HomepageController extends AbstractController
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
    #[Route('/homepage', name: 'page_homepage')]
    public function index(): Response
    {
        $data = [
            'controller_name' => 'PageController',
            'bezoek' => $this->bs->getAllBezoek(),
            'medewerkers' => $this->ms->getAllMedewerker(),
            'klants' => $this->ks->getAllklant(),
        ];
    
        return $this->render('homepage/index.html.twig', $data);
    }

    #[Route('/medewerkers', name: 'page_medewerker')]
    public function medewerker(): Response
    {
    $data = [
        'medewerkers' => $this->ms->getAllMedewerker(),
    ];

    return $this->render('detailpagina/medewerkers.html.twig', $data);
    }
    #[Route('/klanten', name: 'page_klanten')]
    public function klant(): Response
    {
        return $this->render('detailpagina/klanten.html.twig', [
            'klants' => $this->ks->getAllklant(),
        ]);
    }

    public function show($id): Response
    {
        $data = [
            'bezoek' => $this->bs->fetchBezoek($id),
            'medewerkers' => $this->ms->getAllMedewerker(),
            'klants' => $this->ks->getAllklant(),
            'taaks' => $this->ts->getAllTaak(),
        ];
    
        return $this->render('detailpagina/detailpagina.html.twig', $data);
    }


    
}
