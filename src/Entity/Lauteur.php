<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lauteur
 *
 * @ORM\Table(name="lauteur", uniqueConstraints={@ORM\UniqueConstraint(name="lenom_UNIQUE", columns={"lelog"})})
 * @ORM\Entity
 */
class Lauteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="idlauteur", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlauteur;

    /**
     * @var string
     *
     * @ORM\Column(name="lelog", type="string", length=80, nullable=false)
     */
    private $lelog;

    /**
     * @var string
     *
     * @ORM\Column(name="lepass", type="string", length=80, nullable=false)
     */
    private $lepass;

    /**
     * @var string
     *
     * @ORM\Column(name="lenomcomplet", type="string", length=150, nullable=false)
     */
    private $lenomcomplet;

    public function getIdlauteur(): ?int
    {
        return $this->idlauteur;
    }

    public function getLelog(): ?string
    {
        return $this->lelog;
    }

    public function setLelog(string $lelog): self
    {
        $this->lelog = $lelog;

        return $this;
    }

    public function getLepass(): ?string
    {
        return $this->lepass;
    }

    public function setLepass(string $lepass): self
    {
        $this->lepass = $lepass;

        return $this;
    }

    public function getLenomcomplet(): ?string
    {
        return $this->lenomcomplet;
    }

    public function setLenomcomplet(string $lenomcomplet): self
    {
        $this->lenomcomplet = $lenomcomplet;

        return $this;
    }


}
