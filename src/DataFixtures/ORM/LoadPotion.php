<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 28/11/17
 * Time: 09:19
 */

namespace App\DataFixtures\ORM;


use App\Entity\Potion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPotion extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $potions= [
            new Potion('small',75,10),
            new Potion('medium', 75,25),
            new Potion('large',75,50),
            new Potion('ultra',100,100),
        ];

        foreach ($potions as $potion) {
            $manager->persist($potion);
        }
        $manager->flush();
    }

}