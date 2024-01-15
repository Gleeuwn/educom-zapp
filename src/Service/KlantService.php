<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Klant;
use App\Repository\KlantRepository;


class KlantService {

    /** @var KlantRepository $klantRepository */    
    private $klantRepository;

    public function __construct(EntityManagerInterface $em) {
        $this->klantRepository = $em->getRepository(Klant::class);

    }
public function getAllKlant() {
    return($this->klantRepository->getAllKlant());
}

public function saveKlant($params) {


$data = [
  "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
  "voornaam" => isset($params["voornaam"]) ? $params["voornaam"] : null,
  "achternaam" => isset($params["achternaam"]) ? $params["achternaam"] : null,
  "straat" => isset($params["straat"]) ? $params["straat"] : null,
  "huisnummer" => isset($params["huisnummer"]) ? $params["huisnummer"] : null,
  "postcode" => isset($params["postcode"]) ? $params["postcode"] : null,
  "woonplaats" => isset($params["woonplaats"]) ? $params["woonplaats"] : null,
  "telefoonnummer" => isset($params["telefoonnummer"]) ? $params["telefoonnummer"] : null,
];


$result = $this->klantRepository->saveKlant($data);
return($result);
}
}