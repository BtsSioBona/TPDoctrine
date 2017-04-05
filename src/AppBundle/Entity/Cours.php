<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoursRepository")
 */
class Cours
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
     * @ORM\Column(name="libelleCours", type="string", length=40)
     */
    private $libelleCours;

    /**
     * @var int
     *
     * @ORM\Column(name="nbJours", type="integer")
     */
    private $nbJours;


    /**
     * @ORM\ManyToMany(targetEntity="Appbundle\Entity\Theme")
     * @ORM\JoinTable(name="coursTheme",
     *      joinColumns={@ORM\JoinColumn(name="idCours", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="idTheme", referencedColumnName="id")}
     * )
     */
    private $lesThemes;
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
     * Set libelleCours
     *
     * @param string $libelleCours
     *
     * @return Cours
     */
    public function setLibelleCours($libelleCours)
    {
        $this->libelleCours = $libelleCours;

        return $this;
    }

    /**
     * Get libelleCours
     *
     * @return string
     */
    public function getLibelleCours()
    {
        return $this->libelleCours;
    }

    /**
     * Set nbJours
     *
     * @param integer $nbJours
     *
     * @return Cours
     */
    public function setNbJours($nbJours)
    {
        $this->nbJours = $nbJours;

        return $this;
    }

    /**
     * Get nbJours
     *
     * @return int
     */
    public function getNbJours()
    {
        return $this->nbJours;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lesThemes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lesTheme
     *
     * @param \Appbundle\Entity\Theme $lesTheme
     *
     * @return Cours
     */
    public function addLesTheme(\Appbundle\Entity\Theme $lesTheme)
    {
        $this->lesThemes[] = $lesTheme;

        return $this;
    }

    /**
     * Remove lesTheme
     *
     * @param \Appbundle\Entity\Theme $lesTheme
     */
    public function removeLesTheme(\Appbundle\Entity\Theme $lesTheme)
    {
        $this->lesThemes->removeElement($lesTheme);
    }

    /**
     * Get lesThemes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLesThemes()
    {
        return $this->lesThemes;
    }
}
