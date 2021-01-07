<?php

namespace App\Controller;

use App\Entity\Medicijnen;
use App\Form\MedicijnenType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MedicijnController extends AbstractController
{
    /**
     * @Route("/medicijn", name="medicijn")
     */
    public function index(Request $request): Response
    {

        $medicijnen = new Medicijnen();

        $form = $this->createForm(MedicijnenType::class, $medicijnen);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            return new Response('Hello World!!');
        }


        return $this->render('/medicijn/index.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
