<?php

namespace Kuusamo\Plugin\Aws\Storage\Test;

use Kuusamo\Plugin\Aws\Storage\S3Storage;
use PHPUnit\Framework\TestCase;

class S3StorageTest extends TestCase
{
    public function testGet()
    {
        $client = $this->createMock('Aws\S3\S3Client');

        $client->expects($this->once())->method('getObject')->with([
            'Bucket' => 'bucket',
            'key' => 'filename.pdf'
        ]);

        $provider = new S3Storage($client, 'bucket');
        $provider->get('filename.pdf');
    }
}
