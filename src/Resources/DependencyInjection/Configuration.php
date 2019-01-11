<?php

namespace Http\Client\Curl\Symfony\Resources\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('http_client');
        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('http_client');
        }

        $rootNode
            ->children()
                ->scalarNode('adapter')->defaultValue('slim')->end()
                ->booleanNode('public')->defaultTrue()->end()
            ->end();

        return $treeBuilder;
    }
}
