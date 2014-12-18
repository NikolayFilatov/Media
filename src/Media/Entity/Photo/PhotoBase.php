<?php

/**
 * @namespace
 */
namespace Media\Entity\Photo;

use Base\Entity\AbstractEntityBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 *
 * @category    Media
 * @package     Alt
 */
class PhotoBase extends AbstractEntityBase
{
    /**
     * Protected entity properties
     * @var array
     */
    protected $protectedProperties = ['id'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=128)
     * @var string
     */
    protected $path;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'description'   => $this->description,
            'path'          => $this->path,
        ];
    }
}