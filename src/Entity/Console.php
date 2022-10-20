<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ConsoleRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ConsoleRepository::class)]
#[ApiResource]
class Console
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

    #[ORM\ManyToOne(inversedBy: 'consoles')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private Platform $platform;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd/m/Y'])]
    #[Assert\NotBlank]
    private DateTimeInterface $releaseDate;

    #[ORM\Column(nullable: true)]
    private ?int $buyingPrice = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd/m/Y'])]
    private ?DateTimeInterface $buyingDate = null;

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

    public function getPlatform(): Platform
    {
        return $this->platform;
    }

    public function setPlatform(Platform $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getReleaseDate(): DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

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
}
