<?php

/**
 * @namespace
 */
namespace Media\Entity\PhotoStorage;

use Base\Entity\AbstractEntityBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 *
 * @category    Media
 * @package     Alt
 */
abstract class PhotoStorageBase extends AbstractEntityBase
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
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $private = 0;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'description'   => $this->description,
            'private'       => $this->private,
        ];
    }

    /**
     * Function for set items to photo storage
     *
     * @param \Media\Entity\Photo\PhotoBase $item
     * @return mixed
     */
    abstract public function addItems(\Media\Entity\Photo\PhotoBase $item);
}