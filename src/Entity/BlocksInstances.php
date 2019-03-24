<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlocksInstancesRepository")
 */
class BlocksInstances
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Blocks", inversedBy="block_instances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $block;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlocksInstancesImages", mappedBy="block_instance", orphanRemoval=true)
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlock(): ?Blocks
    {
        return $this->block;
    }

    public function setBlock(?Blocks $block): self
    {
        $this->block = $block;

        return $this;
    }

    /**
     * @return Collection|BlocksInstancesImages[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(BlocksInstancesImages $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setBlockInstance($this);
        }

        return $this;
    }

    public function removeImage(BlocksInstancesImages $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getBlockInstance() === $this) {
                $image->setBlockInstance(null);
            }
        }

        return $this;
    }
}
