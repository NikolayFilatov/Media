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
    ],
    'invokables'    => [
        'Media\Entity\Media\Media'                      => 'Media\Entity\Media\Media',
        'Media\Entity\PhotoStorage\PhotoStorage'        => 'Media\Entity\PhotoStorage\PhotoStorage',
        'Media\Entity\Photo\Photo'                      => 'Media\Entity\Photo\Photo',
        'Media\Entity\Media\MediaService'               => 'Media\Entity\Media\MediaService',
        'Media\Entity\PhotoStorage\PhotoStorageService' => 'Media\Entity\PhotoStorage\PhotoStorageService',
        'Media\Entity\Photo\PhotoService'               => 'Media\Entity\Photo\PhotoService',
    ],
];