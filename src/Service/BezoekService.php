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
          "status" => isset($params["status"]) ? $params["status"] : null,
          "datum" => isset($params["datum"]) ? new \DateTime($params["datum"]) : null,
          "tijd" => isset($params["tijd"]) ? new \DateTime($params["tijd"]) : null,
          "klant" => isset($params["klant_id"]) ? $this->fetchKlant($params["klant_id"]) : null,
          "medewerker" => isset($params["medewerker_id"]) ? $this->fetchMedewerker($params["medewerker_id"]) : null,
          "aankomsttijd" => isset($params["aankomsttijd"]) && $params["aankomsttijd"] !== "" ? new \DateTime($params["aankomsttijd"]) : null,
          "vertrektijd" => isset($params["vertrektijd"]) && $params["vertrektijd"] !== "" ? new \DateTime($params["vertrektijd"]) : null,
        ];


        $result = $this->bezoekRepository->saveBezoek($data);
        return($result);
    }

}