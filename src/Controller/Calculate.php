<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/calculate")
 */
class Calculate extends AbstractController
{
    /**
     * @var \App\Service\WaterTransportProcessor
     */
    private $waterTransportProcessor;

    /**
     * @var \Symfony\Component\Serializer\Encoder\JsonEncoder
     */
    private $jsonEncoder;

    /**
     * Calculate constructor.
     * @param \App\Service\WaterTransportProcessor $waterTransportProcessor
     * @param \Symfony\Component\Serializer\Encoder\EncoderInterface $jsonEncoder
     */
    public function __construct(
        \App\Service\WaterTransportProcessor $waterTransportProcessor,
        \Symfony\Component\Serializer\Encoder\EncoderInterface $jsonEncoder
    )
    {
        $this->waterTransportProcessor = $waterTransportProcessor;
        $this->jsonEncoder = $jsonEncoder;
    }

    /**
     * @Route("/", name="calculate_index", methods={"GET", "POST"})
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        $calcMethod = $request->get('calc_method');
        $params = $request->get('result');

        $response = new Response();

        if (in_array(0, $params)) {
            return $response->setContent($this->jsonEncoder->encode(0, $format = 'json'));
        }
        $result = $this->waterTransportProcessor->${'calcMethod'}(array_values($params));
        $response->setContent($this->jsonEncoder->encode($result, $format = 'json'));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}