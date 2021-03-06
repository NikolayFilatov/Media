<?php

/**
 * @namespace
 */
namespace Media\Entity\Message;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use DateTimeZone;

/**
 * @ORM\Entity(repositoryClass="Media\Entity\Message\MessageRepository")
 * @ORM\Table(name="alt_message", options={"collate"="utf8_general_ci"})
 *
 * @category    Media
 * @package     Alt
 */
class Message extends MessageBase
{
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
        $this->date = new DateTime('now', new \DateTimeZone('MSK'));

        return parent::__construct($data);
    }
}