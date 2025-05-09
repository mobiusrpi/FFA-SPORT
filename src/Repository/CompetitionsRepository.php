<?php

namespace App\Repository;

use App\Entity\Competitions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Competitions>
 */
class CompetitionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Competitions::class);
    }
    
    /**
     * @return CompetitionList[]
     */
    public function getQueryCompetitionSorted()
    {    
        return $this->createQueryBuilder('compet')                    
            ->orderBy('compet.startDate','ASC')
            ->getQuery()
            ->getResult()
        ;
    }

 /**
     * @return CompetitionList[]
     */
    public function getQueryCompetitionData($id)
    {    
        return $this->createQueryBuilder('compet')
            ->select('compet.id','compet.location','compet.startDate','compet.endDate','typecomp.typecomp',)
            ->leftjoin('compet.typecompetition', 'typecomp')
            ->where('compet.id = :ident')  
            ->setParameter('ident', $id)
            ->getQuery()
            ->getResult()                         
        ;
    }
 
    //    /**
    //     * @return Competitions[] Returns an array of Competitions objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Competitions
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
