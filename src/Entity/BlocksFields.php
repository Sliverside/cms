<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlocksFieldsRepository")
 */
class BlocksFields
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
    private $field_order = 0;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Blocks", inversedBy="block_fields")
     * @ORM\JoinColumn(nullable=false)
     */
    private $block;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFieldOrder(): ?int
    {
        return $this->field_order;
    }

    public function setFieldOrder(int $field_order): self
    {
        $this->field_order = $field_order;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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

    public function getBlock(): ?Blocks
    {
        return $this->block;
    }

    public function setBlock(?Blocks $block): self
    {
        $this->block = $block;

        return $this;
    }
}
