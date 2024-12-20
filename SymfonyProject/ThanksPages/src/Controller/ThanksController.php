<?php

namespace App\Controller;

use App\Entity\Thanks;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\ThanksType;
use App\Repository\ThanksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/thanks')]
class ThanksController extends AbstractController
{
    #[Route('/', name: 'app_thanks_index', methods: ['GET'])]
    public function index(ThanksRepository $thanksRepository, UserRepository $userRepository): Response
    {
        $thanks = $thanksRepository->findBy([], ['TkDate' => 'DESC']);
        $users = $userRepository->findAll();
        //dd($thanks); 'TksByImg' , 'TksForImg'

        return $this->render('thanks/index.html.twig', [
        'thanks' => $thanks,
        'users' => $users
    ]);
    }

    #[Route('/new', name: 'app_thanks_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $thank = new Thanks();
        $form = $this->createForm(ThanksType::class, $thank);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($thank);
            $entityManager->flush();

            return $this->redirectToRoute('app_thanks_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('thanks/new.html.twig', [
            'thank' => $thank,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_thanks_show', methods: ['GET'])]
    public function show(Thanks $thank): Response
    {
        return $this->render('thanks/show.html.twig', [
            'thank' => $thank,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_thanks_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Thanks $thank, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ThanksType::class, $thank);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_thanks_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('thanks/edit.html.twig', [
            'thank' => $thank,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_thanks_delete', methods: ['POST'])]
    public function delete(Request $request, Thanks $thank, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$thank->getId(), $request->request->get('_token'))) {
            $entityManager->remove($thank);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_thanks_index', [], Response::HTTP_SEE_OTHER);
    }
}
