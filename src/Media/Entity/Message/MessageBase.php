<?php

/**
 * @namespace
 */
namespace Media\Entity\Message;

use Base\Entity\AbstractEntityBase;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use DateTimeZone;

/**
 * @ORM\MappedSuperclass
 *
 * @category    Media
 * @package     Alt
 */
class MessageBase extends AbstractEntityBase
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
     * @ORM\Column(type="datetime", nullable=true)
     * @var datetime
     */
    protected $date;
}