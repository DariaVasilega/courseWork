<?php

namespace App\Controller;

use App\Entity\WaterTransport;
use App\Form\WaterTransportType;
use App\Repository\WaterTransportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/water/transport")
 */
class WaterTransportController extends AbstractController
{
    /**
     * @Route("/", name="water_transport_index", methods={"GET"})
     */
    public function index(WaterTransportRepository $waterTransportRepository): Response
    {
        return $this->render('water_transport/index.html.twig', [
            'water_transports' => $waterTransportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="water_transport_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $waterTransport = new WaterTransport();
        $form = $this->createForm(WaterTransportType::class, $waterTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($waterTransport);
            $entityManager->flush();

            return $this->redirectToRoute('water_transport_index');
        }

        return $this->render('water_transport/new.html.twig', [
            'water_transport' => $waterTransport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="water_transport_show", methods={"GET"})
     */
    public function show(WaterTransport $waterTransport): Response
    {
        return $this->render('water_transport/show.html.twig', [
            'water_transport' => $waterTransport,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="water_transport_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, WaterTransport $waterTransport): Response
    {
        $form = $this->createForm(WaterTransportType::class, $waterTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('water_transport_index');
        }

        return $this->render('water_transport/edit.html.twig', [
            'water_transport' => $waterTransport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="water_transport_delete", methods={"DELETE"})
     */
    public function delete(Request $request, WaterTransport $waterTransport): Response
    {
        if ($this->isCsrfTokenValid('delete'.$waterTransport->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($waterTransport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('water_transport_index');
    }
}
