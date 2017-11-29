<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 28/11/17
 * Time: 11:11
 */

namespace App\Health;


use App\Entity\Player;
use App\Entity\Potion;

class HealCalculator
{
    public function calculate(Player $player, Potion $potion){
        $healthpoint = $player->getHealthPoint();

        if($healthpoint > $potion->getLimit()){
            return null;
        }

        $healthpoint += $potion->getHealthPoint();

        if($healthpoint + $potion->getHealthPoint() > $potion->getLimit()){
            return $potion->getLimit();
        }
        return $potion->getHealthPoint();
    }
}