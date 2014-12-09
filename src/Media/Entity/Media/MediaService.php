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
                 ->getRepository('MediaEntity'));

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
     * @return \Media\Entity\Media\Media
     */
    public function createMedia($data)
    {
        $media = $this->getServiceLocator()->get('MediaEntity');
        $media->setData($data);
    }

} //end class here