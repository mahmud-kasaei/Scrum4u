<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GhaenCollege\ScrumBundle\Entity\ScheduleRepository")
 */
class Schedule
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
     * @var integer
     *
     * @ORM\Column(name="length", type="integer")
     */


    private $length;

    /**
     * @var integer
     *
     * @ORM\Column(name="gap", type="integer")
     */
    private $gap;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Sprint",mappedBy="schedule")
     */
    protected $sprints;

    /**
     * @ORM\OneToMany(targetEntity="Project",mappedBy="schedule")
     */
    protected $projects;

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
     * @return Schedule
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
     * Set length
     *
     * @param integer $length
     * @return Schedule
     */
    public function setLength($length)
    {
        $this->length = $length;
    
        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set gap
     *
     * @param integer $gap
     * @return Schedule
     */
    public function setGap($gap)
    {
        $this->gap = $gap;
    
        return $this;
    }

    /**
     * Get gap
     *
     * @return integer 
     */
    public function getGap()
    {
        return $this->gap;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Schedule
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
        $this->sprints = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add sprints
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Sprint $sprints
     * @return Schedule
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

    /**
     * Add projects
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $projects
     * @return Schedule
     */
    public function addProject(\GhaenCollege\ScrumBundle\Entity\Project $projects)
    {
        $this->projects[] = $projects;
    
        return $this;
    }

    /**
     * Remove projects
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $projects
     */
    public function removeProject(\GhaenCollege\ScrumBundle\Entity\Project $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }
    public function __toString()
    {
        return (string) $this->getTitle();
    }
}