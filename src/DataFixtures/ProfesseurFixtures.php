<?php

namespace App\DataFixtures;

use App\Entity\Module;
use App\Entity\Professeur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfesseurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $modules = ["JAVA", "PHP", "JAVASCRIPT", "SQL"];
        $sexes = ["HOMME", "FEMME"];
        $adresses = ["Ouakam", "Pikine", "Parcelles Assainies", "Keur Massar", "Zone de Captage", "Grand Yoff", "Kaolack", "Sam", "Medina", "Leona"];

        for ($i = 0; $i < 10; $i++) {

            $modulesRand = rand(0, 3);
            $adresseRand = rand(0, 9);
            $sexeRand = rand(0, 1);

            $prof = new Professeur();

            $prof->setNomComplet('Professeur bouy diangualé ' . $modules[$modulesRand] . ' deuk ' . $adresses[$adresseRand])
                ->setAdresse($adresses[$adresseRand])
                ->setGrade('grade'.$i)
                ->setSexe($sexes[$sexeRand]);
                
                foreach ($modules as $module) {
                    $newMod = new Module();

                    $newMod->setLibelle($module);
                    $prof->addModule($newMod);
                }


            $manager->persist($prof);
        }   

        $manager->flush();
    }
}
