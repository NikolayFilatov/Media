<?php

/**
 * @namespace
 */
namespace Media\Entity\Media;

use Base\Entity\AbstractEntityBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Media\Entity\Media\MediaRepository")
 * @ORM\Table(name="alt_media", options={"collate"="utf8_general_ci"})
 *
 * @category    Media
 * @package     Alt
 */
class Media extends AbstractEntityBase
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

//    /**
//     * @ORM\OneToMany(
//     *      targetEntity="Album\Entity\Item\Item",
//     *      mappedBy="album",
//     *      cascade={"persist", "remove"}
//     * )
//     * @var \Doctrine\Common\Collections\ArrayCollection
//     */
//    protected $items;

    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
//        $this->items = new ArrayCollection();

        // populate instance with provided data
        return parent::__construct($data);
    }

//    public function addItem(\Media\Entity\Item\Item $item)
//    {
//        $item->setAlbum($this);
//        $this->items->add($item);
//        return $this;
//    }

} //class ends here