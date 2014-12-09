<?php

/**
 * @namespace
 */
namespace Media\Entity\PhotoStorage;

use Base\Entity\AbstractEntityBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Media\Entity\PhotoStorage\PhotoStorageRepository")
 * @ORM\Table(name="alt_photo_storage", options={"collate"="utf8_general_ci"})
 *
 * @category    Media
 * @package     Alt
 */
class PhotoStorage extends AbstractEntityBase
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
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->items = new ArrayCollection();

        // populate instance with provided data
        return parent::__construct($data);
    }

    /**
     * @param \Media\Entity\Photo\Photo $item
     * @return $this
     */
    public function addItem(\Media\Entity\Photo\Photo $item)
    {
        $item->setStorage($this);
        $this->items->add($item);

        return $this;
    }
}