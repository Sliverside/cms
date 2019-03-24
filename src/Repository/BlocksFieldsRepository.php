<?php

namespace App\Repository;

use App\Entity\BlocksFields;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BlocksFields|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlocksFields|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlocksFields[]    findAll()
 * @method BlocksFields[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlocksFieldsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BlocksFields::class);
    }

    // /**
    //  * @return BlocksFields[] Returns an array of BlocksFields objects
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
    public function findOneBySomeField($value): ?BlocksFields
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
