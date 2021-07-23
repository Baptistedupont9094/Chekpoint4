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
    public function index(User $user, BookingRepository $bookingRepository): Response
    {
        return $this->render('account/index.html.twig', [
            'booking' => $bookingRepository->findBy([
                'user' => $this->getUser(),
            ])
        ]);
    }
}
