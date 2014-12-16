<?php

/**
 * @namespace
 */
namespace Media\Entity\Photo;

use Base\Entity\AbstractEntityBase;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Media\Entity\PhotoStorage\PhotoStorageRepository")
 * @ORM\Table(name="alt_photo", options={"collate"="utf8_general_ci"})
 *
 * @category    Media
 * @package     Alt
 */
class Photo extends PhotoBase
{
    /**
     * @ORM\ManyToOne(
     *      targetEntity="Media\Entity\PhotoStorage\PhotoStorage",
     *      inversedBy="items"
     * )
     * @var \Media\Entity\PhotoStorage\PhotoStorage
     */
    protected $storage;
}