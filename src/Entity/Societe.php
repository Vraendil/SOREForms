<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocieteRepository::class)]
class Societe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\OneToMany(targetEntity: Article::class, mappedBy: 'societe')]
    private Collection $articles;

    /**
     * @var Collection<int, LitigeQualite>
     */
    #[ORM\OneToMany(targetEntity: LitigeQualite::class, mappedBy: 'societe')]
    private Collection $litigeQualites;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->litigeQualites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->setSociete($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getSociete() === $this) {
                $article->setSociete(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LitigeQualite>
     */
    public function getLitigeQualites(): Collection
    {
        return $this->litigeQualites;
    }

    public function addLitigeQualite(LitigeQualite $litigeQualite): static
    {
        if (!$this->litigeQualites->contains($litigeQualite)) {
            $this->litigeQualites->add($litigeQualite);
            $litigeQualite->setSociete($this);
        }

        return $this;
    }

    public function removeLitigeQualite(LitigeQualite $litigeQualite): static
    {
        if ($this->litigeQualites->removeElement($litigeQualite)) {
            // set the owning side to null (unless already changed)
            if ($litigeQualite->getSociete() === $this) {
                $litigeQualite->setSociete(null);
            }
        }

        return $this;
    }
}
