<?php
/**
 * @namespace
 */
namespace Media\Entity\Media;

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

//    /**
//     * @ORM\OneToMany(
//     *      targetEntity="Media\Entity\PhotoStorage\PhotoStorage",
//     *      mappedBy="media",
//     *      cascade={"persist", "remove"}
//     * )
//     * @var \Doctrine\Common\Collections\ArrayCollection
//     */
//    protected $photoStorage;

    /**
     * @ORM\OneToMany(
     *      targetEntity="Media\Entity\Message\Message",
     *      mappedBy="media",
     *      cascade={"persist", "remove"}
     * )
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $alt_messages;
}