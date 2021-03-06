<?php

namespace Finance\StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Finance\StockBundle\Entity\StockRepository")
 */
class Stock
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
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=255)
     */
    private $symbol;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity="Finance\StockBundle\Entity\Portfolio", mappedBy="stocks", cascade={"persist",
     * "remove"})
     **/
    private $portfolios;

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
     * @return Stock
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
     * Set symbol
     *
     * @param string $symbol
     * @return Stock
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Stock
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Stock
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
        $this->portfolios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add portfolios
     *
     * @param \Finance\StockBundle\Entity\Portfolio $portfolios
     * @return Stock
     */
    public function addPortfolio(\Finance\StockBundle\Entity\Portfolio $portfolios)
    {
        $this->portfolios[] = $portfolios;

        return $this;
    }

    /**
     * Remove portfolios
     *
     * @param \Finance\StockBundle\Entity\Portfolio $portfolios
     */
    public function removePortfolio(\Finance\StockBundle\Entity\Portfolio $portfolios)
    {
        $this->portfolios->removeElement($portfolios);
    }

    /**
     * Get portfolios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPortfolios()
    {
        return $this->portfolios;
    }
}
