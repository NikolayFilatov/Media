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
     * @ORM\OneToMany(
     *      targetEntity="Media\Entity\PhotoStorage\PhotoStorage",
     *      mappedBy="media",
     *      cascade={"persist", "remove"}
     * )
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $photoStorage;

//    /**
//     * @ORM\OneToMany(
//     *      targetEntity="Application\Entity\Media\Message\Message",
//     *      mappedBy="media",
//     *      cascade={"persist", "remove"}
//     * )
//     * @var \Doctrine\Common\Collections\ArrayCollection
//     */
//    protected $messages;

    /**
     * @ORM\ManyToMany(
     *      targetEntity="Media\Entity\Message\Message",
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
     * @param PhotoStorage $photoStorage
     * @return $this
     */
    public function addPhotoStorage(\Media\Entity\PhotoStorage\PhotoStorage $photoStorage)
    {
//        $photoStorage->setMedia($this);
        $this->photoStorage->add($photoStorage);
        return $this;
    }

    /**
     * @return array
     */
    public function getPhotoStorageArray()
    {
        $ret = [];
        foreach($this->photoStorage as $ps)
            $ret[] = $ps->toArray();

        return $ret;
    }

    /**
     * @return array
     */
    public function getMessagesArray()
    {
        $ret = [];

        foreach($this->messages as $message)
            $ret[] = $message->toArray();

        return $ret;
    }

    /**
     * @return ArrayCollection
     */
    public function getPhotoStorage()
    {
        return $this->photoStorage;
    }

    /**
     * @param $message
     * @return $this
     */
    public function addMessage($message)
    {
//        $message->setMedia($this);
        $this->messages->add($message);
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id'            => $this->id,
            'photoStorage'  => $this->getPhotoStorageArray(),
            'messages'      => $this->getMessagesArray(),
        ];
    }

} //class ends here