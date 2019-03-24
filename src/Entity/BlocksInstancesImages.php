<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlocksInstancesImagesRepository")
 */
class BlocksInstancesImages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BlocksInstances", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $block_instance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BlocksFields", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $block_field;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $lang;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlockInstance(): ?BlocksInstances
    {
        return $this->block_instance;
    }

    public function setBlockInstance(?BlocksInstances $block_instance): self
    {
        $this->block_instance = $block_instance;

        return $this;
    }

    public function getBlockField(): ?BlocksFields
    {
        return $this->block_field;
    }

    public function setBlockField(BlocksFields $block_field): self
    {
        $this->block_field = $block_field;

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
}
