<?php

namespace App\Repository\Block;

use App\Entity\Block\BlockFieldTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BlockFieldTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlockFieldTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlockFieldTranslation[]    findAll()
 * @method BlockFieldTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlockFieldTranslationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BlockFieldTranslation::class);
    }

    // /**
    //  * @return BlockFieldTranslation[] Returns an array of BlockFieldTranslation objects
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
    public function findOneBySomeField($value): ?BlockFieldTranslation
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
