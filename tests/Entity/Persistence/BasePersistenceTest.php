<?php
/**
 * Copyright (c) 2017, Andrew Longosz
 */

namespace App\Tests\Entity\Persistence;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\Setup;
use PHPUnit\Framework\TestCase;

abstract class BasePersistenceTest extends TestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected static $entityManager;

    public static function setUpBeforeClass()
    {
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__.'/../../../src'], true, null, null, false);
        $connectionParameters = [
            'url' => getenv('DATABASE_URL'),
        ];

        self::$entityManager = EntityManager::create($connectionParameters, $config);
        $metadata = self::$entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool = new SchemaTool(self::$entityManager);
        if (!empty($metadata)) {
            $schemaTool->createSchema($metadata);
        }
    }
}
