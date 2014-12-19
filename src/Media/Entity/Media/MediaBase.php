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
 * @ORM\MappedSuperclass
 *
 * @category    Media
 * @package     Alt
 */
abstract class MediaBase extends AbstractEntityBase
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
     * Function for add photo storage to media entity
     *
     * @param \Media\Entity\PhotoStorage\PhotoStorageBase $photoStorage
     * @return mixed
     */
    abstract public function addPhotoStorage(\Media\Entity\PhotoStorage\PhotoStorageBase $photoStorage);

    /**
     * Function for set message to media entity
     *
     * @param \Media\Entity\Message\MessageBase $message
     * @return mixed
     */
    abstract public function addMessages(\Media\Entity\Message\MessageBase $message);

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
     * @param $message
     * @return $this
     */
    public function addMessage($message)
    {
        $message->setMedia($this);
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