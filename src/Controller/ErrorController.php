<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    const HTTP_CODES = [
        '404' => 'Page not found',
        '405' => 'Method Not Allowed'
    ];

    /**
     * @Route("/error", name="app_error")
     */
    public function show($exception, $logger): JsonResponse
    {
        $code = isset(self::HTTP_CODES[$exception->getStatusCode()]) ?
        $exception->getStatusCode() : 500;
        $message = isset(self::HTTP_CODES[$exception->getStatusCode()]) ?
        self::HTTP_CODES[$exception->getStatusCode()] : 'Server error';
        return new JsonResponse(
            [
                'message' => $message
            ],
            $code,
            [$message, $code]
        );
    }
}
