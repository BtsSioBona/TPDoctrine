<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ThemeRepository")
 */
class Theme
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cours", mappedBy="lesThemes")
     */
    private $lesCours;
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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Theme
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lesCours = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lesCour
     *
     * @param \AppBundle\Entity\Cours $lesCour
     *
     * @return Theme
     */
    public function addLesCour(\AppBundle\Entity\Cours $lesCour)
    {
        $this->lesCours[] = $lesCour;

        return $this;
    }

    /**
     * Remove lesCour
     *
     * @param \AppBundle\Entity\Cours $lesCour
     */
    public function removeLesCour(\AppBundle\Entity\Cours $lesCour)
    {
        $this->lesCours->removeElement($lesCour);
    }

    /**
     * Get lesCours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLesCours()
    {
        return $this->lesCours;
    }
}
