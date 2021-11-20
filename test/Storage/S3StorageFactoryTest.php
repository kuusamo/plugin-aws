<?php

namespace Kuusamo\Plugin\Aws\Storage\Test;

use Kuusamo\Plugin\Aws\Storage\S3Storage;
use Kuusamo\Plugin\Aws\Storage\S3StorageFactory;
use PHPUnit\Framework\TestCase;

class S3StorageFactoryTest extends TestCase
{
    public function testCreate()
    {
        $provider = S3StorageFactory::create('key', 'secret', 'eu-west-1', 'bucket');
        $this->assertInstanceOf(S3Storage::class, $provider);
    }
}
