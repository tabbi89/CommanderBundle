<?php

namespace Tabbi89\CommanderBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class CommandCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('tabbi89_commander.command.default_command_bus')) {
            return;
        }

        $definition = $container->getDefinition(
            'tabbi89_commander.command.default_command_bus'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'tabbi89_command_handler'
        );

        foreach ($taggedServices as $id => $tagAttributes) {
            foreach ($tagAttributes as $attributes) {
                $definition->addMethodCall(
                    'addHandler',
                    array(new Reference($id), $attributes["alias"])
                );
            }
        }
    }
}
