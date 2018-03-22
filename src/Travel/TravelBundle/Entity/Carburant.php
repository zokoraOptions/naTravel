<?php

namespace Travel\TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carburant
 *
 * @ORM\Table(name="carburant")
 * @ORM\Entity(repositoryClass="Travel\TravelBundle\Repository\CarburantRepository")
 */
class Carburant
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
     * @ORM\Column(name="type_carburant", type="string", length=15, nullable=true)
     */
    private $typeCarburant;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_unitaire", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $prixUnitaire;

    /**
     * @var string
     *
     * @ORM\Column(name="num_carte_carburant", type="string", length=25, nullable=true)
     */
    private $numCarteCarburant;

    /**
     * @var string
     *
     * @ORM\Column(name="fournisseur", type="string", length=25, nullable=true)
     */
    private $fournisseur;

    /**
     * @var integer
     *
     */
    private $total;
        /**
     * @var int
     *
     * @ORM\Column(name="qte", type="integer",nullable=false)
     */
    private $qte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_achat", type="datetime")
     */
    private $dateAchat;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Travel\TravelBundle\Entity\Transport",inversedBy="carburants")
     */
    private $transport;


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
     * Set typeCarburant
     *
     * @param string $typeCarburant
     *
     * @return Carburant
     */
    public function setTypeCarburant($typeCarburant)
    {
        $this->typeCarburant = $typeCarburant;

        return $this;
    }

    /**
     * Get typeCarburant
     *
     * @return string
     */
    public function getTypeCarburant()
    {
        return $this->typeCarburant;
    }

    /**
     * Set prixUnitaire
     *
     * @param string $prixUnitaire
     *
     * @return Carburant
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    /**
     * Get prixUnitaire
     *
     * @return string
     */
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Set numCarteCarburant
     *
     * @param string $numCarteCarburant
     *
     * @return Carburant
     */
    public function setNumCarteCarburant($numCarteCarburant)
    {
        $this->numCarteCarburant = $numCarteCarburant;

        return $this;
    }

    /**
     * Get numCarteCarburant
     *
     * @return string
     */
    public function getNumCarteCarburant()
    {
        return $this->numCarteCarburant;
    }


    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
         $this->total =  $this->prixUnitaire *  $this->qte;

        return $this->total;
    }
    /**
     * Set total
     *
     * @param double $total
     *
     * @return Carburant
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Set transport
     *
     * @param string $transport
     *
     * @return Carburant
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
        return  $this->total;
    }

    /**
     * Set fournisseur
     *
     * @param string $fournisseur
     *
     * @return Carburant
     */
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return string
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * Set dateAchat
     *
     * @param \DateTime $dateAchat
     *
     * @return Carburant
     */
    public function setDateAchat($dateAchat)
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    /**
     * Get dateAchat
     *
     * @return \DateTime
     */
    public function getDateAchat()
    {
        return $this->dateAchat;
    }

    /**
     * Set qte
     *
     * @param integer $qte
     *
     * @return Carburant
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return integer
     */
    public function getQte()
    {
        return $this->qte;
    }
}
