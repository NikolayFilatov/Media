<?php
namespace Media\Entity\Media;

use Base\Entity\AbstractEntityBase;
use Base\Service\AbstractDefaultRepository;

/**
 * @category    Alt
 * @package     Media
 */
class MediaRepository extends AbstractDefaultRepository {

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
            $this->_em->flush();

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
            $this->_em->flush();

        return $this;
    }

    /**
     * Function for get media by id
     *
     * @param $id
     * @return \Doctrine\ORM\Query
     */
    public function getMediaById($id)
    {
        $query = $this->_em
            ->createQuery("select u from $this->_entityName u where u.id=" . (int)$id);

        return $query->getSingleResult();
    }

}