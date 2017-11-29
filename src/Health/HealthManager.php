<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 28/11/17
 * Time: 10:58
 */

namespace App\Health;


use App\Entity\Player;
use App\Entity\PlayerPotion;
use App\Entity\Potion;

class HealthManager
{
    private $healCalculator;

    /**
     * HealthManager constructor.
     * @param $healCalculator
     */
    public function __construct()
    {
        $this->healCalculator = new HealCalculator();
    }


    public function heal(Health $health){
        /**
         * @var Player $player
         */
        $player = $health->player;

        /**
         * @var Potion $potion
         */
        $potion = $health->potion;
        $count = $health->count;

        /**
         * @var PlayerPotion $playerPotion
         */
        $playerPotion = null;

        foreach ($player->getPlayerPotions() as $pp){
            if($pp->getPotion === $potion){
                $playerPotion = $pp;
                continue;
            }
        }

        if($playerPotion->getNumber() < $count)
            return;

        $newHp = $this->healCalculator->calculate($player, $potion);

        $player->setHealthPoint($player->getHealthPoint() + $potion->getHealthPoint());

    }
}