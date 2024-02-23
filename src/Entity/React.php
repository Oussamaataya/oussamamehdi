<?php

namespace App\Entity;

use App\Repository\ReactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReactRepository::class)]
class React
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reacts')]
    private ?Users $id_user = null;

    #[ORM\ManyToOne(inversedBy: 'reacts')]
    private ?Publication $id_pub = null;

    #[ORM\Column]
    private ?int $LikeCount = null;

    #[ORM\Column]
    private ?int $DislikeCount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdPub(): ?Publication
    {
        return $this->id_pub;
    }

    public function setIdPub(?Publication $id_pub): static
    {
        $this->id_pub = $id_pub;

        return $this;
    }

    public function getLikeCount(): ?int
    {
        return $this->LikeCount;
    }

    public function setLikeCount(int $LikeCount): static
    {
        $this->LikeCount = $LikeCount;

        return $this;
    }

    public function getDislikeCount(): ?int
    {
        return $this->DislikeCount;
    }

    public function setDislikeCount(int $DislikeCount): static
    {
        $this->DislikeCount = $DislikeCount;

        return $this;
    }
}
