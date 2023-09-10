<?php

namespace App\Repository;

use App\Entity\CustomizationOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CustomizationOption>
 *
 * @method CustomizationOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomizationOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomizationOption[]    findAll()
 * @method CustomizationOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomizationOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomizationOption::class);
    }

//    /**
//     * @return CustomizationOption[] Returns an array of CustomizationOption objects
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

//    public function findOneBySomeField($value): ?CustomizationOption
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
