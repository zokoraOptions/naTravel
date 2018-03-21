<?php

namespace Travel\TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conducteur
 *
 * @ORM\Table(name="conducteur")
 * @ORM\Entity(repositoryClass="Travel\TravelBundle\Repository\ConducteurRepository")
 */
class Conducteur
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
     * @ORM\Column(name="nom_conducteur", type="string", length=25)
     */
    private $nomConducteur;

    /**
     * @var string
     *
     * @ORM\Column(name="permis_numero", type="string", length=50, nullable=true)
     */
    private $permisNumero;

    /**
    * @ORM\OneToMany(targetEntity="Travel\TravelBundle\Entity\Camion" ,mappedBy="conducteur")
    */
    private $camions;
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
     * Set nomConducteur
     *
     * @param string $nomConducteur
     *
     * @return Conducteur
     */
    public function setNomConducteur($nomConducteur)
    {
        $this->nomConducteur = $nomConducteur;

        return $this;
    }

    /**
     * Get nomConducteur
     *
     * @return string
     */
    public function getNomConducteur()
    {
        return $this->nomConducteur;
    }

    /**
     * Set permisNumero
     *
     * @param string $permisNumero
     *
     * @return Conducteur
     */
    public function setPermisNumero($permisNumero)
    {
        $this->permisNumero = $permisNumero;

        return $this;
    }

    /**
     * Get permisNumero
     *
     * @return string
     */
    public function getPermisNumero()
    {
        return $this->permisNumero;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->camions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add camion
     *
     * @param \Travel\TravelBundle\Entity\Camion $camion
     *
     * @return Conducteur
     */
    public function addCamion(\Travel\TravelBundle\Entity\Camion $camion)
    {
        $this->camions[] = $camion;

        return $this;
    }

    /**
     * Remove camion
     *
     * @param \Travel\TravelBundle\Entity\Camion $camion
     */
    public function removeCamion(\Travel\TravelBundle\Entity\Camion $camion)
    {
        $this->camions->removeElement($camion);
    }

    /**
     * Get camions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCamions()
    {
        return $this->camions;
    }
    public function __toString(){
        return $this->nomConducteur;
    }
}
