<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Annonce
 *
 * @ORM\Table(name="annonces")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnonceRepository")
 */
class Annonce
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
     * @ORM\Column(name="email_proprietaire", type="string", length=56)
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "L'email '{{ value }}' n'est pas un email valide.",
     *     checkMX = true
     * )
     */
    private $emailProprietaire;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone_proprietaire", type="string", length=12)
     * @Assert\NotBlank
     * @Assert\Regex("/^0[1-68]([-. ]?[0-9]{2}){4}$/")
     */
    private $telephoneProprietaire;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_proprietaire", type="string", length=65)
     * @Assert\NotBlank
     */
    private $nomProprietaire;

    /**
     * @var string
     *
     * @ORM\Column(name="type_proprietaire", type="string", length=65)
     * @Assert\NotBlank
     */
    private $typeProprietaire;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=65)
     * @Assert\NotBlank
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     * @Assert\NotBlank
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="complementAdresse", type="string", length=125, nullable=true)
     */
    private $complementAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="integer")
     * @Assert\NotBlank
     * @Assert\Length(max = 5)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=65)
     * @Assert\NotBlank
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=65)
     * @Assert\NotBlank
     */
    private $typeBien;

    /**
     * @var string
     *
     * @ORM\Column(name="typeLocation", type="string", length=65)
     * @Assert\NotBlank
     */
    private $typeLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="dureeMin", type="string", length=65, nullable=true)
     */
    private $dureeMin;

    /**
     * @var string
     *
     * @ORM\Column(name="dureeMax", type="string", length=65, nullable=true)
     */
    private $dureeMax;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateDisponible", type="date")
     */
    private $dateDisponible;

    /**
     * @var int
     *
     * @ORM\Column(name="surface", type="integer")
     */
    private $surface;

    /**
     * @var int
     *
     * @ORM\Column(name="nombrePieces", type="integer")
     */
    private $nombrePieces;

    /**
     * @var string
     *
     * @ORM\Column(name="commodites", type="string", length=65, nullable=true)
     */
    private $commodites;

    /**
     * @var int
     *
     * @ORM\Column(name="loyer", type="float")
     */
    private $loyer;

    /**
     * @var int
     *
     * @ORM\Column(name="charges", type="float")
     */
    private $charges;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="informations", type="string", length=255, nullable=true)
     */
    private $informations;

    /**
     * @ORM\ManyToMany(targetEntity="Fichier",cascade={"persist"})
     * @Assert\Count(
     *      max = 5,
     *      maxMessage = "Vous ne pouvez pas mettre plus de {{ limit }} images"
     * )
     */
    private $images;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var date
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->dateDisponible = new \DateTime();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString(){
      return $this->nom ?? 'Nouvelle Annonce';
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set emailProprietaire
     *
     * @param string $emailProprietaire
     *
     * @return Annonce
     */
    public function setEmailProprietaire($emailProprietaire)
    {
        $this->emailProprietaire = $emailProprietaire;

        return $this;
    }

    /**
     * Get emailProprietaire
     *
     * @return string
     */
    public function getEmailProprietaire()
    {
        return $this->emailProprietaire;
    }

    /**
     * Set telephoneProprietaire
     *
     * @param integer $telephoneProprietaire
     *
     * @return Annonce
     */
    public function setTelephoneProprietaire($telephoneProprietaire)
    {
        $this->telephoneProprietaire = $telephoneProprietaire;

        return $this;
    }

    /**
     * Get telephoneProprietaire
     *
     * @return integer
     */
    public function getTelephoneProprietaire()
    {
        return $this->telephoneProprietaire;
    }

    /**
     * Set nomProprietaire
     *
     * @param string $nomProprietaire
     *
     * @return Annonce
     */
    public function setNomProprietaire($nomProprietaire)
    {
        $this->nomProprietaire = $nomProprietaire;

        return $this;
    }

    /**
     * Get nomProprietaire
     *
     * @return string
     */
    public function getNomProprietaire()
    {
        return $this->nomProprietaire;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Annonce
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Annonce
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set complementAdresse
     *
     * @param string $complementAdresse
     *
     * @return Annonce
     */
    public function setComplementAdresse($complementAdresse)
    {
        $this->complementAdresse = $complementAdresse;

        return $this;
    }

    /**
     * Get complementAdresse
     *
     * @return string
     */
    public function getComplementAdresse()
    {
        return $this->complementAdresse;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return Annonce
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Annonce
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
     * Set typeBien
     *
     * @param string $typeBien
     *
     * @return Annonce
     */
    public function setTypeBien($typeBien)
    {
        $this->typeBien = $typeBien;

        return $this;
    }

    /**
     * Get typeBien
     *
     * @return string
     */
    public function getTypeBien()
    {
        return $this->typeBien;
    }

    /**
     * Set typeLocation
     *
     * @param string $typeLocation
     *
     * @return Annonce
     */
    public function setTypeLocation($typeLocation)
    {
        $this->typeLocation = $typeLocation;

        return $this;
    }

    /**
     * Get typeLocation
     *
     * @return string
     */
    public function getTypeLocation()
    {
        return $this->typeLocation;
    }

    /**
     * Set dureeMin
     *
     * @param string $dureeMin
     *
     * @return Annonce
     */
    public function setDureeMin($dureeMin)
    {
        $this->dureeMin = $dureeMin;

        return $this;
    }

    /**
     * Get dureeMin
     *
     * @return string
     */
    public function getDureeMin()
    {
        return $this->dureeMin;
    }

    /**
     * Set dureeMax
     *
     * @param string $dureeMax
     *
     * @return Annonce
     */
    public function setDureeMax($dureeMax)
    {
        $this->dureeMax = $dureeMax;

        return $this;
    }

    /**
     * Get dureeMax
     *
     * @return string
     */
    public function getDureeMax()
    {
        return $this->dureeMax;
    }

    /**
     * Set dateDisponible
     *
     * @param \DateTime $dateDisponible
     *
     * @return Annonce
     */
    public function setDateDisponible($dateDisponible)
    {
        $this->dateDisponible = $dateDisponible;

        return $this;
    }

    /**
     * Get dateDisponible
     *
     * @return \DateTime
     */
    public function getDateDisponible()
    {
        return $this->dateDisponible;
    }

    /**
     * Set surface
     *
     * @param integer $surface
     *
     * @return Annonce
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return integer
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set nombrePieces
     *
     * @param integer $nombrePieces
     *
     * @return Annonce
     */
    public function setNombrePieces($nombrePieces)
    {
        $this->nombrePieces = $nombrePieces;

        return $this;
    }

    /**
     * Get nombrePieces
     *
     * @return integer
     */
    public function getNombrePieces()
    {
        return $this->nombrePieces;
    }

    /**
     * Set commodites
     *
     * @param string $commodites
     *
     * @return Annonce
     */
    public function setCommodites($commodites)
    {
        $this->commodites = $commodites;

        return $this;
    }

    /**
     * Get commodites
     *
     * @return string
     */
    public function getCommodites()
    {
        return $this->commodites;
    }

    /**
     * Set loyer
     *
     * @param float $loyer
     *
     * @return Annonce
     */
    public function setLoyer($loyer)
    {
        $this->loyer = $loyer;

        return $this;
    }

    /**
     * Get loyer
     *
     * @return float
     */
    public function getLoyer()
    {
        return $this->loyer;
    }

    /**
     * Set charges
     *
     * @param float $charges
     *
     * @return Annonce
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
     * Get charges
     *
     * @return float
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set informations
     *
     * @param string $informations
     *
     * @return Annonce
     */
    public function setInformations($informations)
    {
        $this->informations = $informations;

        return $this;
    }

    /**
     * Get informations
     *
     * @return string
     */
    public function getInformations()
    {
        return $this->informations;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Annonce
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add image
     *
     * @param \AppBundle\Entity\Fichier $image
     *
     * @return Annonce
     */
    public function addImage(\AppBundle\Entity\Fichier $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Fichier $image
     */
    public function removeImage(\AppBundle\Entity\Fichier $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Annonce
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set typeProprietaire
     *
     * @param string $typeProprietaire
     *
     * @return Annonce
     */
    public function setTypeProprietaire($typeProprietaire)
    {
        $this->typeProprietaire = $typeProprietaire;

        return $this;
    }

    /**
     * Get typeProprietaire
     *
     * @return string
     */
    public function getTypeProprietaire()
    {
        return $this->typeProprietaire;
    }
}
