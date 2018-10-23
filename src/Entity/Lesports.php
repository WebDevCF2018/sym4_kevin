<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lesports
 *
 * @ORM\Table(name="lesports", indexes={@ORM\Index(name="fk_lesports_lauteur_idx", columns={"lauteur_idlauteur"})})
 * @ORM\Entity
 */
class Lesports
{
    /**
     * @var int
     *
     * @ORM\Column(name="idlesports", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlesports;

    /**
     * @var string
     *
     * @ORM\Column(name="letitres", type="string", length=200, nullable=false)
     */
    private $letitres;

    /**
     * @var string
     *
     * @ORM\Column(name="letextes", type="text", length=65535, nullable=false)
     */
    private $letextes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ladates", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $ladates = 'CURRENT_TIMESTAMP';

    /**
     * @var \Lauteur
     *
     * @ORM\ManyToOne(targetEntity="Lauteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lauteur_idlauteur", referencedColumnName="idlauteur")
     * })
     */
    private $lauteurlauteur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Styles", mappedBy="lesportslesports")
     */
    private $stylesstyles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stylesstyles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdlesports(): ?int
    {
        return $this->idlesports;
    }

    public function getLetitres(): ?string
    {
        return $this->letitres;
    }

    public function setLetitres(string $letitres): self
    {
        $this->letitres = $letitres;

        return $this;
    }

    public function getLetextes(): ?string
    {
        return $this->letextes;
    }

    public function setLetextes(string $letextes): self
    {
        $this->letextes = $letextes;

        return $this;
    }

    public function getLadates(): ?\DateTimeInterface
    {
        return $this->ladates;
    }

    public function setLadates(?\DateTimeInterface $ladates): self
    {
        $this->ladates = $ladates;

        return $this;
    }

    public function getLauteurlauteur(): ?Lauteur
    {
        return $this->lauteurlauteur;
    }

    public function setLauteurlauteur(?Lauteur $lauteurlauteur): self
    {
        $this->lauteurlauteur = $lauteurlauteur;

        return $this;
    }

    /**
     * @return Collection|Styles[]
     */
    public function getStylesstyles(): Collection
    {
        return $this->stylesstyles;
    }

    public function addStylesstyle(Styles $stylesstyle): self
    {
        if (!$this->stylesstyles->contains($stylesstyle)) {
            $this->stylesstyles[] = $stylesstyle;
            $stylesstyle->addLesportslesport($this);
        }

        return $this;
    }

    public function removeStylesstyle(Styles $stylesstyle): self
    {
        if ($this->stylesstyles->contains($stylesstyle)) {
            $this->stylesstyles->removeElement($stylesstyle);
            $stylesstyle->removeLesportslesport($this);
        }

        return $this;
    }

}
