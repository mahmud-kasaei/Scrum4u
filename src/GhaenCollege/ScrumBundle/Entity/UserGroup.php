<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserGroup
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UserGroup
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
     * @var \Doctrine\Common\Collections\ArrayCollection $members
     *
     * @ORM\ManyToMany(targetEntity="User",inversedBy="usergroups")
     * @ORM\JoinTable(name="user_group",
     *     joinColumns={@ORM\JoinColumn(name="group_id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="member_id",referencedColumnName="id")}
     * )
     */
    protected $members;

    public function __costruct()
    {
        $this->users=new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return UserGroup
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
     * @return UserGroup
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
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add members
     *
     * @param \GhaenCollege\ScrumBundle\Entity\User $members
     * @return UserGroup
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

    public function __toString()
    {
        return (string) $this->getTitle();
    }
}