<?php

namespace App\Repository;

use App\Entity\BlocksInstances;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BlocksInstances|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlocksInstances|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlocksInstances[]    findAll()
 * @method BlocksInstances[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlocksInstancesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BlocksInstances::class);
    }

    // /**
    //  * @return BlocksInstances[] Returns an array of BlocksInstances objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlocksInstances
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
