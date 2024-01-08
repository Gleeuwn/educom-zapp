<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\BezoekService;


class HomepageController extends AbstractController
{
    private $bs; 

    public function __construct(BezoekService $bs) {
        $this->bs = $bs;      
    }
    #[Route('/homepage', name: 'app_homepage')]
    public function index(): Response
    {
        $bezoeks = $this->bs->getAllBezoek();
        $medewerkers = $this->bs->getAllMedewerker();
        $klants = $this->bs->getAllklant();
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'bezoek' => $bezoeks,
            'medewerkers' => $medewerkers,
            'klants' => $klants
        ]);
        dd($bezoeks);
    }

    public function show($id): Response
    {
        $bezoeks = $this->bs->fetchBezoek($id);
        $medewerkers = $this->bs->getAllMedewerker();
        $klants = $this->bs->getAllklant();
        return $this->render('detailpagina/detailpagina.html.twig', [
            'bezoek' => $bezoeks,
            'medewerkers' => $medewerkers,
            'klants' => $klants
        ]);
        dd($bezoeks);
    }

    #[Route('/save', name: 'bezoek_save', methods: ['POST'])] 
    public function saveBezoek(Request $request) {

        $params = $request->request->all();
        file_put_contents('output.txt', print_r($params, true));
        $result = $this->bs->saveBezoek($params);

        $referer = $request->headers->get('referer');

        return $this->redirect($referer);

    }
    #[Route('/savehandeling', name: 'handeling_save')] 
    public function saveHandeling() {

        $handeling = [
            "bezoek_id" => 1,
            "taak_id" => 1, 
        ];

        $result = $this->bs->saveHandeling($handeling);
        dd($result);

    }
    
}
