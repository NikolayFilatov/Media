<?php
namespace Album;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

/**
 * Class Module
 * @package Alt
 */
class Module implements
    ConfigProviderInterface,
    ServiceProviderInterface
{
    public function getConfig()
    {
        $module = include __DIR__ . '/config/module.config.php';
        $redis = include __DIR__ . '/config/redis.config.php';
        $config = array_merge_recursive($module, $redis);

        return $config;
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return include __DIR__ . '/config/module/service.config.php';
    }
}
