<?php

/**
 * @namespace
 */
namespace Media\Entity\PhotoStorage;

use Base\Service\AbstractDefaultService;


/**
 * @category    Alt
 * @package     Media
 */
class PhotoStorageService extends AbstractDefaultService
{
    /**
     * Repository instance.
     * @var \Media\Entity\PhotoStorage\PhotoStorageRepository
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
                ->getRepository('Media\Entity\PhotoStorage\PhotoStorage'));

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
     * @param PhotoStorage $ps
     * @param bool $flush
     * @return $this
     */
    public function savePhotoStorage(
        \Media\Entity\PhotoStorage\PhotoStorage $photoStorage, $flush = true)
    {
        $this->getRepository()->save($photoStorage, $flush);
        return $photoStorage;
    }

    /**
     * @param PhotoStorage $ps
     * @param bool $flush
     * @return $this
     */
    public function removePhotoStorage(
        \Media\Entity\PhotoStorage\PhotoStorage $ps, $flush = true)
    {
        $cover = $ps->getCover();
        $cover->setPhotoStorage(null);
        $ps->setCover(null);

        $this->savePhotoStorage($ps);

        $this->getRepository()->remove($ps, $flush);
        return $this;
    }

    /**
     * @param $data
     * @return \Media\Entity\PhotoStorage\PhotoStorage
     */
    public function createPhotoStorage($data = null)
    {
        $photoStorage = $this->getServiceLocator()
            ->get('Media\Entity\PhotoStorage\PhotoStorage');
        $ps_namespace = get_class($photoStorage);
        $photoStorage = new $ps_namespace($data);

        return $photoStorage;
    }

    /**
     * @param $data
     * @return \Media\Entity\PhotoStorage\PhotoStorage
     */
    public function createPhoto($data)
    {
        /**
         * @var $psService \Media\Entity\Photo\PhotoService
         */
        $photoService = $this->getServiceLocator()
            ->get('Media\Entity\Photo\PhotoService');
        $photo = $photoService->createPhoto($data);

        return $photo;
    }

} //end class here