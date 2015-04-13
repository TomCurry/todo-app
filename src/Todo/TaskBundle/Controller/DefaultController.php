<?php

namespace Todo\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Todo\TaskBundle\Entity\Task;
use Todo\TaskBundle\Form\NewTaskType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();

        if (isset($user)) {
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                'SELECT p
            FROM TaskBundle:Task p
            WHERE p.user = :user'
            )->setParameter('user', $user);

            $tasks = $query->getResult();

            $task = new Task();
            $task->setDone(false);
            $task->setUser($this->getUser());
            $task->setCreated(new \DateTime('now'));
            $task->setUpdated(new \DateTime('now'));

            $form = $this->createForm(new NewTaskType(), $task);

            $form->handleRequest($request);
            if ($form->isValid()) {
                $task = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($task);
                $em->flush();

                return $this->redirectToRoute('homepage');
            }

            return $this->render('Default/index.html.twig', array(
                'tasks' => $tasks,
                'form' => $form->createView(),
            ));
        }
        return $this->render('Default/index.html.twig');
    }
}
