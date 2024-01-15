<?php

namespace App\Repository;

use App\Entity\Klant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Klant>
 *
 * @method Klant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Klant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Klant[]    findAll()
 * @method Klant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KlantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Klant::class);
    }

    public function fetchKlant($id) {
        return($this->find($id));  
    }
    public function getAllKlant() {
        return($this->findAll());        
    }

    public function saveKlant($params) {
        $klant = isset($params["id"]) ? $this->find($params["id"]) : new Klant();

        if (!$klant) return false;

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
//     * @return Klant[] Returns an array of Klant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Klant
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}