<?php
/**
 * @namespace
 */
namespace Media\Entity\Media;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Media\Entity\Media\MediaRepository")
 * @ORM\Table(name="alt_media", options={"collate"="utf8_general_ci"})
 *
 * @category    Media
 * @package     Alt
 */
class Media extends \Media\Entity\Media\MediaBase
{
    /**
     * @ORM\OneToMany(
     *      targetEntity="Media\Entity\PhotoStorage\PhotoStorage",
     *      mappedBy="media",
     *      cascade={"persist", "remove"}
     * )
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $photoStorage;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Media\Entity\Message\Message",
     *      mappedBy="media",
     *      cascade={"persist", "remove"}
     * )
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $messages;

    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->photoStorage = new ArrayCollection();
        $this->messages = new ArrayCollection();

        return parent::__construct($data);
    }

    /**
     * Function for add photo storage to media entity
     *
     * @param \Media\Entity\PhotoStorage\PhotoStorageBase $photoStorage
     * @return mixed
     */
    public function addPhotoStorage(\Media\Entity\PhotoStorage\PhotoStorageBase $photoStorage)
    {
        $photoStorage->setMedia($this);
        $this->photoStorage->add($photoStorage);
        return $this;
    }

    /**
     * Function for set message to media entity
     *
     * @param \Media\Entity\Message\MessageBase $message
     * @return mixed
     */
    public function addMessages(\Media\Entity\Message\MessageBase $message)
    {
        $this->messages->add($message);
        $message->setMedia($this);
        return $this;
    }
}