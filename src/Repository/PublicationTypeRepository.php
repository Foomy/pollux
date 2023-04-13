<?php

namespace App\Repository;

use App\Entity\PublicationType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PublicationType>
 *
 * @method PublicationType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PublicationType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PublicationType[]    findAll()
 * @method PublicationType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicationTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PublicationType::class);
    }

    public function save(PublicationType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PublicationType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
