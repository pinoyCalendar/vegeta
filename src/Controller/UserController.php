<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user/login", name="app.user.login", methods={"POST"})
     */
    public function login(): JsonResponse
    {
        return $this->json([
            'data' => [
                'token' => ''
            ],
            'success' => true
        ]);
    }
    
    /**
     * @Route("/user/register", name="app.user.register", methods={"POST"})
     */
    public function register(): JsonResponse
    {
        return $this->json([
            'data' => [],
            'success' => true
        ]);
    }

    /**
     * @Route("/user/logout", name="app.user.register", methods={"DELETE"})
     */
    public function logout(): JsonResponse
    {
        return $this->json([
            'data' => [],
            'success' => true
        ]);
    }
}
