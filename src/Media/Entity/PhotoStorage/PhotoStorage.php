<?php

/**
 * @namespace
 */
namespace Media\Entity\PhotoStorage;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Media\Entity\PhotoStorage\PhotoStorageRepository")
 * @ORM\Table(name="alt_photo_storage", options={"collate"="utf8_general_ci"})
 *
 * @category    Media
 * @package     Alt
 */
class PhotoStorage extends \Media\Entity\PhotoStorage\PhotoStorageBase
{
    /**
     * @ORM\OneToOne(targetEntity="Media\Entity\Photo\Photo")
     * @var \Media\Entity\Photo\Photo
     */
    protected $cover;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Media\Entity\Photo\Photo",
     *      mappedBy="storage",
     *      cascade={"persist", "remove"}
     * )
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $items;

    /**
     * @ORM\ManyToOne(
     *      targetEntity="Media\Entity\Media\Media",
     *      inversedBy="photoStorage"
     * )
     * @var \Media\Entity\Media\Media
     */
    protected $media;

    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->items = new ArrayCollection();

        // populate instance with provided data
        return parent::__construct($data);
    }

    /**
     * Function for set items to photo storage
     *
     * @param \Media\Entity\Photo\PhotoBase $item
     * @return mixed
     */
    public function addItems(\Media\Entity\Photo\PhotoBase $item)
    {
        $item->setStorage($this);
        $this->items->add($item);

        return $this;
    }
}