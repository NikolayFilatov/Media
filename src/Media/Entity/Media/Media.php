<?php

/**
 * @namespace
 */
namespace Media\Entity\Media;

use Base\Entity\AbstractEntityBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Media\Entity\PhotoStorage\PhotoStorage;

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

    /**
     * @ORM\Column(type="string", length=1024)
     * @var string
     */
    protected $description = '';

    /**
     * @ORM\OneToMany(
     *      targetEntity="Media\Entity\PhotoStorage\PhotoStorage",
     *      mappedBy="parent_media",
     *      cascade={"persist", "remove"}
     * )
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $photoStorage;

    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
        return parent::__construct($data);
    }

    /**
     * @param PhotoStorage $photoStorage
     * @return $this
     */
    public function addPhotoStorage(PhotoStorage $photoStorage)
    {
        $photoStorage->setMedia($this);
        $this->photoStorage->add($photoStorage);
        return $this;
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
        ];
    }

} //class ends here