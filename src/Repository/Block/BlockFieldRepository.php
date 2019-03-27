<?php

namespace App\Repository\Block;

use App\Entity\Block\BlockField;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BlockField|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlockField|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlockField[]    findAll()
 * @method BlockField[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlockFieldRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BlockField::class);
    }

    // /**
    //  * @return BlockField[] Returns an array of BlockField objects
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
    public function findOneBySomeField($value): ?BlockField
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
