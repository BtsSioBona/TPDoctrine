<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seminaire
 *
 * @ORM\Table(name="seminaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeminaireRepository")
 */
class Seminaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutSem", type="datetime")
     */
    private $dateDebutSem;

    /**
     * @ORM\ManyToMany(targetEntity="\AppBundle\Entity\Employe", mappedBy="seminaires")
     */
    private $employes;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateDebutSem
     *
     * @param \DateTime $dateDebutSem
     *
     * @return Seminaire
     */
    public function setDateDebutSem($dateDebutSem)
    {
        $this->dateDebutSem = $dateDebutSem;

        return $this;
    }

    /**
     * Get dateDebutSem
     *
     * @return \DateTime
     */
    public function getDateDebutSem()
    {
        return $this->dateDebutSem;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->employes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add employe
     *
     * @param \AppBundle\Entity\Employe $employe
     *
     * @return Seminaire
     */
    public function addEmploye(\AppBundle\Entity\Employe $employe)
    {
        $this->employes[] = $employe;

        return $this;
    }

    /**
     * Remove employe
     *
     * @param \AppBundle\Entity\Employe $employe
     */
    public function removeEmploye(\AppBundle\Entity\Employe $employe)
    {
        $this->employes->removeElement($employe);
    }

    /**
     * Get employes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployes()
    {
        return $this->employes;
    }
}
