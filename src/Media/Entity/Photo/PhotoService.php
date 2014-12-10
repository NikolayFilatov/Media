<?php

/**
 * @namespace
 */
namespace Media\Entity\Photo;

use Base\Service\AbstractDefaultService;


/**
 * @category    Alt
 * @package     Media
 */
class PhotoService extends AbstractDefaultService
{
    /**
     * Repository instance.
     * @var \Media\Entity\Photo\PhotoRepository
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
                ->getRepository('Media\Entity\Photo\Photo'));

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
     * @param Photo $photo
     * @param bool $flush
     * @return $this
     */
    public function savePhoto(Photo $photo, $flush = true)
    {
        $this->getRepository()->save($photo, $flush);
        return $this;
    }

    /**
     * @param $data
     * @return \Media\Entity\Photo\Photo
     */
    public function createPhoto($data)
    {
        $photo = $this->getServiceLocator()->get('Media\Entity\Photo\Photo');
        $photo->setData($data);

        return $photo;
    }

} //end class here