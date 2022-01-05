<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'un générateur de données Faker
        $faker = \Faker\Factory::create('fr_FR');

        // Création des formations
        $dutInfo = new Formation();
        $dutInfo->setNomCourt("DUT Info");
        $dutInfo->setNomLong("DUT Informatique");
        $dutGim = new Formation();            
        $dutGim->setNomCourt("DUT GIM");
        $dutGim->setNomLong("DUT Génie Industriel et Maintenance");
        $lpProg = new Formation();
        $lpProg->setNomCourt("LP Prog");
        $lpProg->setNomLong("Licence Pro Programmation Avancée");
        $lpNum = new Formation();
        $lpNum->setNomCourt("LP Num");
        $lpNum->setNomLong("Licence Pro Métiers du Numérique");
        $dutGea = new Formation();
        $dutGea->setNomCourt("DUT GEA");
        $dutGea->setNomLong("DUT Gestion des Entreprises et des Admin");
        $dutTc = new Formation();
        $dutTc->setNomCourt("DUT TC");
        $dutTc->setNomLong("DUT Techniques de Commercialisation");
        $lpBanque = new Formation();
        $lpBanque->setNomCourt("LP Banque");
        $lpBanque->setNomLong("Licence Pro Banque et Assurance");
        $lpGs = new Formation();
        $lpGs->setNomCourt("LP GS");
        $lpGs->setNomLong("Licence Pro Gestion Salariale");

        $tableauFormations = array($dutInfo, $dutGim, $lpProg, $lpNum, $dutGea, $dutTc, $lpBanque, $lpGs);

        foreach($tableauFormations as $tabFormations)
        {
            $manager->persist($tabFormations);
        }

        // Création des entreprises
        $nbEntreprises = 12;

        for ($i=0; $i < $nbEntreprises; $i++) { 
            $entreprises = new Entreprise();
            $entreprises->setNom($faker->compagny);
            $entreprises->setAdresse($faker->address);
            $entreprises->setActivite($faker->sentence);
            $entreprises->setSitweb($faker->url);

            $tabEntreprise[] = $entreprises;
            $manager->persist($entreprises);
        }

        // Création des stages
        $nbStages = 20;

        for ($i=0; $i < $nbStages; $i++) { 
            $stage = new Stage();
            $stage->setTitre($faker->sentence);
            $stage->setMission($faker->paragraph(4, false));
            $stage->setEmail($faker->email);
            $stage->setEntreprise();

            
            $manager->persist($entreprises);
        }

        // Envoi les données en BD
        $manager->flush();
    }
}
