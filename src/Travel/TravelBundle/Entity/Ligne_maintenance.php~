<?php

namespace Travel\TravelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ligne_maintenance
 *
 * @ORM\Table(name="ligne_maintenance")
 * @ORM\Entity(repositoryClass="Travel\TravelBundle\Repository\Ligne_maintenanceRepository")
 */
class Ligne_maintenance
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
     * @ORM\Column(name="observation", type="string", length=50, nullable=true)
     */
    private $observation;

    /**
     * @var string
     *
     * @ORM\Column(name="piece", type="string", length=25)
     */
    private $piece;

    /**
     * @var string
     *
     * @ORM\Column(name="fournisseur", type="string", length=25, nullable=true)
     */
    private $fournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_unitaire_piece", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $prixUnitairePiece;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_piece", type="integer", nullable=true)
     */
    private $qtePiece;

    /**
     * @ORM\ManyToOne(targetEntity="Travel\TravelBundle\Entity\Maintenance",inversedBy="ligneMaintenances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $maintenance;

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
     * Set observation
     *
     * @param string $observation
     *
     * @return Ligne_maintenance
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set piece
     *
     * @param string $piece
     *
     * @return Ligne_maintenance
     */
    public function setPiece($piece)
    {
        $this->piece = $piece;

        return $this;
    }

    /**
     * Get piece
     *
     * @return string
     */
    public function getPiece()
    {
        return $this->piece;
    }

    /**
     * Set fournisseur
     *
     * @param string $fournisseur
     *
     * @return Ligne_maintenance
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
     * Set prixUnitairePiece
     *
     * @param string $prixUnitairePiece
     *
     * @return Ligne_maintenance
     */
    public function setPrixUnitairePiece($prixUnitairePiece)
    {
        $this->prixUnitairePiece = $prixUnitairePiece;

        return $this;
    }

    /**
     * Get prixUnitairePiece
     *
     * @return string
     */
    public function getPrixUnitairePiece()
    {
        return $this->prixUnitairePiece;
    }

    /**
     * Set qtePiece
     *
     * @param integer $qtePiece
     *
     * @return Ligne_maintenance
     */
    public function setQtePiece($qtePiece)
    {
        $this->qtePiece = $qtePiece;

        return $this;
    }

    /**
     * Get qtePiece
     *
     * @return int
     */
    public function getQtePiece()
    {
        return $this->qtePiece;
    }

    /**
     * Set maintenance
     *
     * @param \Travel\TravelBundle\Entity\Maintenance $maintenance
     *
     * @return Ligne_maintenance
     */
    public function setMaintenance(\Travel\TravelBundle\Entity\Maintenance $maintenance)
    {
        $this->maintenance = $maintenance;

        return $this;
    }

    /**
     * Get maintenance
     *
     * @return \Travel\TravelBundle\Entity\Maintenance
     */
    public function getMaintenance()
    {
        return $this->maintenance;
    }
}
