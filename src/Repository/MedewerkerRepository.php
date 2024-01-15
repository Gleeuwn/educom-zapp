<?php

namespace App\Repository;

use App\Entity\Medewerker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Medewerker>
 *
 * @method Medewerker|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medewerker|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medewerker[]    findAll()
 * @method Medewerker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedewerkerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medewerker::class);
    }
    public function fetchMedewerker($id) {
    return($this->find($id));  
    }
    public function getAllMedewerker() {
        return($this->findAll());        
    }
    public function saveMedewerker($params) {
        if (isset($params["id"])) {
            $klant = $this->find($params["id"]);
    
            if (!$klant) {
                return "Error: Klant not found.";
            }
        } else {
            $klant = new Klant();
        }
        $keysToUpdate = ["voornaam", "achternaam", "straat", "huisnummer", "postcode", "woonplaats", "telefoonnummer"];
        foreach ($keysToUpdate as $key) {
            if (isset($params[$key])) {
                $setter = 'set' . ucfirst($key);
                $klant->$setter($params[$key]);
            }
        }
    
        $this->_em->persist($klant);
        $this->_em->flush();
    
        return $klant;
    }

//    /**
//     * @return Medewerker[] Returns an array of Medewerker objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Medewerker
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
