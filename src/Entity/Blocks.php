<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlocksRepository")
 */
class Blocks
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Blocks", inversedBy="children")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Blocks", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlocksInstances", mappedBy="block", orphanRemoval=true)
     */
    private $block_instances;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlocksFields", mappedBy="block", orphanRemoval=true ,cascade={"persist"})
     */
    private $block_fields;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->block_instances = new ArrayCollection();
        $this->block_fields = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(self $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(self $child, EntityManager $em): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            $em->remove($child);
            $em->flush();
        }

        return $this;
    }

    /**
     * @return Collection|BlockInstances[]
     */
    public function getBlockInstances(): Collection
    {
        return $this->block_instances;
    }

    public function addBlockInstance(BlockInstances $blockInstance): self
    {
        if (!$this->block_instances->contains($blockInstance)) {
            $this->block_instances[] = $blockInstance;
            $blockInstance->setBlockName($this);
        }

        return $this;
    }

    public function removeBlockInstance(BlockInstances $blockInstance): self
    {
        if ($this->block_instances->contains($blockInstance)) {
            $this->block_instances->removeElement($blockInstance);
            // set the owning side to null (unless already changed)
            if ($blockInstance->getBlockName() === $this) {
                $blockInstance->setBlockName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BlocksFields[]
     */
    public function getBlockFields(): Collection
    {
        return $this->block_fields;
    }

    public function addBlockField(BlocksFields $blockField): self
    {
        if (!$this->block_fields->contains($blockField)) {
            $this->block_fields[] = $blockField;
            $blockField->setBlock($this);
        }

        return $this;
    }

    public function removeBlockField(BlocksFields $blockField): self
    {
        if ($this->block_fields->contains($blockField)) {
            $this->block_fields->removeElement($blockField);
            // set the owning side to null (unless already changed)
            if ($blockField->getBlock() === $this) {
                $blockField->setBlock(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->getId().'';
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
}