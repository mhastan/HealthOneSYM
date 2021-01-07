<?php

namespace App\Controller;

use App\Entity\Medicijnen;
use App\Form\Medicijnen1Type;
use App\Repository\MedicijnenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicijnenController extends AbstractController
{
    /**
     * @Route("/", name="medicijnen_index", methods={"GET"})
     */
    public function index(MedicijnenRepository $medicijnenRepository): Response
    {
        return $this->render('medicijnen/index.html.twig', [
            'medicijnens' => $medicijnenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="medicijnen_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $medicijnen = new Medicijnen();
        $form = $this->createForm(Medicijnen1Type::class, $medicijnen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medicijnen);
            $entityManager->flush();

            return $this->redirectToRoute('medicijnen_index');
        }

        return $this->render('medicijnen/new.html.twig', [
            'medicijnen' => $medicijnen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="medicijnen_show", methods={"GET"})
     */
    public function show(Medicijnen $medicijnen): Response
    {
        return $this->render('medicijnen/show.html.twig', [
            'medicijnen' => $medicijnen,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="medicijnen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Medicijnen $medicijnen): Response
    {
        $form = $this->createForm(Medicijnen1Type::class, $medicijnen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medicijnen_index');
        }

        return $this->render('medicijnen/edit.html.twig', [
            'medicijnen' => $medicijnen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="medicijnen_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Medicijnen $medicijnen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicijnen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($medicijnen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('medicijnen_index');
    }
}
