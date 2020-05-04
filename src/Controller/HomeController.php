<?php


namespace App\Controller;

use App\Entity\MaritimeTransport;
use App\Entity\Vehicle;
use App\Entity\RiverTransport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }

}