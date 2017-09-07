<?php

namespace AcmeNewsBundle\Repository;

/**
 * PostRepository
 *
 */
class PostRepository extends \Doctrine\ORM\EntityRepository
{
    public function getPublishedCatalogQuery()
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT p FROM AcmeNewsBundle:Post p 
                           WHERE p.published = :published 
                           ORDER BY p.id DESC')
            ->setParameter('published', true);

        return $query;
    }

    public function getPublishedById($id)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT p FROM AcmeNewsBundle:Post p 
                           WHERE p.id = :id 
                           AND p.published = :published')
            ->setParameter('id', $id)
            ->setParameter('published', true);

        try {

            return $query->getOneOrNullResult();
        } catch (\Doctrine\ORM\NoResultException $e) {

            return null;
        }
    }
}
