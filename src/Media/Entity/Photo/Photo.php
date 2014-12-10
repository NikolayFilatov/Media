<?php

/**
 * @namespace
 */
namespace Media\Entity\Photo;

use Base\Entity\AbstractEntityBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Media\Entity\PhotoStorage\PhotoStorageRepository")
 * @ORM\Table(name="alt_photo", options={"collate"="utf8_general_ci"})
 *
 * @category    Media
 * @package     Alt
 */
class Photo extends AbstractEntityBase
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
     * @ORM\Column(type="string", length=128)
     * @var string
     */
    protected $name = '';

    /**
     * @ORM\Column(type="string", length=128)
     * @var string
     */
    protected $description = '';

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $private = 0;

    /**
     * @ORM\Column(type="string", length=128)
     * @var string
     */
    protected  $path;

    /**
     * @ORM\ManyToOne(
     *      targetEntity="Media\Entity\PhotoStorage\PhotoStorage",
     *      inversedBy="items"
     * )
     * @var \Media\Entity\PhotoStorage\PhotoStorage
     */
    protected $storage;

    /**
     * @ORM\ManyToOne(targetEntity="Media\Entity\Media\Media")
     *
     * @var \Media\Entity\Media\Media
     */
    protected $media;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int
     */
    protected $author;

    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
        // populate instance with provided data
        return parent::__construct($data);
    }

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
            'storage_id'    => $this->storage->getId(),
            'media'         => $this->getMeadiaId(),
            'author_id'     => $this->author,
        ];
    }

    /**
     * @return null
     */
    public function getMediaId()
    {
        if($this->media)
            return $this->media->getId();

        return null;
    }
}