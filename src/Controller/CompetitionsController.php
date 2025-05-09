<?php

namespace App\Controller;

use App\Entity\Competitions;
use App\Form\CompetitionsType;
use App\Repository\CrewsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CompetitorsRepository;
use App\Repository\CompetitionsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class CompetitionsController extends AbstractController
{
    #[Route(path: '/competitions', name: 'competitions.list', methods:['GET'])]
    public function list(
        CompetitionsRepository $repository, 
    ): Response 
    {
        $sortList = $repository->getQueryCompetitionSorted();
//        dd($sortList);
        return $this->render('pages/competitions/list.html.twig', [
            'competition_list' => $sortList,            
        ]);
    }
 
    #[Route(path: '/admin/competitions', name: 'admin.competitions.list', methods:['GET'])]
    public function listAdmin(
        CompetitionsRepository $repository, 
    ): Response 
    {
        $sortList = $repository->getQueryCompetitionSorted();

        return $this->render('pages/admin/competitions/list.html.twig', [
            'competition_list' => $sortList,            
        ]); 
    }

    #[Route(path :'/admin/competitions/new', name: 'admin.competitions.new', methods:['GET','POST'])] 
    public function new(
        Request $request,
        EntityManagerInterface $manager
    ) : Response{
        $competitions = new Competitions();
        $form = $this->createForm(CompetitionsType::class,$competitions);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $competitions = $form->getData();;
            $manager->persist($competitions);
            $manager->flush();
                    
            $this->addFlash(
                'success',
                'Nouvelle compétition créée avec succès');

            return $this->redirectToRoute('admin.competitions.list');
        }            
        
        return $this->render('pages/admin/competitions/new.html.twig', [ 
            'competitions' => $form->createView(),
        ]);
    }
     
    #[Route(path :'/admin/competitions/edit/{id}', name: 'admin.competitions.edit', methods:['GET','POST'])]
    public function edit(
        Competitions $competitions,
        Request $request,
        EntityManagerInterface $manager
    ) : Response{

        $form = $this->createForm(CompetitionsType::class,$competitions);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $competitions = $form->getData();;
            $manager->persist($competitions);
            $manager->flush();
            
            $this->addFlash(
              'success',
              'Compétition modifiée avec succès !'
            ); 

            return $this->redirectToRoute('admin.competitions.list');
        }  
        return $this->render('pages/admin/competitions/edit.html.twig', [
            'competitions' => $form->createView()
        ]);
    }

    #[Route(path :'/admin/competitions/delete/{id}', name: 'admin.competitions.delete', methods:['GET','POST'])] 
    public function delete(
        Competitions $competitions,
        EntityManagerInterface $manager
    ) : Response 
    {
        if(!$competitions) {        
            $this->addFlash(
                'warning',
                'Compétition inconnue !'
            ); 
            return $this->redirectToRoute('admin.competitions.list');
        }
        $manager->remove($competitions);
        $manager->flush();
                
         $this->addFlash(
            'success',
            'Compétition supprimée avec succès !'
        ); 
    
        return $this->redirectToRoute('admin.competitions.list');
    }

    #[Route(path :'/competitions/registration/{id}', name: 'competitions.registration', methods:['GET','POST'])]
    public function registration(  
        int $id,
        CompetitionsRepository $repository,         
        Request $request,   
    ) : Response{
        
        $event = $repository->find($id);
        $session = $request->getSession();
        $session->set('event',$event);

        return $this->redirectToRoute('crews.registration');
    }

}
