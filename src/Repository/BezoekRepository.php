<?php

namespace App\Repository;

use App\Entity\Bezoek;
use App\Entity\Klant;
use App\Entity\Medewerker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bezoek>
 *
 * @method Bezoek|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bezoek|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bezoek[]    findAll()
 * @method Bezoek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BezoekRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bezoek::class);
    }

    public function getAllBezoek() {
        return($this->findAll());        
    }

    public function saveBezoek ($params){
        if(isset($params["id"]) && $params["id"] != "") {
            $bezoek = $this->find($params["id"]);
        } else {
            $bezoek = new Bezoek();
        }
        
        $bezoek->setKlant($params["klant"]);
        $bezoek->setMedewerker($params["medewerker"]);
        $bezoek->setStatus($params["status"]);
        $bezoek->setDatum($params["datum"]);
        $bezoek->setTijd($params["tijd"]);
        $bezoek->setAankomsttijd($params["aankomsttijd"]);
        $bezoek->setVertrektijd($params["vertrektijd"]);

        $this->_em->persist($bezoek);
        $this->_em->flush();

        return($bezoek);
        
    
    }
    public function fetchBezoek($id) {
        return($this->find($id));  
        }

        public function deleteBezoek($id) {
    
            $bezoek = $this->find($id);
            if($bezoek) {
                $this->_em->remove($bezoek);
                $this->_em->flush();
                return(true);
            }
        
            return(false);
        }

//    /**
//     * @return Bezoek[] Returns an array of Bezoek objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bezoek
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
