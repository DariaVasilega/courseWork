<?php

namespace App\Controller;

use App\Entity\RiverTransport;
use App\Form\RiverTransportType;
use App\Repository\RiverTransportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/river/transport")
 */
class RiverTransportController extends AbstractController
{
    /**
     * @Route("/", name="river_transport_index", methods={"GET"})
     * @param RiverTransportRepository $riverTransportRepository
     * @return Response
     */
    public function index(RiverTransportRepository $riverTransportRepository): Response
    {
        return $this->render('river_transport/index.html.twig', [
            'river_transports' => $riverTransportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="river_transport_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $riverTransport = new RiverTransport();
        $form = $this->createForm(RiverTransportType::class, $riverTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($riverTransport);
            $entityManager->flush();

            return $this->redirectToRoute('river_transport_index');
        }

        return $this->render('river_transport/new.html.twig', [
            'river_transport' => $riverTransport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="river_transport_show", methods={"GET"})
     * @param RiverTransport $riverTransport
     * @return Response
     */
    public function show(RiverTransport $riverTransport): Response
    {
        return $this->render('river_transport/show.html.twig', [
            'river_transport' => $riverTransport,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="river_transport_edit", methods={"GET","POST"})
     * @param Request $request
     * @param RiverTransport $riverTransport
     * @return Response
     */
    public function edit(Request $request, RiverTransport $riverTransport): Response
    {
        $form = $this->createForm(RiverTransportType::class, $riverTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('river_transport_index');
        }

        return $this->render('river_transport/edit.html.twig', [
            'river_transport' => $riverTransport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="river_transport_delete", methods={"DELETE"})
     * @param Request $request
     * @param RiverTransport $riverTransport
     * @return Response
     */
    public function delete(Request $request, RiverTransport $riverTransport): Response
    {
        if ($this->isCsrfTokenValid('delete'.$riverTransport->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($riverTransport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('river_transport_index');
    }
}
