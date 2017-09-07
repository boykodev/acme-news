<?php

namespace AcmeNewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction($id, $_format = 'html')
    {
        $postService = $this->get('post_service');

        $post = $postService->getPostById($id);

        if (!$post) {
            throw $this->createNotFoundException(
                'No post found for id ' . $id
            );
        }

        $parameters = ['post' => $post];

        return $this->render('AcmeNewsBundle:Page:index.' . $_format . '.twig', $parameters);
    }
}
