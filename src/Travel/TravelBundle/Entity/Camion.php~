<?php

namespace Travel\TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Camion
 *
 * @ORM\Table(name="camion")
 * @ORM\Entity(repositoryClass="Travel\TravelBundle\Repository\CamionRepository")
 */
class Camion
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
     * @ORM\Column(name="plaque_imm", type="string", length=10, unique=true)
     */
    private $plaqueImm;

    /**
     * @var bool
     *
     * @ORM\Column(name="tierce", type="boolean", nullable=true)
     */
    private $tierce;

    /**
    * @ORM\ManyToOne(targetEntity="Travel\TravelBundle\Entity\Conducteur",inversedBy="camions")
    * @ORM\JoinColumn(nullable=false)
    */
    private $conducteur;

    /**
    * @ORM\OneToMany(targetEntity="Travel\TravelBundle\Entity\Transport" ,mappedBy="camion")
    */
    private $transports;


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
     * Set plaqueImm
     *
     * @param string $plaqueImm
     *
     * @return Camion
     */
    public function setPlaqueImm($plaqueImm)
    {
        $this->plaqueImm = $plaqueImm;

        return $this;
    }

    /**
     * Get plaqueImm
     *
     * @return string
     */
    public function getPlaqueImm()
    {
        return $this->plaqueImm;
    }

    /**
     * Set tierce
     *
     * @param boolean $tierce
     *
     * @return Camion
     */
    public function setTierce($tierce)
    {
        $this->tierce = $tierce;

        return $this;
    }

    /**
     * Get tierce
     *
     * @return bool
     */
    public function getTierce()
    {
        return $this->tierce;
    }

    /**
     * Set conducteur
     *
     * @param string $conducteur
     *
     * @return Camion
     */
    public function setConducteur($conducteur)
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    /**
     * Get conducteur
     *
     * @return string
     */
    public function getConducteur()
    {
        return $this->conducteur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->transports = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add transport
     *
     * @param \Travel\TravelBundle\Entity\Transport $transport
     *
     * @return Camion
     */
    public function addTransport(\Travel\TravelBundle\Entity\Transport $transport)
    {
        $this->transports[] = $transport;

        return $this;
    }

    /**
     * Remove transport
     *
     * @param \Travel\TravelBundle\Entity\Transport $transport
     */
    public function removeTransport(\Travel\TravelBundle\Entity\Transport $transport)
    {
        $this->transports->removeElement($transport);
    }

    /**
     * Get transports
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransports()
    {
        return $this->transports;
    }
    public function __toString(){
        return $this->plaqueImm;
    }
}
