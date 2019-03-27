<?php

namespace App\Entity\Block;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Block\BlockRepository")
 */
class Block
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
     * @ORM\OneToMany(targetEntity="App\Entity\Block\BlockTranslation", mappedBy="block", orphanRemoval=true)
     */
    private $blockTranslations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Block\BlockInstance", mappedBy="block", orphanRemoval=true)
     */
    private $instances;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Block\BlockField", mappedBy="block", orphanRemoval=true)
     */
    private $blockFields;

    public function __construct()
    {
        $this->blockTranslations = new ArrayCollection();
        $this->instances = new ArrayCollection();
        $this->blockFields = new ArrayCollection();
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
     * @return Collection|BlockTranslation[]
     */
    public function getBlockTranslations(): Collection
    {
        return $this->blockTranslations;
    }

    public function addBlockTranslation(BlockTranslation $blockTranslation): self
    {
        if (!$this->blockTranslations->contains($blockTranslation)) {
            $this->blockTranslations[] = $blockTranslation;
            $blockTranslation->setBlock($this);
        }

        return $this;
    }

    public function removeBlockTranslation(BlockTranslation $blockTranslation): self
    {
        if ($this->blockTranslations->contains($blockTranslation)) {
            $this->blockTranslations->removeElement($blockTranslation);
            // set the owning side to null (unless already changed)
            if ($blockTranslation->getBlock() === $this) {
                $blockTranslation->setBlock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BlockInstance[]
     */
    public function getInstances(): Collection
    {
        return $this->instances;
    }

    public function addInstance(BlockInstance $instance): self
    {
        if (!$this->instances->contains($instance)) {
            $this->instances[] = $instance;
            $instance->setBlock($this);
        }

        return $this;
    }

    public function removeInstance(BlockInstance $instance): self
    {
        if ($this->instances->contains($instance)) {
            $this->instances->removeElement($instance);
            // set the owning side to null (unless already changed)
            if ($instance->getBlock() === $this) {
                $instance->setBlock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BlockField[]
     */
    public function getBlockFields(): Collection
    {
        return $this->blockFields;
    }

    public function addBlockField(BlockField $blockField): self
    {
        if (!$this->blockFields->contains($blockField)) {
            $this->blockFields[] = $blockField;
            $blockField->setBlock($this);
        }

        return $this;
    }

    public function removeBlockField(BlockField $blockField): self
    {
        if ($this->blockFields->contains($blockField)) {
            $this->blockFields->removeElement($blockField);
            // set the owning side to null (unless already changed)
            if ($blockField->getBlock() === $this) {
                $blockField->setBlock(null);
            }
        }

        return $this;
    }
}
