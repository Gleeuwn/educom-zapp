<?php

namespace App\Repository;

use App\Entity\Handeling;
use App\Entity\Bezoek;
use App\Entity\Taak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Handeling>
 *
 * @method Handeling|null find($id, $lockMode = null, $lockVersion = null)
 * @method Handeling|null findOneBy(array $criteria, array $orderBy = null)
 * @method Handeling[]    findAll()
 * @method Handeling[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HandelingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Handeling::class);
    }
    public function fetchMedewerker($bezoek_id) {
        return($this->find($bezoek_id));  
        }
    public function saveHandeling($params){
        if(isset($params["id"]) && $params["id"] != "") {
            $handeling = $this->find($params["id"]);
        } else {
            $handeling = new Handeling();
        }
        

        $handeling->setTaak($params["taak"]);
        $handeling->setBezoek($params["bezoek"]);
        $handeling->setStatus($params["status"]);

        $this->_em->persist($handeling);
        $this->_em->flush();

        return($handeling);
    }
    public function deleteBezoek($handeling) {
    
        $handeling = $this->find($id);
        if($handeling) {
            $this->_em->remove($handeling);
            $this->_em->flush();
            return(true);
        }
    
        return(false);
    }

//    /**
//     * @return Handeling[] Returns an array of Handeling objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Handeling
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
