<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(): Response
    {
        // Récupérer le respository de l'entité Stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les stages enregistrés en BD
        $stages = $repositoryStage->findAll();

        // Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig', ['controller_name' => 'ProstagesController', 'stages' => $stages,]);
    }

    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function afficherEntreprises(): Response
    {
        // Récupérer le respository de l'entité Entreprise
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        // Récupérer les entreprises enregistrés en BD
        $entreprises = $repositoryEntreprise->findAll();

        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/affichageEntreprises.html.twig', ['controller_name' => 'ProstagesController', 'entreprises' => $entreprises,]);
    }

    /**
     * @Route("/entreprise/{id}", name="prostages_stagesParEntreprise")
     */
    public function afficherStageParEntreprise($id): Response
    {
        // Récupérer le respository de l'entité Entreprise
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);

        // Récupérer les entreprises enregistrés en BD
        $entreprise = $repositoryEntreprise->find($id);

        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/affichageStagesParEntreprise.html.twig', ['controller_name' => 'ProstagesController', 'entreprise' => $entreprise,]);
    }

    /**
     * @Route("/formations", name="prostages_formations")
     */
    public function afficherFormations(): Response
    {
         // Récupérer le respository de l'entité Formations
         $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

         // Récupérer les formations enregistrés en BD
         $formations = $repositoryFormation->findAll();
 
         // Envoyer les formations récupérées à la vue chargée de les afficher
         return $this->render('prostages/affichageFormations.html.twig', ['controller_name' => 'ProstagesController', 'formations' => $formations,]);
    }

    /**
     * @Route("/formation/{id}", name="prostages_stagesParFormation")
     */
    public function afficherStageParFormation($id): Response
    {
        // Récupérer le respository de l'entité Entreprise
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);

        // Récupérer les entreprises enregistrés en BD
        $formation = $repositoryFormation->find($id);

        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/affichageStagesParFormation.html.twig', ['controller_name' => 'ProstagesController', 'formation' => $formation,]);
    }

    /**
     * @Route("/stages/{id}", name="prostages_stage")
     */
    public function afficherStages($id): Response
    {
        // Récupérer le respository de l'entité Stage
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);

        // Récupérer les stages enregistrés en BD
        $stage = $repositoryStage->find($id);

        return $this->render('prostages/affichageStages.html.twig', [
            'controller_name' => 'ProstagesController', 'stage' => $stage,]);
        
        /*    return $this->render('prostages/affichageStages.html.twig', [
            'controller_name' => 'ProstagesController',
            'id' => $id,
        ]);*/
    }
}
