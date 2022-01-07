<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(StageRepository $repositoryStage): Response
    {
        // Récupérer les stages enregistrés en BD
        $stages = $repositoryStage->findAll();

        // Envoyer les stages récupérés à la vue chargée de les afficher
        return $this->render('prostages/index.html.twig', ['controller_name' => 'ProstagesController', 'stages' => $stages,]);
    }

    /**
     * @Route("/entreprises", name="prostages_entreprises")
     */
    public function afficherEntreprises(EntrepriseRepository $repositoryEntreprise): Response
    {
        // Récupérer les entreprises enregistrés en BD
        $entreprises = $repositoryEntreprise->findAll();

        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/affichageEntreprises.html.twig', ['controller_name' => 'ProstagesController', 'entreprises' => $entreprises,]);
    }

    /**
     * @Route("/entreprise/{id}", name="prostages_stagesParEntreprise")
     */
    public function afficherStageParEntreprise(Entreprise $entreprise): Response
    {
        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/affichageStagesParEntreprise.html.twig', ['controller_name' => 'ProstagesController', 'entreprise' => $entreprise,]);
    }

    /**
     * @Route("/formations", name="prostages_formations")
     */
    public function afficherFormations(FormationRepository $repositoryFormation): Response
    {
         // Récupérer les formations enregistrés en BD
         $formations = $repositoryFormation->findAll();
 
         // Envoyer les formations récupérées à la vue chargée de les afficher
         return $this->render('prostages/affichageFormations.html.twig', ['controller_name' => 'ProstagesController', 'formations' => $formations,]);
    }

    /**
     * @Route("/formation/{id}", name="prostages_stagesParFormation")
     */
    public function afficherStageParFormation(Formation $formation): Response
    {
        // Envoyer les entreprises récupérées à la vue chargée de les afficher
        return $this->render('prostages/affichageStagesParFormation.html.twig', ['controller_name' => 'ProstagesController', 'formation' => $formation,]);
    }

    /**
     * @Route("/stages/{id}", name="prostages_stage")
     */
    public function afficherStages(Stage $stage): Response
    {
        return $this->render('prostages/affichageStages.html.twig', ['controller_name' => 'ProstagesController', 'stage' => $stage,]);
    }
}
