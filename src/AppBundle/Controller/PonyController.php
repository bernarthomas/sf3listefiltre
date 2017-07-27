<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pony;
use AppBundle\Entity\PonyFilter;
use AppBundle\Form\PonyFilterType;
use Doctrine\DBAL\Types\DateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PonyController extends Controller
{
    /**
     * @Route("/pony/create", name="pony_create")
     */
    public function createAction(Request $request)
    {
        $pony = new Pony();
        $form = $this->createFormBuilder($pony)
            ->add('name')
            ->add('born_at')
            ->add('dead_at')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $pony = $form->getData();
            $pony
                ->setBornAt(new \DateTime($pony->getBornAt()))
                ->setDeadAt(new \DateTime($pony->getDeadAt()))
            ;
            $em = $this->getDoctrine()->getManager();
            $em->persist($pony);
            $em->flush();

            return $this->redirectToRoute('create_pony');
        }

        return $this->render('pony/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/", name="pony_list")
     */
    public function listAction(Request $request)
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository('AppBundle:Pony');
        $filter = $this->createForm(PonyFilterType::class);
        $headers = ['id', 'name', 'bornAt', 'deadAt'];
        $filter->handleRequest($request);
        if ($filter->isSubmitted() && $filter->isValid()) {
            $ponyFilter = $filter->getData();
            $list = $repository->findByFilter($ponyFilter);
        } else {
            $list = $repository->findAll();
        }

        return $this->render('pony/list.html.twig', [
            'list' => $list,
            'headers'  => $headers,
            'filter' => $filter->createView()
        ]);
    }
}
