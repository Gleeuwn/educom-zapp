<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Medewerker;
use App\Repository\MedewerkerRepository;


class MedewerkerService {

    /** @var MedewerkerRepository $medewerkerRepository */    
    private $MedewerkerRepository;

    public function __construct(EntityManagerInterface $em) {
        $this->medewerkerRepository = $em->getRepository(Medewerker::class);

    }
public function getAllMedewerker() {
    return($this->medewerkerRepository->getAllMedewerker());
}

public function saveMedewerker($params) {


$data = [
  "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
  "voornaam" => isset($params["voornaam"]) ? $params["voornaam"] : null,
  "achternaam" => isset($params["achternaam"]) ? $params["achternaam"] : null,
  "functie" => isset($params["functie"]) ? $params["functie"] : null,
  "email" => isset($params["email"]) ? $params["email"] : null,
];


$result = $this->MedewerkerRepository->saveMedewerker($data);
return($result);
}
}