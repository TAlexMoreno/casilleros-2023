<?php

namespace App\Repository;

use App\Entity\DistritoFederal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DistritoFederal>
 *
 * @method DistritoFederal|null find($id, $lockMode = null, $lockVersion = null)
 * @method DistritoFederal|null findOneBy(array $criteria, array $orderBy = null)
 * @method DistritoFederal[]    findAll()
 * @method DistritoFederal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DistritoFederalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DistritoFederal::class);
    }

    public function save(DistritoFederal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DistritoFederal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DistritoFederal[] Returns an array of DistritoFederal objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DistritoFederal
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
