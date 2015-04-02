<?php

namespace Todo\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $user = $this->getUser();

        if(isset($user)) {
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                'SELECT p
            FROM TaskBundle:Task p
            WHERE p.user = :user'
            )->setParameter('user', $user);

            $tasks = $query->getResult();

            return $this->render('Default/index.html.twig', array(
                'tasks' => $tasks,
            ));
        }
        return $this->render('Default/index.html.twig');
    }
}
