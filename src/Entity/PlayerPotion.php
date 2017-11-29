<?php
/**
 * Created by PhpStorm.
 * User: samuel.bigard
 * Date: 28/11/17
 * Time: 10:13
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PlayerPotion
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="playerPotions")
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity="Potion")
     */
    private $potion;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param mixed $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    /**
     * @return mixed
     */
    public function getPotion()
    {
        return $this->potion;
    }

    /**
     * @param mixed $potion
     */
    public function setPotion($potion)
    {
        $this->potion = $potion;
    }


}