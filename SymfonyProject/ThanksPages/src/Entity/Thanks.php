<?php

namespace App\Entity;

use App\Repository\ThanksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThanksRepository::class)]
class Thanks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $TksBy = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Text = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $TksFor = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $TkDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTksBy(): ?User
    {
        return $this->TksBy;
    }

    public function setTksBy(?User $TksBy): static
    {
        $this->TksBy = $TksBy;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(?string $Text): static
    {
        $this->Text = $Text;

        return $this;
    }

    public function getTksFor(): ?User
    {
        return $this->TksFor;
    }

    public function setTksFor(?User $TksFor): static
    {
        $this->TksFor = $TksFor;

        return $this;
    }

    public function getTkDate(): ?\DateTimeInterface
    {
        return $this->TkDate;
    }

    public function setTkDate(\DateTimeInterface $TkDate): static
    {
        $this->TkDate = $TkDate;

        return $this;
    }
}
