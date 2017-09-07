<?php

namespace AcmeNewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CatalogController extends Controller
{
    public function indexAction(Request $request, $_format = 'html')
    {
        $page = $request->query->getInt('page', 1);
        $postService = $this->get('post_service');

        $pagination = $postService->getPostsPage($page);

        if (!$pagination || count($pagination->getItems()) < 1) {
            throw $this->createNotFoundException(
                'Page with number ' . $page . ' not found'
            );
        }

        $parameters = ['pagination' => $pagination];

        if ($_format != 'xml') {
            $parameters['title'] = $this->getParameter('acme_news.catalog_title');

            // add page number in a title
            $pageNumber = $pagination->getCurrentPageNumber();
            $parameters['titlePostfix'] = $pageNumber > 1 ? " - page $pageNumber" : '';
        }

        return $this->render('AcmeNewsBundle:Catalog:index.' . $_format . '.twig', $parameters);
    }
}
