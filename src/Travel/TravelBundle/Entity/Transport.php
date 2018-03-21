<?php

namespace Travel\TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transport
 *
 * @ORM\Table(name="transport")
 * @ORM\Entity(repositoryClass="Travel\TravelBundle\Repository\TransportRepository")
 */
class Transport
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
     * @ORM\Column(name="transit", type="string", length=25)
     */
    private $transit;

    /**
     * @var string
     *
     * @ORM\Column(name="comission", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $comission;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTransport", type="datetime")
     */
    private $dateTransport;


    /**
     * @ORM\ManyToOne(targetEntity="Travel\TravelBundle\Entity\Camion",inversedBy="transports")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camion;

    /**
    * @ORM\ManyToMany(targetEntity="Travel\TravelBundle\Entity\Client",cascade={"persist"})
    */
    private $clients;

    /**
    * @ORM\OneToMany(targetEntity="Travel\TravelBundle\Entity\Carburant" ,mappedBy="transport")
    */
    private $carburants;

    /**
    * @ORM\OneToMany(targetEntity="Travel\TravelBundle\Entity\Maintenance" ,mappedBy="transport")
    */
    private $maintenances;

    /**
     * @var double
     *
     */
    private $totalFrais;
    /**
     * @var double
     *
     */
    private $totalCarburants;
    /**
     * @var double
     *
     */
    private $totalMaintenances;


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
     * Set transit
     *
     * @param string $transit
     *
     * @return Transport
     */
    public function setTransit($transit)
    {
        $this->transit = $transit;

        return $this;
    }

    /**
     * Get transit
     *
     * @return string
     */
    public function getTransit()
    {
        return $this->transit;
    }

    /**
     * Set comission
     *
     * @param string $comission
     *
     * @return Transport
     */
    public function setComission($comission)
    {
        $this->comission = $comission;

        return $this;
    }

    /**
     * Get comission
     *
     * @return string
     */
    public function getComission()
    {
        return $this->comission;
    }

    /**
     * Set dateTransport
     *
     * @param \DateTime $dateTransport
     *
     * @return Transport
     */
    public function setDateTransport($dateTransport)
    {
        $this->dateTransport = $dateTransport;

        return $this;
    }

    /**
     * Get dateTransport
     *
     * @return \DateTime
     */
    public function getDateTransport()
    {
        return $this->dateTransport;
    }

    

    /**
     * Set camion
     *
     * @param \Travel\TravelBundle\Entity\Camion $camion
     *
     * @return Transport
     */
    public function setCamion(\Travel\TravelBundle\Entity\Camion $camion)
    {
        $this->camion = $camion;

        return $this;
    }

    /**
     * Get camion
     *
     * @return \Travel\TravelBundle\Entity\Camion
     */
    public function getCamion()
    {
        return $this->camion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add client
     *
     * @param \Travel\TravelBundle\Entity\Client $client
     *
     * @return Transport
     */
    public function addClient(\Travel\TravelBundle\Entity\Client $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \Travel\TravelBundle\Entity\Client $client
     */
    public function removeClient(\Travel\TravelBundle\Entity\Client $client)
    {
        $this->clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }
    public function __toString(){
        return $this->id.' '.$this->camion->getPlaqueImm();
    }

    /**
     * Add carburant
     *
     * @param \Travel\TravelBundle\Entity\Carburant $carburant
     *
     * @return Transport
     */
    public function addCarburant(\Travel\TravelBundle\Entity\Carburant $carburant)
    {
        $this->carburants[] = $carburant;

        return $this;
    }

    /**
     * Remove carburant
     *
     * @param \Travel\TravelBundle\Entity\Carburant $carburant
     */
    public function removeCarburant(\Travel\TravelBundle\Entity\Carburant $carburant)
    {
        $this->carburants->removeElement($carburant);
    }

    /**
     * Get carburants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarburants()
    {
        return $this->carburants;
    }

    /**
     * Add maintenance
     *
     * @param \Travel\TravelBundle\Entity\Maintenance $maintenance
     *
     * @return Transport
     */
    public function addMaintenance(\Travel\TravelBundle\Entity\Maintenance $maintenance)
    {
        $this->maintenances[] = $maintenance;

        return $this;
    }

    /**
     * Remove maintenance
     *
     * @param \Travel\TravelBundle\Entity\Maintenance $maintenance
     */
    public function removeMaintenance(\Travel\TravelBundle\Entity\Maintenance $maintenance)
    {
        $this->maintenances->removeElement($maintenance);
    }

    /**
     * Get maintenances
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaintenances()
    {
        return $this->maintenances;
    }
    public function getTotalFrais()
    {
         $this->totalFrais = $this->comission + $this->totalCarburants + $this->totalMaintenances;
        return $this->totalFrais;
    }

    public function getTotalMaintenances()
    {
        $somme_montant=0;        
        if (!empty($this->maintenances)) {
            foreach ($this->maintenances as $ligne) {
                $somme_montant+=$ligne->getMontantMaintenance();
            }
        }
        $this->totalMaintenances=$somme_montant;
        return $this->totalMaintenances;
    }
    public function getTotalCarburants()
    {
        $somme_montant=0;        
        if (!empty($this->carburants)) {
            foreach ($this->carburants as $ligne) {
                $somme_montant+=$ligne->getTotal();
            }
        }
        $this->totalCarburants=$somme_montant;
        return $this->totalCarburants;
    }
}
