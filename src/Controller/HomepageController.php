<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'bezoek' => $bezoeks,
        ]);
        dd($bezoeks);
    }

    public function show($id): Response
    {
        // Haal de bezoekinformatie op basis van $id op uit de database
        // ...
        $bezoeks = $this->bs->fetchBezoek($id);
        $medewerkers = $this->bs->getAllMedewerker();
        return $this->render('detailpagina/detailpagina.html.twig', [
            'bezoek' => $bezoeks,
            'medewerkers' => $medewerkers,
        ]);
        dd($bezoeks);
    }

    #[Route('/save', name: 'bezoek_save')] 
    public function saveBezoek(Request $request): Response {

    $bezoek = $request->request->get('selectMedewerker');

        $result = $this->bs->saveBezoek($bezoek);
        dd($result);
        return $this->redirectToRoute('/detailpagina/{id}', ['id' => $bezoekId]);

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
