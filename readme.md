AWS plugin
==========

Thi plugin integrates Amazon Web Services (AWS) with Kuusamo.

Installation
------------

Install into your project using Composer.

    composer require kuusamo/plugin-aws

Usage
-----

Install it in `index.php` of your project.

    $s3 = Kuusamo\Plugin\Aws\Storage\S3StorageFactory::create(
        'aws-key',
        'aws-secret',
        'region',
        'bucket-name'
    );

    Kuusamo\Vle\Service\Storage\StorageFactory::setProvider($s3);

Development
-----------

Run the tests

    ant
