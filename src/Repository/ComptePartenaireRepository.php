<?php

namespace App\Repository;

use App\Entity\ComptePartenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ComptePartenaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComptePartenaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComptePartenaire[]    findAll()
 * @method ComptePartenaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComptePartenaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ComptePartenaire::class);
    }

    // /**
    //  * @return ComptePartenaire[] Returns an array of ComptePartenaire objects
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
    public function findOneBySomeField($value): ?ComptePartenaire
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
