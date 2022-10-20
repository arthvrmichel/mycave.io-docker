<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\GameRepository;
use App\Serializer\Normalizer\BuyingPriceNormalizer;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GameRepository::class)]
#[ApiResource]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column]
    #[ApiProperty(identifier: true)]
    #[Assert\NotBlank]
    private int $id;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private string $name;

    #[ORM\Column(nullable: true)]
    private ?int $buyingPrice = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd/m/Y'])]
    private ?\DateTimeInterface $buyingDate = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private PreservationState $preservationState;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private Platform $platform;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private Edition $edition;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private Version $version;

    public function __construct()
    {
        $this->gameVersions = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBuyingPrice(): ?int
    {
        return $this->buyingPrice;
    }

    public function setBuyingPrice(?int $buyingPrice): self
    {
        $this->buyingPrice = $buyingPrice;

        return $this;
    }

    public function getBuyingDate(): ?DateTimeInterface
    {
        return $this->buyingDate;
    }

    public function setBuyingDate(?DateTimeInterface $buyingDate): self
    {
        $this->buyingDate = $buyingDate;

        return $this;
    }

    public function getPreservationState(): PreservationState
    {
        return $this->preservationState;
    }

    public function setPreservationState(PreservationState $preservationState): self
    {
        $this->preservationState = $preservationState;

        return $this;
    }

    public function getPlatform(): Platform
    {
        return $this->platform;
    }

    public function setPlatform(Platform $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getEdition(): Edition
    {
        return $this->edition;
    }

    public function setEdition(Edition $edition): self
    {
        $this->edition = $edition;

        return $this;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }

    public function setVersion(Version $version): self
    {
        $this->version = $version;

        return $this;
    }
}
