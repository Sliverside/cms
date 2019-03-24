<?php

namespace App\Repository;

use App\Entity\BlocksInstancesImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BlocksInstancesImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlocksInstancesImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlocksInstancesImages[]    findAll()
 * @method BlocksInstancesImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlocksInstancesImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BlocksInstancesImages::class);
    }

    // /**
    //  * @return BlocksInstancesImages[] Returns an array of BlocksInstancesImages objects
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
    public function findOneBySomeField($value): ?BlocksInstancesImages
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
