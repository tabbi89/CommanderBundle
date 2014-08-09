Getting Started With CommanderBundle
====================================

It is based on Jeffrey Way Commander.

## Installation

Installation is a quick just 4 step process:

1. Download Tabbi89CommanderBundle using composer
2. Enable the Bundle
3. Create your commands
4. Create your events

### Step 1: Download CommanderBundle using composer

Add CommanderBundle by running the command:

``` bash
$ php composer.phar require tabbi89/commander-bundle '1.*'
```

Composer will install the bundle to your project's `vendor/tabbi89` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Tabbi89\CommanderBundle\Tabbi89CommanderBundle(),
    );
}
```