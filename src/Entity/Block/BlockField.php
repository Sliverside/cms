<?php

namespace App\Entity\Block;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Block\BlockFieldRepository")
 */
class BlockField
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $displayOrder;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Block\BlockFieldTranslation", mappedBy="blockField", orphanRemoval=true)
     */
    private $blockFieldTranslations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Block\Block", inversedBy="blockFields")
     * @ORM\JoinColumn(nullable=false)
     */
    private $block;

    public function __construct()
    {
        $this->blockFieldTranslations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDisplayOrder(): ?int
    {
        return $this->displayOrder;
    }

    public function setDisplayOrder(int $displayOrder): self
    {
        $this->displayOrder = $displayOrder;

        return $this;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|BlockFieldTranslation[]
     */
    public function getBlockFieldTranslations(): Collection
    {
        return $this->blockFieldTranslations;
    }

    public function addBlockFieldTranslation(BlockFieldTranslation $blockFieldTranslation): self
    {
        if (!$this->blockFieldTranslations->contains($blockFieldTranslation)) {
            $this->blockFieldTranslations[] = $blockFieldTranslation;
            $blockFieldTranslation->setBlockField($this);
        }

        return $this;
    }

    public function removeBlockFieldTranslation(BlockFieldTranslation $blockFieldTranslation): self
    {
        if ($this->blockFieldTranslations->contains($blockFieldTranslation)) {
            $this->blockFieldTranslations->removeElement($blockFieldTranslation);
            // set the owning side to null (unless already changed)
            if ($blockFieldTranslation->getBlockField() === $this) {
                $blockFieldTranslation->setBlockField(null);
            }
        }

        return $this;
    }

    public function getBlock(): ?Block
    {
        return $this->block;
    }

    public function setBlock(?Block $block): self
    {
        $this->block = $block;

        return $this;
    }
}
