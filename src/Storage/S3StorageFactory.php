<?php

namespace Kuusamo\Plugin\Aws\Storage;

use Aws\S3\S3Client;

class S3StorageFactory
{
    /**
     * Create an S3 storage provider.
     *
     * @param string $key        AWS key.
     * @param string $secret     AWS secret.
     * @param string $region     Region such as eu-west-1.
     * @param string $bucketName Bucket name.
     * @return S3Storage
     */
    public static function create(string $key, string $secret, string $region, string $bucketName): S3Storage
    {
        $client = new S3Client([
            'version' => 'latest',
            'region'  => $region,
            'credentials' => [
                'key'    => $key,
                'secret' => $secret,
            ]
        ]);

        return new S3Storage($client, $bucketName);
    }
}
