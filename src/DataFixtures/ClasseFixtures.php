<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClasseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $filieres=["DEV WEB" , "DEV DATA", "REF DIG", "DEV CLOUD"];
        $niveaux=["L1", "L2", "L3", "Master"];

        for ($i=0; $i <10 ; $i++) { 
            $rand=rand(0,3);
            $classe = new Classe();
            $classe->setLibelle('Classe ' .$niveaux[$rand].' '.$filieres[$rand])
                    ->setNiveau($niveaux[$rand])
                    ->setFiliere($filieres[$rand]);
                    $manager->persist($classe);
        }

        $manager->flush();
    }
}
