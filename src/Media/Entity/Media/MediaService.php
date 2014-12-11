<?php

/**
 * @namespace
 */
namespace Media\Entity\Media;

use Base\Service\AbstractDefaultService;


/**
 * @category    Alt
 * @package     Media
 */
class MediaService extends AbstractDefaultService
{
    /**
     * Repository instance.
     * @var \Media\Entity\Media\MediaRepository
     */
    protected $repository;

    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $locator;

    /**
     * Function for get repository
     *
     * @return \Base\Service\AbstractDefaultRepository
     */
    public function getRepository()
    {
        if($this->repository == null)
            $this->setRepository($this->getEntityManager()
                 ->getRepository('\Media\Entity\Media\Media'));

        return $this->repository;
    }

    /**
     * @param \Base\Service\AbstractDefaultRepository $repository
     * @return mixed|void
     */
    public function setRepository(\Base\Service\AbstractDefaultRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Media $media
     * @return Media
     */
    public function saveMedia(\Media\Entity\Media\Media $media, $flush = true)
    {
        $this->getRepository()->save($media, $flush);
        return $media;
    }

    /**
     * @param $data
     * @return \Media\Entity\Media\Media
     */
    public function createMedia($data = null)
    {
        $media = $this->getServiceLocator()->get('\Media\Entity\Media\Media');
        $media_namespace = get_class($media);
        $media = new $media_namespace($data);

        return $media;
    }

    /**
     * @param $entity
     * @return Media
     */
    public function addMediaToEntity($entity)
    {
        $media = $this->createMedia();
        $entity->setMedia($media);

        return $media;
    }

} //end class here