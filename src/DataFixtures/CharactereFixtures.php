<?php

namespace App\DataFixtures;

use App\Entity\Character;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CharactereFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $character = new Character();

            $character->setNom("BANGALORE")
                ->setAge(38)
                ->setCapPassive("Pas de charge")
                ->setCapTactique("Lancée fumigène")
                ->setCapUltime("Tonerre grondant")
                ->setCitation("Quelle que soit l'arme, je vais tous vous écraser.")
                ->setTitleDesc("Militaire professionnelle")
                ->setMondeOrigine("Gridiron")
                ->setNomReel("Anita Wiliams")
                ->setImage("image/bangalore.png")
                ->setDescription("Née dans une famille militaire dont ses parents, ses quatre grands frères et elle-même ont tous servi au sein des forces de l'IMC, Bangalore a toujours été un soldat exceptionnel. Sortie major de l'Académie militaire de l'IMC, elle reste l'unique élève officier capable en moins de 20 secondes de démonter puis de remonter un Peacekeeper après l'avoir équipé d'un choke de précision... les yeux bandés. 

                                                    Au cours des mois qui ont suivi la Bataille de Gridiron, Anita et son frère Jackson ont été attaqués par des assaillants inconnus alors qu’ils se trouvaient à bord de l’IMS Hestia de la flotte corporatiste. Une bombe placée sur la coque extérieure du vaisseau en a détruit la plus grosse partie, mais pas avant que Jackson vole au secours d’Anita pour la protéger de l’explosion, en sauvant sa sœur au prix de sa propre vie. Anita n’a eu d’autre choix que de regarder son frère disparaître dans le vide spatial. Après le crash de l’IMS Hestia sur une planète contrôlée par le Syndicat, Anita s’est mise en quête d’un travail et de son frère dont elle refusait toujours d’admettre la mort, dans l’espoir de repartir avec lui pour un voyage de plusieurs décennies. Elle combat aujourd’hui dans les Jeux Apex pour récolter la somme qui lui permettrait de convaincre un pilote de bien vouloir entreprendre un voyage épique vers sa planète d’origine, où elle espère retrouver ce qu'il reste de sa famille.");

            $manager->persist($character);
        }

        $manager->flush();
    }
}
