<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sprint
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GhaenCollege\ScrumBundle\Entity\SprintRepository")
 */
class Sprint
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
     * @ORM\Column(name="goal", type="text")
     */
    private $goal;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation_demo_date", type="string", length=10)
     */
    private $presentationDemoDate;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="scrum_meeting_date", type="string", length=10)
     */
    private $scrumMeetingTime;

    /**
     * @var string
     *
     * @ORM\Column(name="scrum_meeting_place", type="string", length=40)
     */
    private $scrumMeetingPlace;

     /**
      * @ORM\ManyToOne(targetEntity="Project",inversedBy="sprints")
      * @ORM\JoinColumn(name="pid",referencedColumnName="id")
      */
    protected $project;

    /**
     * @ORM\ManyToOne(targetEntity="TimeUnit",inversedBy="sprints")
     * @ORM\JoinColumn(name="timeunit_id",referencedColumnName="id")
     */
    protected $timeunit;

    /**
     * @ORM\ManyToOne(targetEntity="Schedule",inversedBy="sprints")
     * @ORM\JoinColumn(name="schedule_id",referencedColumnName="id")
     */
    protected $schedule;

    /**
     * @ORM\OneToMany(targetEntity="Backlog",mappedBy="sprint")
     */
    protected $backlogs;

    /**
     * @ORM\ManyToOne(targetEntity="Status",inversedBy="sprints")
     * @ORM\JoinColumn(name="status_id",referencedColumnName="id")
     */
    protected $status;

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
     * @ORM\ManyToOne(targetEntity="User",inversedBy="sprintconstructions")
     * @ORM\JoinColumn(name="builder_id",referencedColumnName="id")
     */
    protected $builder;

    /**
     * @ORM\ManyToOne(targetEntity="Team",inversedBy="sprints")
     * @ORM\JoinColumn(name="team_id",referencedColumnName="id")
     */
    protected $team;

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
     * Set goal
     *
     * @param string $goal
     * @return Sprint
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;
    
        return $this;
    }

    /**
     * Get goal
     *
     * @return string 
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * Set presentationDemoDate
     *
     * @param string $presentationDemoDate
     * @return Sprint
     */
    public function setPresentationDemoDate($presentationDemoDate)
    {
        $this->presentationDemoDate = $presentationDemoDate;
    
        return $this;
    }

    /**
     * Get presentationDemoDate
     *
     * @return string 
     */
    public function getPresentationDemoDate()
    {
        return $this->presentationDemoDate;
    }

    /**
     * Set scrumMeetingDate
     *
     * @param string $scrumMeetingDate
     * @return Sprint
     */
    public function setScrumMeetingTime($scrumMeetingDate)
    {
        $this->scrumMeetingTime = $scrumMeetingDate;
    
        return $this;
    }

    /**
     * Get scrumMeetingDate
     *
     * @return string 
     */
    public function getScrumMeetingTime()
    {
        return $this->scrumMeetingTime;
    }

    /**
     * Set scrumMeetingPlace
     *
     * @param string $scrumMeetingPlace
     * @return Sprint
     */
    public function setScrumMeetingPlace($scrumMeetingPlace)
    {
        $this->scrumMeetingPlace = $scrumMeetingPlace;
    
        return $this;
    }

    /**
     * Get scrumMeetingPlace
     *
     * @return string 
     */
    public function getScrumMeetingPlace()
    {
        return $this->scrumMeetingPlace;
    }

    /**
     * Set project
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $project
     * @return Sprint
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
     * Set schedule
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Schedule $schedule
     * @return Sprint
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
     * @return Sprint
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
     * @return Sprint
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
     * Set timeunit
     *
     * @param \GhaenCollege\ScrumBundle\Entity\TimeUnit $timeunit
     * @return Sprint
     */
    public function setTimeunit(\GhaenCollege\ScrumBundle\Entity\TimeUnit $timeunit = null)
    {
        $this->timeunit = $timeunit;
    
        return $this;
    }

    /**
     * Get timeunit
     *
     * @return \GhaenCollege\ScrumBundle\Entity\TimeUnit 
     */
    public function getTimeunit()
    {
        return $this->timeunit;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Sprint
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

    public function __toString()
    {
        return (string) $this->getTitle();
    }

    /**
     * Set createDate
     *
     * @param string $createDate
     * @return Sprint
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
     * @return Sprint
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
     * @return Sprint
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
     * @return Sprint
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
     * Set team
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Team $team
     * @return Sprint
     */
    public function setTeam(\GhaenCollege\ScrumBundle\Entity\Team $team = null)
    {
        $this->team = $team;
    
        return $this;
    }

    /**
     * Get team
     *
     * @return \GhaenCollege\ScrumBundle\Entity\Team 
     */
    public function getTeam()
    {
        return $this->team;
    }
}