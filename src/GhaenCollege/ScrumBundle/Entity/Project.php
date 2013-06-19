<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GhaenCollege\ScrumBundle\Entity\ProjectRepository")
 */
class Project
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
     * @ORM\OneToMany(targetEntity="Sprint",mappedBy="project")
     */
    protected $sprints;
    /**
     * @ORM\ManyToOne(targetEntity="Status",inversedBy="projects")
     * @ORM\JoinColumn(name="status_id",referencedColumnName="id")
     */
    protected $status;
    /**
     * @ORM\ManyToOne(targetEntity="Schedule",inversedBy="projects")
     * @ORM\JoinColumn(name="pid",referencedColumnName="id")
     */
    protected $schedule;
    /**
     * @ORM\OneToMany(targetEntity="Backlog",mappedBy="project")
     */
    protected $backlogs;
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
     * @ORM\ManyToOne(targetEntity="User",inversedBy="projectconstructions")
     * @ORM\JoinColumn(name="builder_id",referencedColumnName="id")
     */
    protected $builder;
    /**
     * @ORM\ManyToOne(targetEntity="Project",inversedBy="children")
     * @ORM\JoinColumn(name="parent_id",referencedColumnName="id")
     */
    protected  $parent;
    /**
     * @ORM\OneToMany(targetEntity="Project",mappedBy="parent")
     */
    protected $children;
    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="owners")
     * @ORM\JoinColumn(name="PO_id",referencedColumnName="id")
     */
    protected $productOwner;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $members
     *
     * @ORM\ManyToMany(targetEntity="User",mappedBy="projects")
     *
     */
    protected $members;

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
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * Set schedule
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Schedule $schedule
     * @return Project
     */
    public function setSchedule(\GhaenCollege\ScrumBundle\Entity\Schedule $schedule = null)
    {
        $this->schedule = $schedule;
    
        return $this;
    }

    /**
     * Get schedule
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Schedule 
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Add backlogs
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Backlog $backlogs
     * @return Project
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
     * Set status
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Status $status
     * @return Project
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
     * Set parent
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $parent
     * @return Project
     */
    public function setParent(\GhaenCollege\ScrumBundle\Entity\Project $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Project 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $children
     * @return Project
     */
    public function addChildren(\GhaenCollege\ScrumBundle\Entity\Project $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $children
     */
    public function removeChildren(\GhaenCollege\ScrumBundle\Entity\Project $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set productOwner
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $productOwner
     * @return Project
     */
    public function setProductOwner(\GhaenCollege\ScrumBundle\Entity\User $productOwner = null)
    {
        $this->productOwner = $productOwner;
    
        return $this;
    }

    /**
     * Get productOwner
     *
     * @return \GhaenCollege\ScrumBundle\Entity\User 
     */
    public function getProductOwner()
    {
        return $this->productOwner;
    }
    public function __toString()
    {
        return (string) $this->getTitle();
    }

    /**
     * Set createDate
     *
     * @param string $createDate
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * @return Project
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

    /**
     * Add members
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $members
     * @return Project
     */
    public function addMember(\GhaenCollege\ScrumBundle\Entity\User $members)
    {
        $this->members[] = $members;
    
        return $this;
    }

    /**
     * Remove members
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $members
     */
    public function removeMember(\GhaenCollege\ScrumBundle\Entity\User $members)
    {
        $this->members->removeElement($members);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }
}