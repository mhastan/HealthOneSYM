<?php

namespace App\Entity;

use App\Repository\PatientenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientenRepository::class)
 */
class Patienten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $woonplaats;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $zknummer;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $geboortedatum;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $soortverzekering;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    public function getZknummer(): ?string
    {
        return $this->zknummer;
    }

    public function setZknummer(string $zknummer): self
    {
        $this->zknummer = $zknummer;

        return $this;
    }

    public function getGeboortedatum(): ?string
    {
        return $this->geboortedatum;
    }

    public function setGeboortedatum(string $geboortedatum): self
    {
        $this->geboortedatum = $geboortedatum;

        return $this;
    }

    public function getSoortverzekering(): ?string
    {
        return $this->soortverzekering;
    }

    public function setSoortverzekering(string $soortverzekering): self
    {
        $this->soortverzekering = $soortverzekering;

        return $this;
    }
}
