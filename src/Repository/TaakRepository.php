<?php

namespace App\Repository;

use App\Entity\Taak;
use App\Entity\Handeling;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Taak>
 *
 * @method Taak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taak[]    findAll()
 * @method Taak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaakRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Taak::class);
    }
    public function fetchTaak($id) {
        return($this->find($id));  
        }
    public function getAllTaak() {
        return($this->findAll());        
        }

//    /**
//     * @return Taak[] Returns an array of Taak objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Taak
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
