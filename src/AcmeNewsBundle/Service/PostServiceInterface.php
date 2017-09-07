<?php

namespace AcmeNewsBundle\Service;

interface PostServiceInterface
{
    public function getPostById(int $id);

    public function getPostsPage(int $page);
}
