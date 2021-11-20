AWS plugin
==========

[![Latest Stable Version](https://poser.pugx.org/kuusamo/plugin-aws/v)](//packagist.org/packages/kuusamo/plugin-aws)
[![Total Downloads](https://poser.pugx.org/kuusamo/plugin-aws/downloads)](//packagist.org/packages/kuusamo/plugin-aws)
[![License](https://poser.pugx.org/kuusamo/plugin-aws/license)](//packagist.org/packages/kuusamo/plugin-aws)
[![Build Status](https://app.travis-ci.com/kuusamo/plugin-aws.svg?branch=master&status=passed)](https://app.travis-ci.com/github/kuusamo/plugin-aws)

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
