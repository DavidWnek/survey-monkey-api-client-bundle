<?php

namespace davidwnek\SurveyMonkeyApiClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('survey_monkey_api_client');

        $rootNode
            ->children()
                ->scalarNode('client_id')->end()
                ->scalarNode('client_secret')->end()
                ->scalarNode('redirect_url')->end()
                ->scalarNode('authentication_success_redirect_route_name')->defaultNull()->end()
                ->scalarNode('authentication_failed_redirect_route_name')->defaultNull()->end()
                ->arrayNode('scope')->treatNullLike(array())->prototype('scalar')->end()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
