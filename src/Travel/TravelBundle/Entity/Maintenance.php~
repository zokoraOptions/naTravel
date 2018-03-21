<?php

namespace Travel\TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maintenance
 *
 * @ORM\Table(name="maintenance")
 * @ORM\Entity(repositoryClass="Travel\TravelBundle\Repository\MaintenanceRepository")
 */
class Maintenance
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
     * @ORM\Column(name="dateMaintenance", type="datetime")
     */
    private $dateMaintenance;

    /**
     * @var string
     *
     * @ORM\Column(name="kilometrage", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $kilometrage;
    /**
     * @var double
     *
     */
    private $montantMaintenance;

    /**
     * @ORM\ManyToOne(targetEntity="Travel\TravelBundle\Entity\Transport",inversedBy="maintenances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transport;

    /**
    * @ORM\OneToMany(targetEntity="Travel\TravelBundle\Entity\Ligne_maintenance" ,mappedBy="maintenance")
    */
    private $ligneMaintenances;

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
     * Set dateMaintenance
     *
     * @param \DateTime $dateMaintenance
     *
     * @return Maintenance
     */
    public function setDateMaintenance($dateMaintenance)
    {
        $this->dateMaintenance = $dateMaintenance;

        return $this;
    }

    /**
     * Get dateMaintenance
     *
     * @return \DateTime
     */
    public function getDateMaintenance()
    {
        return $this->dateMaintenance;
    }

    /**
     * Set kilometrage
     *
     * @param string $kilometrage
     *
     * @return Maintenance
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * Get kilometrage
     *
     * @return string
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }


    /**
     * Set transport
     *
     * @param string $transport
     *
     * @return Maintenance
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }
    
    public function __toString(){
        return "Maintenance ".$this->transport->getCamion()->getPlaqueImm();
    }
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ligneMaintenances = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ligneMaintenance
     *
     * @param \Travel\TravelBundle\Entity\Ligne_maintenance $ligneMaintenance
     *
     * @return Maintenance
     */
    public function addLigneMaintenance(\Travel\TravelBundle\Entity\Ligne_maintenance $ligneMaintenance)
    {
        $this->ligneMaintenances[] = $ligneMaintenance;

        return $this;
    }

    /**
     * Remove ligneMaintenance
     *
     * @param \Travel\TravelBundle\Entity\Ligne_maintenance $ligneMaintenance
     */
    public function removeLigneMaintenance(\Travel\TravelBundle\Entity\Ligne_maintenance $ligneMaintenance)
    {
        $this->ligneMaintenances->removeElement($ligneMaintenance);
    }

    /**
     * Get ligneMaintenances
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLigneMaintenances()
    {
        return $this->ligneMaintenances;
    }
     /**
     * Get monantMaintenance
     *
     * @return integer
     */
    public function getMontantMaintenance()
    {
        $somme_montant=0;        
        if (!empty($this->ligneMaintenances)) {
            foreach ($this->ligneMaintenances as $ligne) {
                $somme_montant+=$ligne->getPrixUnitairePiece() * $ligne->getQtePiece();
            }
        }
        $this->montantMaintenance=$somme_montant;
        return $this->montantMaintenance;
    }
    
}
