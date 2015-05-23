<?php

namespace Finance\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="Finance\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Finance\StockBundle\Entity\Portfolio", mappedBy="user", cascade={"persist", "remove"})
     **/
    private $portfolios;

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
     * @return User
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
