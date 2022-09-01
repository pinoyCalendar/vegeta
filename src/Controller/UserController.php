<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;

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
    public function register(ManagerRegistry $doctrine): JsonResponse
    {
        $request = Request::createFromGlobals();
        $username = $request->request->get('username', null);
        $password = $request->request->get('password', null);
        if (empty($username) || empty($password)) {
            return $this->json([
                'data' => [
                    'message' => 'missing required parameters',
                    'code' => 1001
                ],
                'success' => false
            ]);
        }
        $repository = $doctrine->getRepository(User::class);
        $user = $repository->findOneBy(['username' => $username]);
        if (!empty($user)) {
            return $this->json([
                'data' => [
                    'message' => 'username already used',
                    'code' => 1002
                ],
                'success' => false
            ]);
        }


        
        $password = password_hash($password, PASSWORD_BCRYPT);
        $entityManager = $doctrine->getManager();
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->json([
            'data' => [
                'message' => 'registration success'
                
            ],
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
