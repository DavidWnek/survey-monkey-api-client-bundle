<?php

namespace davidwnek\SurveyMonkeyApiClientBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Routing\Router;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class SurveyMonkeyApiClientExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('davidwnek.parameters.client_id', $config['client_id']);
        $container->setParameter('davidwnek.parameters.client_secret', $config['client_secret']);
        $container->setParameter('davidwnek.parameters.scope', $config['scope'] ? $config['scope'] : []);
        //TODO: Add auto generated redirect_url using symfony router and generating the route from the controller
        $container->setParameter('davidwnek.parameters.redirect_url', $config['redirect_url']);
        $container->setParameter('davidwnek.parameters.authentication_success_redirect_route_name', $config['authentication_success_redirect_route_name']);
        $container->setParameter('davidwnek.parameters.authentication_failed_redirect_route_name', $config['authentication_failed_redirect_route_name']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
