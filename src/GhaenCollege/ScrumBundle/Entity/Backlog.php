<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Backlog
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GhaenCollege\ScrumBundle\Entity\BacklogRepository")
 */
class Backlog
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="estimate", type="integer", nullable=true)
     */
    private $estimate;

    /**
     * @var integer
     *
     * @ORM\Column(name="real_time", type="integer", nullable=true)
     */
    private $realtime;


    /**
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer", nullable=true)
     */
    private $importance;

    /**
     * @var string
     *
     * @ORM\Column(name="how_its_demo", type="text", nullable=true)
     */
    private $howItsDemo;

    /**
     * @ORM\ManyToOne(targetEntity="Sprint",inversedBy="backlogs")
     * @ORM\JoinColumn(name="sprint_id",referencedColumnName="id")
     */
    protected $sprint;

    /**
     * @ORM\ManyToOne(targetEntity="Project",inversedBy="backlogs")
     * @ORM\JoinColumn(name="pid",referencedColumnName="id")
     */
    protected $project;

    /**
     * @ORM\ManyToOne(targetEntity="Epic",inversedBy="backlogs")
     * @ORM\JoinColumn(name="epic_id",referencedColumnName="id")
     */
    protected $epic;

    /**
     * @ORM\OneToMany(targetEntity="Task",mappedBy="backlog")
     */
    protected $tasks;

    /**
     * @ORM\OneToMany(targetEntity="Test",mappedBy="backlog")
     */
    protected $tests;

    /**
     * @ORM\ManyToOne(targetEntity="Status",inversedBy="backlogs")
     * @ORM\JoinColumn(name="status_id",referencedColumnName="id")
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="backlogs")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    protected $responsible;

    /**
     * @var string
     *
     * @ORM\Column(name="create_date", type="string", length=10, nullable=true)
     */
    private $createDate;

    /**
     * @var string
     *
     * @ORM\Column(name="start_date", type="string", length=10, nullable=true)
     */
    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="end_date", type="string", length=10, nullable=true)
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="backlogconstructions")
     * @ORM\JoinColumn(name="builder_id",referencedColumnName="id")
     */
    protected $builder;

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
     * @return Backlog
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
     * @return Backlog
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
     * Set estimate
     *
     * @param integer $estimate
     * @return Backlog
     */
    public function setEstimate($estimate)
    {
        $this->estimate = $estimate;
    
        return $this;
    }

    /**
     * Get estimate
     *
     * @return integer 
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     * @return Backlog
     */
    public function setImportance($priority)
    {
        $this->importance = $priority;
    
        return $this;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getImportance()
    {
        return $this->importance;
    }

    /**
     * Set howItsDemo
     *
     * @param string $howItsDemo
     * @return Backlog
     */
    public function setHowItsDemo($howItsDemo)
    {
        $this->howItsDemo = $howItsDemo;
    
        return $this;
    }

    /**
     * Get howItsDemo
     *
     * @return string 
     */
    public function getHowItsDemo()
    {
        return $this->howItsDemo;
    }

    /**
     * Set sprint
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Sprint $sprint
     * @return Backlog
     */
    public function setSprint(\GhaenCollege\ScrumBundle\Entity\Sprint $sprint = null)
    {
        $this->sprint = $sprint;
    
        return $this;
    }

    /**
     * Get sprint
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Sprint
     */
    public function getSprint()
    {
        return $this->sprint;
    }

    /**
     * Set project
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $project
     * @return Backlog
     */
    public function setProject(\GhaenCollege\ScrumBundle\Entity\Project $project = null)
    {
        $this->project = $project;
    
        return $this;
    }

    /**
     * Get project
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tests = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add tasks
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Task $tasks
     * @return Backlog
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
     * @return Backlog
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

    /**
     * Set epic
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Epic $epic
     * @return Backlog
     */
    public function setEpic(\GhaenCollege\ScrumBundle\Entity\Epic $epic = null)
    {
        $this->epic = $epic;
    
        return $this;
    }

    /**
     * Get epic
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Epic 
     */
    public function getEpic()
    {
        return $this->epic;
    }

    /**
     * Set status
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Status $status
     * @return Backlog
     */
    public function setStatus(\GhaenCollege\ScrumBundle\Entity\Status $status = null)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Status 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set real
     *
     * @param integer $real
     * @return Backlog
     */
    public function setRealtime($real)
    {
        $this->realtime = $real;
    
        return $this;
    }

    /**
     * Get real
     *
     * @return integer 
     */
    public function getRealtime()
    {
        return $this->realtime;
    }

    /**
     * Set responsible
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $responsible
     * @return Backlog
     */
    public function setResponsible(\GhaenCollege\ScrumBundle\Entity\User $responsible = null)
    {
        $this->responsible = $responsible;
    
        return $this;
    }

    /**
     * Get responsible
     *
     * @return \GhaenCollege\ScrumBundle\Entity\User 
     */
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * Set createDate
     *
     * @param string $createDate
     * @return Backlog
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    
        return $this;
    }

    /**
     * Get createDate
     *
     * @return string 
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set startDate
     *
     * @param string $startDate
     * @return Backlog
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    
        return $this;
    }

    /**
     * Get startDate
     *
     * @return string 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param string $endDate
     * @return Backlog
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    
        return $this;
    }

    /**
     * Get endDate
     *
     * @return string 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set builder
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $builder
     * @return Backlog
     */
    public function setBuilder(\GhaenCollege\ScrumBundle\Entity\User $builder = null)
    {
        $this->builder = $builder;
    
        return $this;
    }

    /**
     * Get builder
     *
     * @return \GhaenCollege\ScrumBundle\Entity\User 
     */
    public function getBuilder()
    {
        return $this->builder;
    }
    public function __toString()
    {
        return $this->getTitle();
    }
}