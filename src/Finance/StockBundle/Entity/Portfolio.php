<?php

namespace Finance\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portfolio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Finance\StockBundle\Entity\PortfolioRepository")
 */
class Portfolio
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Finance\StockBundle\Entity\Stock", inversedBy="portfolios")
     **/
    private $stocks;


    /**
     * @ORM\ManyToOne(targetEntity="Finance\UserBundle\Entity\User", inversedBy="portfolios")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     **/
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;


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
     * @return Portfolio
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Portfolio
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stocks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stocks
     *
     * @param \Finance\StockBundle\Entity\Stock $stocks
     * @return Portfolio
     */
    public function addStock(\Finance\StockBundle\Entity\Stock $stocks)
    {
        $this->stocks[] = $stocks;

        return $this;
    }

    /**
     * Remove stocks
     *
     * @param \Finance\StockBundle\Entity\Stock $stocks
     */
    public function removeStock(\Finance\StockBundle\Entity\Stock $stocks)
    {
        $this->stocks->removeElement($stocks);
    }

    /**
     * Get stocks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStocks()
    {
        return $this->stocks;
    }

    /**
     * Set user
     *
     * @param \Finance\UserBundle\Entity\User $user
     * @return Portfolio
     */
    public function setUser(\Finance\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Finance\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
