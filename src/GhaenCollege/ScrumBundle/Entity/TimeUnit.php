<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeUnit
 *
 * @ORM\Table(name="timeunit")
 * @ORM\Entity
 */
class TimeUnit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="unit", type="string", length=10)
     */
    private $unit;


    /**
     * @ORM\OneToMany(targetEntity="Sprint",mappedBy="timeunit")
     */
    protected $sprints;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return TimeUnit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    
        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sprints = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add sprints
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Sprint $sprints
     * @return TimeUnit
     */
    public function addSprint(\GhaenCollege\ScrumBundle\Entity\Sprint $sprints)
    {
        $this->sprints[] = $sprints;
    
        return $this;
    }

    /**
     * Remove sprints
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Sprint $sprints
     */
    public function removeSprint(\GhaenCollege\ScrumBundle\Entity\Sprint $sprints)
    {
        $this->sprints->removeElement($sprints);
    }

    /**
     * Get sprints
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSprints()
    {
        return $this->sprints;
    }

    public function __toString()
    {
        return (string) $this->getUnit();
    }
}