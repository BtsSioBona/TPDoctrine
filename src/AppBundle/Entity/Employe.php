<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table(name="Employe", indexes={@ORM\Index(name="ind_nom", columns={"nom"}),
 * @ORM\Index(name="ind_ville", columns={"ville"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeRepository")
 */
class Employe
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="salaire", type="decimal", precision=8, scale=2)
     */
    private $salaire;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=40, options={"default"="Toulon"})
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Projet")
     */
    private $projet;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Seminaire", inversedBy="employes")
     * @ORM\JoinTable(
     *     name="Inscrit",
     *     joinColumns={@ORM\JoinColumn(name="idEmploye", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="idSeminaire", referencedColumnName="id")}
     * )
     */
    private $seminaires;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Employe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Employe
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set salaire
     *
     * @param string $salaire
     *
     * @return Employe
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire
     *
     * @return string
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Employe
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set projet
     *
     * @param \AppBundle\Entity\Projet $projet
     *
     * @return Employe
     */
    public function setProjet(\AppBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \AppBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->seminaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add seminaire
     *
     * @param \AppBundle\Entity\Seminaire $seminaire
     *
     * @return Employe
     */
    public function addSeminaire(\AppBundle\Entity\Seminaire $seminaire)
    {
        $this->seminaires[] = $seminaire;

        return $this;
    }

    /**
     * Remove seminaire
     *
     * @param \AppBundle\Entity\Seminaire $seminaire
     */
    public function removeSeminaire(\AppBundle\Entity\Seminaire $seminaire)
    {
        $this->seminaires->removeElement($seminaire);
    }

    /**
     * Get seminaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeminaires()
    {
        return $this->seminaires;
    }
}
