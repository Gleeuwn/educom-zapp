<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Taak;
use App\Repository\TaakRepository;


class TaakService {

    /** @var TaakRepository $taakRepository */    
    private $taakRepository;

    public function __construct(EntityManagerInterface $em) {
        $this->taakRepository = $em->getRepository(Taak::class);

    }
public function getAllTaak() {
    return($this->taakRepository->getAllTaak());
}

public function saveTaak($params) {


$data = [
  "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
  "naam" => isset($params["naam"]) ? $params["naam"] : null,
  "tijd" => isset($params["tijd"]) ? $params["tijd"] : null,
  "omschrijving" => isset($params["omschrijving"]) ? $params["omschrijving"] : null,
];


$result = $this->taakRepository->saveTaak($data);
return($result);
}
}