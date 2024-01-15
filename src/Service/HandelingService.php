<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Handeling;
use App\Entity\Taak;
use App\Entity\Bezoek;
use App\Repository\HandelingRepository;
use App\Repository\TaakRepository;
use App\Repository\BezoekRepository;


class HandelingService {

    /** @var HandelingRepository $handelingRepository */    
    private $handelingRepository;
    /** @var BezoekRepository $bezoekRepository */    
    private $bezoekRepository;
    /** @var TaakRepository $taakRepository */    
    private $taakRepository;

    public function __construct(EntityManagerInterface $em) {
        $this->handelingRepository = $em->getRepository(Handeling::class);
        $this->taakRepository = $em->getRepository(Taak::class);
        $this->bezoekRepository = $em->getRepository(Bezoek::class);

    }
    private function fetchTaak($id) {
        if(is_null($id)) return(null);
        return($this->taakRepository->fetchTaak($id));
    }

    public function fetchBezoek($id) {
        if(is_null($id)) return(null);
        return($this->bezoekRepository->fetchBezoek($id));
    }

    public function getAllHandeling() {
        return($this->handelingRepository->getAllHandeling());
    }

public function saveHandeling($params){
    $data = [
        "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
        "bezoek" => isset($params["bezoek_id"]) ? $this->fetchBezoek($params["bezoek_id"]) : null,
        "taak" => isset($params["taak_id"]) ? $this->fetchTaak($params["taak_id"]) : null,
        "status" => isset($params["status"]) ? $params["status"] : null,
    ];
    $result = $this->handelingRepository->saveHandeling($data);
    return($result);
}
}