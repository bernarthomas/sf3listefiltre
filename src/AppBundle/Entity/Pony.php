<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pony
 *
 * @ORM\Table(name="pony")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PonyRepository")
 */
class Pony
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="born_at", type="datetime")
     */
    private $bornAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dead_at", type="datetime", nullable=true)
     */
    private $deadAt;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Pony
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set bornAt
     *
     * @param \DateTime $bornAt
     *
     * @return Pony
     */
    public function setBornAt($bornAt)
    {
        $this->bornAt = $bornAt;

        return $this;
    }

    /**
     * Get bornAt
     *
     * @return \DateTime
     */
    public function getBornAt()
    {
        return $this->bornAt;
    }

    /**
     * Set deadAt
     *
     * @param \DateTime $deadAt
     *
     * @return Pony
     */
    public function setDeadAt($deadAt)
    {
        $this->deadAt = $deadAt;

        return $this;
    }

    /**
     * Get deadAt
     *
     * @return \DateTime
     */
    public function getDeadAt()
    {
        return $this->deadAt;
    }
}

