<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Epic
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GhaenCollege\ScrumBundle\Entity\EpicRepository")
 */
class Epic
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
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Backlog",mappedBy="epic")
     */
    protected $backlogs;

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
     * Set title
     *
     * @param string $title
     * @return Epic
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Epic
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->backlogs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add backlogs
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Backlog $backlogs
     * @return Epic
     */
    public function addBacklog(\GhaenCollege\ScrumBundle\Entity\Backlog $backlogs)
    {
        $this->backlogs[] = $backlogs;
    
        return $this;
    }

    /**
     * Remove backlogs
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Backlog $backlogs
     */
    public function removeBacklog(\GhaenCollege\ScrumBundle\Entity\Backlog $backlogs)
    {
        $this->backlogs->removeElement($backlogs);
    }

    /**
     * Get backlogs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBacklogs()
    {
        return $this->backlogs;
    }
    public function __toString()
    {
        return (string) $this->getTitle();
    }
}