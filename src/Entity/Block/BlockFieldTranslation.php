<?php

namespace App\Entity\Block;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Block\BlockFieldTranslationRepository")
 */
class BlockFieldTranslation
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
    private $label;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $lang;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Block\BlockField", inversedBy="blockFieldTranslations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $blockField;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getBlockField(): ?BlockField
    {
        return $this->blockField;
    }

    public function setBlockField(?BlockField $blockField): self
    {
        $this->blockField = $blockField;

        return $this;
    }
}
