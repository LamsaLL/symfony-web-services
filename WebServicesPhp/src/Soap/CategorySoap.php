<?php 

namespace App\Soap;

/**
 * Class CategorySoap
 * @package App\Soap
 */
class CategorySoap
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $text
     */
    private $text;

    /**
     * @var string $image
     */
    private $image;

    /**
     * CategorySoap constructor.
     * @param int $id
     * @param string $name
     * @param string $text
     * @param string $image
     */
    public function __construct(
        int $id,
        string $name,
        string $text,
        string $image
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->text = $text;
        $this->image = $image;
    }
    
    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}