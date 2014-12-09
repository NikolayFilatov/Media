<?php
namespace Media\Entity\Photo;

use Base\Entity\AbstractEntityBase;
use Base\Service\AbstractDefaultRepository;

/**
 * @category    Alt
 * @package     Media
 */
class PhotoRepository extends AbstractDefaultRepository {

    /**
     * Function for save entity
     *
     * @param AbstractEntityBase $entity
     * @param bool $flush
     * @return mixed
     */
    public function save(\Base\Entity\AbstractEntityBase $entity, $flush = true)
    {
        $this->_em->persist($entity);

        if($flush)
            $this->_em->flush($entity);

        return $entity;
    }

    /**
     * Function for remove entity
     *
     * @param AbstractEntityBase $entity
     * @param bool $flush
     * @return mixed
     */
    public function remove(\Base\Entity\AbstractEntityBase $entity, $flush = true)
    {
        $this->_em->remove($entity);

        if($flush)
            $this->_em->flush($entity);

        return $this;
    }
}