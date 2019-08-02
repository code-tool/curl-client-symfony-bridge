<?php
declare(strict_types=1);

namespace Http\Client\Curl\Symfony\Resources\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class CurlClientExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../config')
        );
        $loader->load('services.yml');
        foreach ([
                     'http.request.factory',
                     'http.response.factory',
                     'http.server.factory',
                     'http.stream.factory',
                     'http.file.factory',
                     'http.uri.factory',
                 ] as $definition) {
            $adapter = $config['adapter'];
            $id = sprintf('%s.%s', $definition, $adapter);
            if (false === $container->has($id)) {
                throw new \LogicException(
                    sprintf('No definition %s for adapter %s, looking for %s', $definition, $adapter, $id)
                );
            }
            $container->setAlias($definition, new Alias($id, $config['public']));
        }
    }
}
