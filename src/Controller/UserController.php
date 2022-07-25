<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/users/login", name="app.user.login", methods={"POST"})
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
     * @Route("/users/register", name="app.user.register", methods={"POST"})
     */
    public function register(): JsonResponse
    {
        return $this->json([
            'data' => [],
            'success' => true
        ]);
    }

    /**
     * @Route("/users/logout", name="app.user.logout", methods={"DELETE"})
     */
    public function logout(): JsonResponse
    {
        return $this->json([
            'data' => [],
            'success' => true
        ]);
    }
}
