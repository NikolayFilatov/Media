<?php
return [
    'factories' => [
        'doctrine.cache.my_redis' => function ($sm) {
            $cache = new \Doctrine\Common\Cache\RedisCache();
            $redis = new \Redis();
            $config = $sm->get('config')['redis'];
            $redis->connect($config['connection']['host'], $config['connection']['port']);
            $cache->setRedis($redis);

            return $cache;
        },
        'Media\Entity\Media\MediaService'   => function ($sm) {
            $service = new \Media\Entity\Media\MediaService();
            $service->setServiceLocator($sm);

            return $service;
        },
    ],
    'invokables'    => [
        'Media\Entity\Media\Media'  => 'Media\Entity\Media\Media',
    ],
    'aliases' => [
        'MediaService'  => 'Media\Entity\Media\MediaService',
        'MediaEntity'   => 'Media\Entity\Media\Media',
    ]
];