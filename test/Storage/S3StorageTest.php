<?php

namespace Kuusamo\Plugin\Aws\Storage\Test;

use Kuusamo\Plugin\Aws\Storage\S3Storage;
use Kuusamo\Plugin\Aws\Test\Mock\S3ClientMock;
use PHPUnit\Framework\TestCase;

class S3StorageTest extends TestCase
{
    public function testGet()
    {
        $clientMock = $this->createMock('Aws\S3\S3Client');

        $clientMock->expects($this->once())->method('__call')->with('getObject', [[
            'Bucket' => 'test-bucket',
            'Key' => 'filename.pdf'
        ]])->willReturn([
            'Body' => 'file-data',
            'ContentType' => 'application/pdf'
        ]);

        $provider = new S3Storage($clientMock, 'test-bucket');
        $provider->get('filename.pdf');
    }

    public function testPut()
    {
        $clientMock = $this->createMock('Aws\S3\S3Client');

        $clientMock->expects($this->once())->method('__call')->with('putObject', [[
            'Bucket' => 'test-bucket',
            'Key' => 'filename.pdf',
            'Body' => 'file-data',
            'ContentType' => 'application/pdf'
        ]]);

        $provider = new S3Storage($clientMock, 'test-bucket');
        $provider->put('filename.pdf', 'file-data', 'application/pdf');
    }

    public function testDelete()
    {
        $clientMock = $this->createMock('Aws\S3\S3Client');

        $clientMock->expects($this->once())->method('__call')->with('deleteObject', [[
            'Bucket' => 'test-bucket',
            'Key' => 'filename.pdf'
        ]]);

        $provider = new S3Storage($clientMock, 'test-bucket');
        $provider->delete('filename.pdf');
    }
}
