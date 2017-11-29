<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;

/**
 * @ORM\Entity
 */
class Player
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column()
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $healthPoint = 100;

    /**
     * @ORM\ManyToOne(targetEntity="Weapon")
     */
    private $currentWeapon;

    /**
     * @ORM\ManyToMany(targetEntity="PlayerPotion", mappedBy="player", cascade={"persist"})
     */
    private $playerPotions;

    public function __construct()
    {
        $this->playerPotions = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getHealthPoint()
    {
        return $this->healthPoint;
    }

    public function setHealthPoint(int $healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    public function getCurrentWeapon(): ?Weapon
    {
        return $this->currentWeapon;
    }

    public function setCurrentWeapon(?Weapon $currentWeapon)
    {
        $this->currentWeapon = $currentWeapon;
    }

    /**
     * @return mixed
     */
    public function getPlayerPotions()
    {
        return $this->playerPotions;
    }

    /**
     * @param mixed $potions
     */
    public function setPlayerPotions($potions)
    {
        $this->playerPotions->clear();
        foreach ($potions as $potion){
            $this->addPlayerPotions($potion);
        }
    }

    public function addPlayerPotions(PlayerPotion $potion){
        if($this->playerPotions->contains($potion)){
            return;
        }
        $this->playerPotions->add($potion);
        $potion->setPlayer($this);
    }
}
