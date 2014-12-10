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
                 ->getRepository('Media\Entity\Media\Media'));

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
     * @param bool $flush
     * @return $this
     */
    public function saveMedia(Media $media, $flush = true)
    {
        $this->getRepository()->save($media, $flush);
        return $this;
    }

    /**
     * @param $data
     * @return \Media\Entity\Media\Media
     */
    public function createMedia($data)
    {
        $media = $this->getServiceLocator()->get('Media\Entity\Media\Media');
        $media->setData($data);

        return $media;
    }

    /**
     * @param $data
     * @return \Media\Entity\PhotoStorage\PhotoStorage
     */
    public function createPhotoStorage($data)
    {
        /**
         * @var $psService \Media\Entity\PhotoStorage\PhotoStorageService
         */
        $psService = $this->getServiceLocator()->get('Media\Entity\PhotoStorage\PhotoStorageService');
        $ps = $psService->createPhotoStorage($data);

        return $ps;
    }

} //end class here