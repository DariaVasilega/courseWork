<?php

namespace App\Controller;

use App\Entity\MaritimeTransport;
use App\Form\MaritimeTransportType;
use App\Repository\MaritimeTransportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/maritime/transport")
 */
class MaritimeTransportController extends AbstractController
{
    /**
     * @Route("/", name="maritime_transport_index", methods={"GET"})
     * @param MaritimeTransportRepository $maritimeTransportRepository
     * @return Response
     */
    public function index(MaritimeTransportRepository $maritimeTransportRepository): Response
    {
        return $this->render('maritime_transport/index.html.twig', [
            'maritime_transports' => $maritimeTransportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="maritime_transport_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $maritimeTransport = new MaritimeTransport();
        $form = $this->createForm(MaritimeTransportType::class, $maritimeTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maritimeTransport);
            $entityManager->flush();

            return $this->redirectToRoute('maritime_transport_index');
        }

        return $this->render('maritime_transport/new.html.twig', [
            'maritime_transport' => $maritimeTransport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="maritime_transport_show", methods={"GET"})
     * @param MaritimeTransport $maritimeTransport
     * @return Response
     */
    public function show(MaritimeTransport $maritimeTransport): Response
    {
        return $this->render('maritime_transport/show.html.twig', [
            'maritime_transport' => $maritimeTransport,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="maritime_transport_edit", methods={"GET","POST"})
     * @param Request $request
     * @param MaritimeTransport $maritimeTransport
     * @return Response
     */
    public function edit(Request $request, MaritimeTransport $maritimeTransport): Response
    {
        $form = $this->createForm(MaritimeTransportType::class, $maritimeTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('maritime_transport_index');
        }

        return $this->render('maritime_transport/edit.html.twig', [
            'maritime_transport' => $maritimeTransport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="maritime_transport_delete", methods={"DELETE"})
     * @param Request $request
     * @param MaritimeTransport $maritimeTransport
     * @return Response
     */
    public function delete(Request $request, MaritimeTransport $maritimeTransport): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maritimeTransport->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($maritimeTransport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('maritime_transport_index');
    }
}
