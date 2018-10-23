<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Styles
 *
 * @ORM\Table(name="styles")
 * @ORM\Entity
 */
class Styles
{
    /**
     * @var int
     *
     * @ORM\Column(name="idstyles", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstyles;

    /**
     * @var string
     *
     * @ORM\Column(name="lestyles", type="string", length=120, nullable=false)
     */
    private $lestyles;

    /**
     * @var string
     *
     * @ORM\Column(name="ladescription", type="string", length=600, nullable=false)
     */
    private $ladescription;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lesports", inversedBy="stylesstyles")
     * @ORM\OrderBy({"idlesports" ="DESC"})
     * @ORM\JoinTable(name="styles_has_lesports",
     *   joinColumns={
     *     @ORM\JoinColumn(name="styles_idstyles", referencedColumnName="idstyles")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="lesports_idlesports", referencedColumnName="idlesports")
     *   }
     * )
     */
    private $lesportslesports;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lesportslesports = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdstyles(): ?int
    {
        return $this->idstyles;
    }

    public function getLestyles(): ?string
    {
        return $this->lestyles;
    }

    public function setLestyles(string $lestyles): self
    {
        $this->lestyles = $lestyles;

        return $this;
    }

    public function getLadescription(): ?string
    {
        return $this->ladescription;
    }

    public function setLadescription(string $ladescription): self
    {
        $this->ladescription = $ladescription;

        return $this;
    }

    /**
     * @return Collection|Lesports[]
     */
    public function getLesportslesports(): Collection
    {
        return $this->lesportslesports;
    }

    public function addLesportslesport(Lesports $lesportslesport): self
    {
        if (!$this->lesportslesports->contains($lesportslesport)) {
            $this->lesportslesports[] = $lesportslesport;
        }

        return $this;
    }

    public function removeLesportslesport(Lesports $lesportslesport): self
    {
        if ($this->lesportslesports->contains($lesportslesport)) {
            $this->lesportslesports->removeElement($lesportslesport);
        }

        return $this;
    }

}
