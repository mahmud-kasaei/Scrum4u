<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GhaenCollege\ScrumBundle\Entity\StatusRepository")
 */
class Status
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
     * @ORM\OneToMany(targetEntity="Backlog",mappedBy="status")
     */
    protected $backlogs;

    /**
     * @ORM\OneToMany(targetEntity="Sprint",mappedBy="status")
     */
    protected $sprints;

    /**
     * @ORM\OneToMany(targetEntity="Project",mappedBy="status")
     */
    protected $projects;


    /**
     * @ORM\OneToMany(targetEntity="Task",mappedBy="status")
     */
    protected $tasks;

    /**
     * @ORM\OneToMany(targetEntity="Test",mappedBy="status")
     */
    protected $tests;

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
     * @return Status
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
     * @return Status
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

    /**
     * Add sprints
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Sprint $sprints
     * @return Status
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
     * @return Status
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

    /**
     * Add tasks
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Task $tasks
     * @return Status
     */
    public function addTask(\GhaenCollege\ScrumBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;
    
        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Task $tasks
     */
    public function removeTask(\GhaenCollege\ScrumBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Add tests
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Test $tests
     * @return Status
     */
    public function addTest(\GhaenCollege\ScrumBundle\Entity\Test $tests)
    {
        $this->tests[] = $tests;
    
        return $this;
    }

    /**
     * Remove tests
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Test $tests
     */
    public function removeTest(\GhaenCollege\ScrumBundle\Entity\Test $tests)
    {
        $this->tests->removeElement($tests);
    }

    /**
     * Get tests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTests()
    {
        return $this->tests;
    }

    public function __toString()
    {
        return (string) $this->getTitle();
    }
}