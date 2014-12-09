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


    public function __construct(ServiceManager $locator)
    {
        $this->locator = $locator;
    }

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
     * @param $data
     * @return \Media\Entity\PhotoStorage\PhotoStorage
     */
    public function createPhotoStorage($data)
    {
        $photoStorage = $this->getServiceLocator()->get('Media\Entity\PhotoStorage\PhotoStorage');
        $photoStorage->setData($data);

        return $photoStorage;
    }

} //end class here