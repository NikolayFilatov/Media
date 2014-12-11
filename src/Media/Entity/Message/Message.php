<?php

/**
 * @namespace
 */
namespace Media\Entity\Message;

use Base\Entity\AbstractEntityBase;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Media\Entity\Message\MessageRepository")
 * @ORM\Table(name="alt_message", options={"collate"="utf8_general_ci"})
 *
 * @category    Media
 * @package     Alt
 */
class Message extends AbstractEntityBase
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
     * @ORM\Column(type="string", length=4096, nullable=true)
     * @var string
     */
    protected $message;

    /**
     * @ORM\Column(type="integer")
     * @var string
     */
    protected $author;

    /**
     * @ORM\ManyToOne(
     *      targetEntity="Media\Entity\Media\Media",
     *      inversedBy="messages"
     * )
     * @var \Media\Entity\Media\Media
     */
    protected $media;

    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
        return parent::__construct($data);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id'            => $this->id,
            'message'       => $this->message,
            'author_id'     => $this->author,
            'media_id'      => $this->media->getId(),
        ];
    }
}