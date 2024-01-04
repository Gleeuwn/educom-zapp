<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Bezoek;
use App\Entity\Klant;
use App\Entity\Medewerker;
use App\Entity\Taak;
use App\Entity\Handeling;

use App\Repository\BezoekRepository;
use App\Repository\KlantRepository;
use App\Repository\MedewerkerRepository;
use App\Repository\TaakRepository;
use App\Repository\HandelingRepository;


class BezoekService {

    /** @var BezoekRepository $bezoekRepository */    
    private $bezoekRepository;
    /** @var KlantRepository $klantRepository */    
    private $klantRepository;
    /** @var MedewerkerRepository $medewerkerRepository */    
    private $medewerkerRepository;
    /** @var TaakRepository $taakRepository */    
    private $taakRepository;
    /** @var HandelingRepository $handelingRepository */    
    private $handelingRepository;

    public function __construct(EntityManagerInterface $em) {
        $this->bezoekRepository = $em->getRepository(Bezoek::class);
        $this->klantRepository = $em->getRepository(Klant::class);
        $this->medewerkerRepository = $em->getRepository(Medewerker::class);
        $this->taakRepository = $em->getRepository(Taak::class);
        $this->handelingRepository = $em->getRepository(Handeling::class);
    }

    private function fetchKlant($id = null) {
        if(is_null($id)) return(null);
        return($this->klantRepository->fetchKlant($id));
    }

    private function fetchMedewerker($id) {
        if(is_null($id)) return(null);
        return($this->medewerkerRepository->fetchMedewerker($id));
    }

    private function fetchTaak($id) {
        if(is_null($id)) return(null);
        return($this->taakRepository->fetchTaak($id));
    }

    public function fetchBezoek($id) {
        if(is_null($id)) return(null);
        return($this->bezoekRepository->fetchBezoek($id));
    }

    public function getAllBezoek() {
        return($this->bezoekRepository->getAllBezoek());
    }

    public function saveBezoek($params) {
        $data = [
          "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
          "status" => $params["status"],
          "datum" => new \DateTime($params["datum"]),
          "tijd" => new \DateTime($params["tijd"]),             
          "klant" => $this->fetchKlant($params["klant_id"]),
          "medewerker" => $this->fetchMedewerker($params["medewerker_id"]),
          "aankomsttijd" => new \DateTime($params["aankomsttijd"]),
          "vertrektijd" => new \DateTime($params["vertrektijd"]),
        ];

        $result = $this->bezoekRepository->saveBezoek($data);
        return($result);
    }
    public function saveHandeling($params){
        $data = [
            "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
            "bezoek" => $this->fetchBezoek($params["bezoek_id"]),
            "taak" => $this->fetchTaak($params["taak_id"]),
            "status" => $params["status"]
        ];
        $result = $this->handelingRepository->saveHandeling($data);
        return($result);
    }
    public function saveTaak($params){
        $data = [
            "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
            "naam" => $params["naam"],
            "tijd" => $params["tijd"],
            "omschrijving" => $params["omschrijving"],

        ];
        $result = $this->taakRepository->saveTaak($data);
        return($result);
    }
}