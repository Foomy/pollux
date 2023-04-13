<?php

namespace App\Repository;

use App\Entity\Metakey;
use App\Entity\Metavalue;
use App\Entity\Publication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Metakey>
 *
 * @method Metakey|null find($id, $lockMode = null, $lockVersion = null)
 * @method Metakey|null findOneBy(array $criteria, array $orderBy = null)
 * @method Metakey[]    findAll()
 * @method Metakey[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetakeyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Metakey::class);
    }

    public function findById($id): ?Metakey
    {
        return $this->findOneBy(['id' => $id]);
    }

    public function findByMetavalueId(Metavalue $metavalue): ?Metakey
    {
        return $this->findOneBy(['metavalueId' => $metavalue->getId()]);
    }

    public function save(Metakey $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Metakey $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
