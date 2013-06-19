<?php

namespace GhaenCollege\ScrumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GhaenCollege\ScrumBundle\Entity\TestRepository")
 */
class Test
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
     * @var string
     *
     * @ORM\Column(name="setup", type="text")
     */
    private $setup;

    /**
     * @var string
     *
     * @ORM\Column(name="inputs", type="text")
     */
    private $inputs;

    /**
     * @var string
     *
     * @ORM\Column(name="setps", type="text")
     */
    private $setps;

    /**
     * @var string
     *
     * @ORM\Column(name="expectedResult", type="text")
     */
    private $expectedResult;

    /**
     * @var string
     *
     * @ORM\Column(name="actualResult", type="text")
     */
    private $actualResult;

    /**
     * @ORM\ManyToOne(targetEntity="Backlog",inversedBy="tests")
     * @ORM\JoinColumn(name="backlog_id",referencedColumnName="id")
     */
    protected $backlog;

    /**
     * @ORM\ManyToOne(targetEntity="Status",inversedBy="tests")
     * @ORM\JoinColumn(name="status_id",referencedColumnName="id")
     */
    protected $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="estimate", type="integer")
     */
    private $estimate;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="tests")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    protected $responsible;


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
     * @ORM\ManyToOne(targetEntity="User",inversedBy="testconstructions")
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
     * @return Test
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
     * @return Test
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
     * Set setup
     *
     * @param string $setup
     * @return Test
     */
    public function setSetup($setup)
    {
        $this->setup = $setup;
    
        return $this;
    }

    /**
     * Get setup
     *
     * @return string 
     */
    public function getSetup()
    {
        return $this->setup;
    }

    /**
     * Set inputs
     *
     * @param string $inputs
     * @return Test
     */
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
    
        return $this;
    }

    /**
     * Get inputs
     *
     * @return string 
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * Set setps
     *
     * @param string $setps
     * @return Test
     */
    public function setSetps($setps)
    {
        $this->setps = $setps;
    
        return $this;
    }

    /**
     * Get setps
     *
     * @return string 
     */
    public function getSetps()
    {
        return $this->setps;
    }

    /**
     * Set expectedResult
     *
     * @param string $expectedResult
     * @return Test
     */
    public function setExpectedResult($expectedResult)
    {
        $this->expectedResult = $expectedResult;
    
        return $this;
    }

    /**
     * Get expectedResult
     *
     * @return string 
     */
    public function getExpectedResult()
    {
        return $this->expectedResult;
    }

    /**
     * Set actualResult
     *
     * @param string $actualResult
     * @return Test
     */
    public function setActualResult($actualResult)
    {
        $this->actualResult = $actualResult;
    
        return $this;
    }

    /**
     * Get actualResult
     *
     * @return string 
     */
    public function getActualResult()
    {
        return $this->actualResult;
    }

    /**
     * Set backlog
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Backlog $backlog
     * @return Test
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
     * @return Test
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
     * Set status
     *
     * @param \GhaenCollege\ScrumBundle\Entity\Status $status
     * @return Test
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
     * @return Test
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
     * @return Test
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
     * @return Test
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
     * @return Test
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
     * @return Test
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