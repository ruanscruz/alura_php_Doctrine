<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    /**
     * @throws ORMException
     */
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . "/.."],
            true
        );
        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite'
        ];
        return EntityManager::create($conn, $config);
    }
}