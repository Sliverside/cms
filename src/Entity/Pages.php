<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PagesRepository")
 */
class Pages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PagesTranslations", mappedBy="page", orphanRemoval=true)
     */
    private $translations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pages", inversedBy="children")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pages", mappedBy="parent")
     */
    private $children;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|PagesTranslations[]
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(PagesTranslations $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
        }

        return $this;
    }

    public function removeTranslation(PagesTranslations $translation): self
    {
        if ($this->translations->contains($translation)) {
            $this->translations->removeElement($translation);
        }

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        if (!$parent->children->contains($this)) {
            $parent->children[] = $this;
        }

        return $this;
    }

    public function removeParent(): self
    {
        if ($this->parent != null) {
            
            if (!$this->parent->children->contains($this)) {
                $this->parent->removeChild($this);
            }
    
            $this->parent = null;
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

}
