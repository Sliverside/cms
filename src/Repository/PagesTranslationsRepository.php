<?php

namespace App\Repository;

use App\Entity\PagesTranslations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PagesTranslations|null find($id, $lockMode = null, $lockVersion = null)
 * @method PagesTranslations|null findOneBy(array $criteria, array $orderBy = null)
 * @method PagesTranslations[]    findAll()
 * @method PagesTranslations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PagesTranslationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PagesTranslations::class);
    }

    // /**
    //  * @return PagesTranslations[] Returns an array of PagesTranslations objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PagesTranslations
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
