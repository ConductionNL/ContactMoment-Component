<?php

namespace App\Repository;

use App\Entity\ContactMoment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContactMoment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactMoment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactMoment[]    findAll()
 * @method ContactMoment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactMomentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactMoment::class);
    }

    // /**
    //  * @return ContactMoment[] Returns an array of ContactMoment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContactMoment
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
