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
        {
            $repository = $this->getServiceLocator()->get('Media\Entity\Photo\Photo');
            $this->setRepository($this->getEntityManager()
                ->getRepository(get_class($repository)));
        }

        return $this->repository;
    }

    /**
     * @param \Base\Service\AbstractDefaultRepository $repository
     * @return mixed|void
     */
    public function setRepository(\Base\Service\AbstractDefaultRepository $repository)
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * @param Photo $photo
     * @param bool $flush
     * @return $this
     */
    public function savePhoto(\Media\Entity\Photo\PhotoBase $photo, $flush = true)
    {
        $this->getRepository()->save($photo, $flush);
        return $photo;
    }

    /**
     * @param Photo $photo
     * @param bool $flush
     * @return $this
     */
    public function removePhoto(\Media\Entity\Photo\PhotoBase $photo, $flush = true)
    {
        $this->getRepository()->remove($photo, $flush);
        return $this;
    }

    /**
     * @param $data
     * @return \Media\Entity\Photo\Photo
     */
    public function createPhoto($data)
    {
        $photo = $this->getServiceLocator()->get('Media\Entity\Photo\Photo');
        $photo_namespace = get_class($photo);
        $photo = new $photo_namespace($data);

        return $this->savePhoto($photo);
    }

    /**
     * Function for get photo entity by id
     *
     * @param $id
     * @return null|object
     */
    public function getPhotoById($id)
    {
        return $this->getRepository()->getEntityById($id);
    }

}