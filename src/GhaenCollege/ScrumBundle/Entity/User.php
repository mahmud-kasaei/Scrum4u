<?php
// src/Acme/UserBundle/Entity/User.php

namespace GhaenCollege\ScrumBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="fileName", type="string", length=255, nullable=true)
     */
    private $fileName;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40,nullable=true)
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=40,nullable=true)
     */
    protected $lastname;

    /**
     * @ORM\ManyToMany(targetEntity="GhaenCollege\ScrumBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @ORM\ManyToMany(targetEntity="GhaenCollege\ScrumBundle\Entity\Project")
     * @ORM\JoinTable(name="project_user",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id")}
     * )
     */
    protected $projects;

    /**
     * @ORM\OneToMany(targetEntity="Team",mappedBy="scrum_master")
     */
    protected $SMprojects;

    /**
     * @ORM\OneToMany(targetEntity="Team",mappedBy="system_admin")
     */
    protected $created_teams;

    /**
     * @ORM\OneToMany(targetEntity="Project",mappedBy="productOwner")
     */
    protected $owners;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $teams
     *
     * @ORM\ManyToMany(targetEntity="Team",mappedBy="members")
     *
     */
    protected $teams;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $usergroups
     *
     * @ORM\ManyToMany(targetEntity="UserGroup",mappedBy="members")
     *
     */
    protected $usergroups;

    /**
     * @ORM\OneToMany(targetEntity="Backlog",mappedBy="responsible")
     */
    protected $backlogs;

    /**
     * @ORM\OneToMany(targetEntity="Task",mappedBy="responsible")
     */
    protected $tasks;

    /**
     * @ORM\OneToMany(targetEntity="Test",mappedBy="responsible")
     */
    protected $tests;

    /**
     * @ORM\OneToMany(targetEntity="Backlog",mappedBy="builder")
     */
    protected $backlogconstructions;

    /**
     * @ORM\OneToMany(targetEntity="Project",mappedBy="builder")
     */
    protected $projectconstructions;

    /**
     * @ORM\OneToMany(targetEntity="Sprint",mappedBy="builder")
     */
    protected $sprintconstructions;

    /**
     * @ORM\OneToMany(targetEntity="Task",mappedBy="builder")
     */
    protected $taskconstructions;

    /**
     * @ORM\OneToMany(targetEntity="Test",mappedBy="builder")
     */
    protected $testconstructions;

    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
        return parent::__construct();
        // your own logic
    }

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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setFirstname($name)
    {
        $this->firstname = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set group
     *
     * @param \GhaenCollege\ScrumBundle\Entity\UserGroup $group
     * @return User
     */
    public function setGroup(\GhaenCollege\ScrumBundle\Entity\UserGroup $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \GhaenCollege\ScrumBundle\Entity\UserGroup 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Add SMprojects
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Team $sMprojects
     * @return User
     */
    public function addSMproject(\GhaenCollege\ScrumBundle\Entity\Team $sMprojects)
    {
        $this->SMprojects[] = $sMprojects;
    
        return $this;
    }
    /**
     * Set fileName
     *
     * @param string $fileName
     * @return string
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Remove SMprojects
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Team $sMprojects
     */
    public function removeSMproject(\GhaenCollege\ScrumBundle\Entity\Team $sMprojects)
    {
        $this->SMprojects->removeElement($sMprojects);
    }

    /**
     * Get SMprojects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSMprojects()
    {
        return $this->SMprojects;
    }

    /**
     * Add teams
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Team $teams
     * @return User
     */
    public function addTeam(\GhaenCollege\ScrumBundle\Entity\Team $teams)
    {
        $this->teams[] = $teams;
    
        return $this;
    }

    /**
     * Remove teams
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Team $teams
     */
    public function removeTeam(\GhaenCollege\ScrumBundle\Entity\Team $teams)
    {
        $this->teams->removeElement($teams);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Add backlogs
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Backlog $backlogs
     * @return User
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
     * Add tasks
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Task $tasks
     * @return User
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
     * @return User
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
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Add groups
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Group $groups
     * @return User
     */
    public function addGroup(\FOS\UserBundle\Model\GroupInterface $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Group $groups
     */
    public function removeGroup(\FOS\UserBundle\Model\GroupInterface $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Add constructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\BasicInfo $constructions
     * @return User
     */
    public function addConstruction(\GhaenCollege\ScrumBundle\Entity\BasicInfo $constructions)
    {
        $this->constructions[] = $constructions;

        return $this;
    }

    /**
     * Remove constructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\BasicInfo $constructions
     */
    public function removeConstruction(\GhaenCollege\ScrumBundle\Entity\BasicInfo $constructions)
    {
        $this->constructions->removeElement($constructions);
    }

    /**
     * Get constructions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConstructions()
    {
        return $this->constructions;
    }

    /**
     * Add owners
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $owners
     * @return User
     */
    public function addOwner(\GhaenCollege\ScrumBundle\Entity\Project $owners)
    {
        $this->owners[] = $owners;
    
        return $this;
    }

    /**
     * Remove owners
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $owners
     */
    public function removeOwner(\GhaenCollege\ScrumBundle\Entity\Project $owners)
    {
        $this->owners->removeElement($owners);
    }

    /**
     * Get owners
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOwners()
    {
        return $this->owners;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Add backlogconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Backlog $backlogconstructions
     * @return User
     */
    public function addBacklogconstruction(\GhaenCollege\ScrumBundle\Entity\Backlog $backlogconstructions)
    {
        $this->backlogconstructions[] = $backlogconstructions;
    
        return $this;
    }

    /**
     * Remove backlogconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Backlog $backlogconstructions
     */
    public function removeBacklogconstruction(\GhaenCollege\ScrumBundle\Entity\Backlog $backlogconstructions)
    {
        $this->backlogconstructions->removeElement($backlogconstructions);
    }

    /**
     * Get backlogconstructions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBacklogconstructions()
    {
        return $this->backlogconstructions;
    }

    /**
     * Add projectconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $projectconstructions
     * @return User
     */
    public function addProjectconstruction(\GhaenCollege\ScrumBundle\Entity\Project $projectconstructions)
    {
        $this->projectconstructions[] = $projectconstructions;
    
        return $this;
    }

    /**
     * Remove projectconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $projectconstructions
     */
    public function removeProjectconstruction(\GhaenCollege\ScrumBundle\Entity\Project $projectconstructions)
    {
        $this->projectconstructions->removeElement($projectconstructions);
    }

    /**
     * Get projectconstructions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectconstructions()
    {
        return $this->projectconstructions;
    }

    /**
     * Add sprintconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Sprint $sprintconstructions
     * @return User
     */
    public function addSprintconstruction(\GhaenCollege\ScrumBundle\Entity\Sprint $sprintconstructions)
    {
        $this->sprintconstructions[] = $sprintconstructions;
    
        return $this;
    }

    /**
     * Remove sprintconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Sprint $sprintconstructions
     */
    public function removeSprintconstruction(\GhaenCollege\ScrumBundle\Entity\Sprint $sprintconstructions)
    {
        $this->sprintconstructions->removeElement($sprintconstructions);
    }

    /**
     * Get sprintconstructions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSprintconstructions()
    {
        return $this->sprintconstructions;
    }

    /**
     * Add taskconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Task $taskconstructions
     * @return User
     */
    public function addTaskconstruction(\GhaenCollege\ScrumBundle\Entity\Task $taskconstructions)
    {
        $this->taskconstructions[] = $taskconstructions;
    
        return $this;
    }

    /**
     * Remove taskconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Task $taskconstructions
     */
    public function removeTaskconstruction(\GhaenCollege\ScrumBundle\Entity\Task $taskconstructions)
    {
        $this->taskconstructions->removeElement($taskconstructions);
    }

    /**
     * Get taskconstructions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTaskconstructions()
    {
        return $this->taskconstructions;
    }

    /**
     * Add testconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Test $testconstructions
     * @return User
     */
    public function addTestconstruction(\GhaenCollege\ScrumBundle\Entity\Test $testconstructions)
    {
        $this->testconstructions[] = $testconstructions;
    
        return $this;
    }

    /**
     * Remove testconstructions
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Test $testconstructions
     */
    public function removeTestconstruction(\GhaenCollege\ScrumBundle\Entity\Test $testconstructions)
    {
        $this->testconstructions->removeElement($testconstructions);
    }

    /**
     * Get testconstructions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTestconstructions()
    {
        return $this->testconstructions;
    }

    /**
     * Add created_teams
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Team $createdTeams
     * @return User
     */
    public function addCreatedTeam(\GhaenCollege\ScrumBundle\Entity\Team $createdTeams)
    {
        $this->created_teams[] = $createdTeams;
    
        return $this;
    }

    /**
     * Remove created_teams
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Team $createdTeams
     */
    public function removeCreatedTeam(\GhaenCollege\ScrumBundle\Entity\Team $createdTeams)
    {
        $this->created_teams->removeElement($createdTeams);
    }

    /**
     * Get created_teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCreatedTeams()
    {
        return $this->created_teams;
    }

    /**
     * Add usergroups
     *
     * @param \GhaenCollege\ScrumBundle\Entity\UserGroup $usergroups
     * @return User
     */
    public function addUsergroup(\GhaenCollege\ScrumBundle\Entity\UserGroup $usergroups)
    {
        $this->usergroups[] = $usergroups;
    
        return $this;
    }

    /**
     * Remove usergroups
     *
     * @param \GhaenCollege\ScrumBundle\Entity\UserGroup $usergroups
     */
    public function removeUsergroup(\GhaenCollege\ScrumBundle\Entity\UserGroup $usergroups)
    {
        $this->usergroups->removeElement($usergroups);
    }

    /**
     * Get usergroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsergroups()
    {
        return $this->usergroups;
    }

    /**
     * Add projects
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Project $projects
     * @return User
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

    public function getAbsolutePath()
    {
        return null === $this->fileName
            ? null
            : $this->getUploadRootDir().'/'.$this->fileName;
    }

    public function getWebPath()
    {
        return null === $this->fileName
            ? null
            : $this->getUploadDir().'/'.$this->fileName;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'bundles/scrumassets/users/photoes';
    }
    public function upload($uid)
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and then the
        // target filename to move to

        $stringArray=explode(".",$this->getFile()->getClientOriginalName());
        $suffix=$stringArray[count($stringArray)-1];
        $this->fileName = ''.$this->id.'.'.$suffix;

        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->fileName
        );
        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
}