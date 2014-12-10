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
        'Media\Entity\PhotoStorage\PhotoStorageService'   => function ($sm) {
            $service = new \Media\Entity\PhotoStorage\PhotoStorageService();
            $service->setServiceLocator($sm);

            return $service;
        },
        'Media\Entity\Photo\PhotoService'   => function ($sm) {
            $service = new \Media\Entity\Photo\PhotoService();
            $service->setServiceLocator($sm);

            return $service;
        },
    ],
    'invokables'    => [
        'Media\Entity\Media\Media'                  => 'Media\Entity\Media\Media',
        'Media\Entity\PhotoStorage\PhotoStorage'    => 'Media\Entity\PhotoStorage\PhotoStorage',
        'Media\Entity\Photo\Photo'                  => 'Media\Entity\Photo\Photo',
    ],
];