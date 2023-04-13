<?php

namespace App\Repository;

use App\Entity\Metakey;
use App\Entity\Metavalue;
use App\Entity\Publication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Metavalue>
 *
 * @method Metavalue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Metavalue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Metavalue[]    findAll()
 * @method Metavalue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetavalueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Metavalue::class);
    }

    public function save(Metavalue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Metavalue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByMetaKeyId(Metakey $metaKey): mixed
    {
        return $this->findOneBy(['metakeyId' => $metaKey->getId()]);
    }

    public function findByPublication(Publication $publication): mixed
    {
        return $this->createQueryBuilder('mv')
            ->where('mv.publicationId = :publicationId')
            ->setParameter('publicationId', $publication->getId())
            ->getQuery()
            ->getResult();
    }
}
