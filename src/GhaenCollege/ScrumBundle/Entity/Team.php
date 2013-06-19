<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GhaenCollege\ScrumBundle\Entity\TeamRepository")
 */
class Team
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $members
     *
     * @ORM\ManyToMany(targetEntity="User",inversedBy="teams")
     * @ORM\JoinTable(name="team_member",
     *     joinColumns={@ORM\JoinColumn(name="team_id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="member_id",referencedColumnName="id")}
     * )
     */
    protected $members;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="SMprojects")
     * @ORM\JoinColumn(name="SM_id",referencedColumnName="id")
     */
    protected  $scrum_master;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="created_teams")
     * @ORM\JoinColumn(name="SA_id",referencedColumnName="id")
     */
    protected  $system_admin;


    /**
     * @ORM\OneToMany(targetEntity="Sprint",mappedBy="team")
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
     * Set title
     *
     * @param string $title
     * @return Team
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
     * @return Team
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
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add members
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $members
     * @return Team
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

    /**
     * Set scrum_master
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $scrumMaster
     * @return Team
     */
    public function setScrumMaster(\GhaenCollege\ScrumBundle\Entity\User $scrumMaster = null)
    {
        $this->scrum_master = $scrumMaster;
    
        return $this;
    }

    /**
     * Get scrum_master
     *
     * @return \GhaenCollege\ScrumBundle\Entity\User 
     */
    public function getScrumMaster()
    {
        return $this->scrum_master;
    }

    public function __toString()
    {
        return (string) $this->getTitle();
    }

    /**
     * Add sprints
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Sprint $sprints
     * @return Team
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
     * Set system_admin
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $systemAdmin
     * @return Team
     */
    public function setSystemAdmin(\GhaenCollege\ScrumBundle\Entity\User $systemAdmin = null)
    {
        $this->system_admin = $systemAdmin;
    
        return $this;
    }

    /**
     * Get system_admin
     *
     * @return \GhaenCollege\ScrumBundle\Entity\User 
     */
    public function getSystemAdmin()
    {
        return $this->system_admin;
    }
}