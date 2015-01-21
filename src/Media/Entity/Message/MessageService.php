<?php

/**
 * @namespace
 */
namespace Media\Entity\Message;

use Base\Service\AbstractDefaultService;


/**
 * @category    Alt
 * @package     Media
 */
class MessageService extends AbstractDefaultService
{
    /**
     * Repository instance.
     * @var \Media\Entity\Message\MessageRepository
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
        $entity = $this->getServiceLocator()->get('Media\Entity\Message\Message');
        $namespace = get_class($entity);

        if($this->repository == null)
            $this->setRepository($this->getEntityManager()
                ->getRepository($namespace));

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
     * @param Message $message
     * @param bool $flush
     * @return $this
     */
    public function saveMessage(\Media\Entity\Message\MessageBase $message, $flush = true)
    {
        $this->getRepository()->save($message, $flush);
        return $message;
    }

    /**
     * @param Message $message
     * @param bool $flush
     * @return $this
     */
    public function removeMessage(\Media\Entity\Message\MessageBase $message, $flush = true)
    {
        $this->getRepository()->remove($message, $flush);
        return $this;
    }

    /**
     * @param $data
     * @return \Media\Entity\Message\Message
     */
    public function createMessage($data)
    {
        $message = $this->getServiceLocator()->get('Media\Entity\Message\Message');
        $message_namespace = get_class($message);
        $message = new $message_namespace($data);

        return $this->saveMessage($message);
    }

    /**
     * Function for get message entity by id
     *
     * @param $id
     * @return null|object
     */
    public function getMessageById($id)
    {
        return $this->getRepository()->getEntityById($id);
    }

}