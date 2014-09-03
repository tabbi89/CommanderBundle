<?php

namespace Tabbi89\CommanderBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Tabbi89\CommanderBundle\DependencyInjection\Compiler\CommandCompilerPass;

class Tabbi89CommanderBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CommandCompilerPass());
    }
}
