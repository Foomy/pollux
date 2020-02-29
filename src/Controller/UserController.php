<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Compiler\ResolveBindingsPass;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @param UserRepository $repository
     *
     * @return Response
     */
    public function index(UserRepository $repository): Response
    {
        $users = $repository->findAll();

        return $this->render('user/index.html.twig', [
            'layoutType' => 'one-column',
            'users' => $users,
        ]);
    }

    public function profile(string $userId): Response
    {
        return $this->render('user/profile.html.twig', [
            'user' => null,
        ]);
    }

    /**
     * Shows the form for creating and editing users.
     *
     * @param string $userId
     *
     * @return Response
     */
    public function form(string $userId): Response
    {
        $form = $this->createForm(UserType::class);

        return $this->render('user/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function save(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);

        if (!$form->isValid()) {
        }

        $data = $form->getData();
        $user = new User(Uuid::uuid4(), $data->username);
        $user->setCanLogin($data->canLogin);
        $user->setPassword($passwordEncoder->encodePassword($user, $data->password));

        $manager->persist($user);
        $manager->flush();

        return $this->redirectToRoute('users');
    }

    /**
     * @param string         $userId
     * @param Request        $request
     * @param UserRepository $repository
     *
     * @return JsonResponse
     */
    public function delete(string $userId, Request $request, UserRepository $repository): JsonResponse
    {
        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException("Sorry, didn't found the page you requested.");
        }

        $user          = $repository->find($userId);
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($user);
//        $entityManager->flush();

        return $this->json([
            'message' => 'The user has been successfully deleted.',
            'error'   => false,
            'userId'  => $userId,
        ]);
    }
}
