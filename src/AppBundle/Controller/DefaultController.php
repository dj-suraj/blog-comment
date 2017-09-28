<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Blog;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @throws \InvalidArgumentException
     */
    public function indexAction(Request $request)
    {

        $authChecker = $this->container->get('security.authorization_checker');
        $router = $this->container->get('router');

        if($authChecker->isGranted('ROLE_ADMIN')) {

            return new RedirectResponse($router->generate('blog_index'));
        }

        if($authChecker->isGranted('ROLE_USER')) {
            return new RedirectResponse($router->generate('blog_index'));
        }

        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/home", name="home")
     */
    public function homeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/home.html.twig');
    }

    /**
     * @Route("/admin/home", name="admin_home")
     */
    public function adminHomeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

//        $blogs = $em->getRepository('AppBundle:Blog')->findAll(Query::HYDRATE_ARRAY);

        $blogs = $em->createQueryBuilder()->select('b')->from(Blog::class, 'b')->getQuery();
        $blog_data = $blogs->getArrayResult();
//
//        $blog_data = json_encode($blog_data);

        return $this->render('blog/index.html.twig', array(
            'blogs' => $blog_data,
        ));
    }


}
