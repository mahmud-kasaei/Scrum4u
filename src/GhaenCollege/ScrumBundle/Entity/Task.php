<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GhaenCollege\ScrumBundle\Entity\TaskRepository")
 */
class Task
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Backlog",inversedBy="tasks")
     * @ORM\JoinColumn(name="backlog_id",referencedColumnName="id")
     */
    protected $backlog;


    /**
     * @ORM\ManyToOne(targetEntity="Status",inversedBy="tasks")
     * @ORM\JoinColumn(name="status_id",referencedColumnName="id")
     */
    protected $status;

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
    private $real;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="tasks")
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
     * @ORM\ManyToOne(targetEntity="User",inversedBy="taskconstructions")
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
     * @return Task
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
     * @return Task
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
     * Set backlog
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Backlog $backlog
     * @return Task
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
     * Set estimate
     *
     * @param integer $estimate
     * @return Task
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
     * Set real
     *
     * @param integer $real
     * @return Task
     */
    public function setReal($real)
    {
        $this->real = $real;
    
        return $this;
    }

    /**
     * Get real
     *
     * @return integer 
     */
    public function getReal()
    {
        return $this->real;
    }

    /**
     * Set status
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Status $status
     * @return Task
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
     * Set responsible
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $responsible
     * @return Task
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

    public function __toString()
    {
        return (string) $this->getTitle();
    }

    /**
     * Set createDate
     *
     * @param string $createDate
     * @return Task
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
     * @return Task
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
     * @return Task
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
     * @return Task
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
}