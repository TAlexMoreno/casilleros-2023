<?php

namespace App\Repository;

use App\Entity\DistritoLocal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DistritoLocal>
 *
 * @method DistritoLocal|null find($id, $lockMode = null, $lockVersion = null)
 * @method DistritoLocal|null findOneBy(array $criteria, array $orderBy = null)
 * @method DistritoLocal[]    findAll()
 * @method DistritoLocal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DistritoLocalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DistritoLocal::class);
    }

    public function save(DistritoLocal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DistritoLocal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DistritoLocal[] Returns an array of DistritoLocal objects
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

//    public function findOneBySomeField($value): ?DistritoLocal
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
