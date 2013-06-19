<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BasicInfo
 *
 * @ORM\Table(name="basic_info")
 * @ORM\Entity
 */
class BasicInfo
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
     * @ORM\Column(name="create_date", type="string", length=10)
     */
    private $createDate;

    /**
     * @var string
     *
     * @ORM\Column(name="start_date", type="string", length=10)
     */
    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="end_date", type="string", length=10)
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="constructions")
     * @ORM\JoinColumn(name="builder_id",referencedColumnName="id")
     */
    protected $builder;

    /**
     * @ORM\OneToOne(targetEntity="Sprint",mappedBy="basicInfo")
     *
     */
    protected $sprint;

    /**
     * @ORM\OneToOne(targetEntity="Project",mappedBy="basicInfo")
     *
     */
    protected $project;

    /**
     * @ORM\OneToOne(targetEntity="Backlog",mappedBy="basicInfo")
     *
     */
    protected $backlog;

    /**
     * @ORM\OneToOne(targetEntity="Task",mappedBy="basicInfo")
     *
     */
    protected $task;

    /**
     * @ORM\OneToOne(targetEntity="Test",mappedBy="basicInfo")
     *
     */
    protected $test;



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
     * Set createDate
     *
     * @param string $createDate
     * @return BasicInfo
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
     * @return BasicInfo
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
     * @return BasicInfo
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
     * Set sprint
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Sprint $sprint
     * @return BasicInfo
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
     * @return BasicInfo
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
     * Set backlog
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Backlog $backlog
     * @return BasicInfo
     */
    public function setBacklog(\GhaenCollege\ScrumBundle\Entity\Backlog $backlog = null)
    {
        $this->backlog = $backlog;
    
        return $this;
    }

    /**
     * Get backlog
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Backlog 
     */
    public function getBacklog()
    {
        return $this->backlog;
    }

    /**
     * Set task
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Task $task
     * @return BasicInfo
     */
    public function setTask(\GhaenCollege\ScrumBundle\Entity\Task $task = null)
    {
        $this->task = $task;
    
        return $this;
    }

    /**
     * Get task
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Task 
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set test
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Test $test
     * @return BasicInfo
     */
    public function setTest(\GhaenCollege\ScrumBundle\Entity\Test $test = null)
    {
        $this->test = $test;
    
        return $this;
    }

    /**
     * Get test
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Test 
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Set builder
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $builder
     * @return BasicInfo
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
        return (string) $this->getId();
    }
}