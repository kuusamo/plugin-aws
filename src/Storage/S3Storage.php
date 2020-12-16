<?php

namespace Kuusamo\Plugin\Aws\Storage;

use Kuusamo\Vle\Service\Storage\StorageException;
use Kuusamo\Vle\Service\Storage\StorageInterface;
use Kuusamo\Vle\Service\Storage\StorageObject;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class S3Storage implements StorageInterface
{
    /**
     * @var Aws\S3\S3Client
     */
    private $client;

    /**
     * @var string
     */
    private $bucketName;

    /**
     * Create an S3-based storage provider.
     *
     * @param S3Client $client     AWS S3 SDK client.
     * @param string   $bucketName Bucket name.
     */
    public function __construct(S3Client $client, string $bucketName)
    {
        $this->client = $client;
        $this->bucketName = $bucketName;
    }

    /**
     * GET command.
     *
     * @param string $key Filename.
     * @return StorageObject
     */
    public function get($key): StorageObject
    {
        try {
            $response = $this->client->getObject([
                'Bucket' => $this->bucketName,
                'Key'    => $key,
            ]);
        } catch (S3Exception $exception) {
            throw new StorageException(sprintf('%s does not exist', $key));
        }

        var_dump($response);

        return new StorageObject($response['Body'], $response['ContentType']);
    }

    /**
     * PUT command.
     *
     * @param string $key         Filename.
     * @param mixed  $body        Body.
     * @param string $contentType Media type.
     * @return boolean Success.
     */
    public function put(string $key, $body, string $contentType): bool
    {
        $this->client->putObject([
            'Bucket' => $this->bucketName,
            'Key'    => $key,
            'Body'   => $body,
            'ContentType' => $contentType
        ]);

        return true;
    }

    /**
     * DELETE command.
     *
     * @param string $key Filename.
     * @return boolean Success.
     */
    public function delete(string $key): bool
    {
        return $this->client->deleteObject([
            'Bucket' => $this->bucketName,
            'Key'    => $key,
        ]);

        return true;
    }
}
