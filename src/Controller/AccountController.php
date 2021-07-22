<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\BookingRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    #[Route('/account', name: 'account')]
    public function index(BookingRepository $bookingRepository, UserRepository $userRepository, int $id): Response
    {
        return $this->render('account/index.html.twig', [
            'user' => $userRepository->findBy($this->getUser()->getId()),
            'booking' => $bookingRepository->findBy([
                'user' => $this->getUser()]
            )
        ]);
    }
}
