<?php

namespace AcmeNewsBundle\Service;

use Doctrine\ORM\EntityManager;
use Knp\Component\Pager\Paginator;

class PostService implements PostServiceInterface
{
    protected $em;
    protected $catalog_posts_per_page;
    protected $latest_posts_per_page;
    protected $knp_paginator;

    public function __construct(EntityManager $em,
                                Paginator $knp_paginator,
                                int $catalog_posts_per_page = 5,
                                int $latest_posts_per_page = 5)
    {
        $this->em = $em;
        $this->knp_paginator = $knp_paginator;
        $this->catalog_posts_per_page = $catalog_posts_per_page;
        $this->latest_posts_per_page = $latest_posts_per_page;
    }

    public function getPostById(int $id)
    {
        $post = $this->em
            ->getRepository('AcmeNewsBundle:Post')
            ->getPublishedById($id);

        return $post;
    }

    public function getPostsPage(int $page)
    {
        $query = $this->em
            ->getRepository('AcmeNewsBundle:Post')
            ->getPublishedCatalogQuery();

        $pagination = $this->knp_paginator->paginate(
            $query, $page, $this->catalog_posts_per_page
        );

        return $pagination;
    }
}
