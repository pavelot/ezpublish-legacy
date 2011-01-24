<?php
/**
 * File containing rest router
 *
 * @copyright Copyright (C) 1999-2010 eZ Systems AS. All rights reserved.
 * @license http://ez.no/licenses/gnu_gpl GNU GPLv2
 *
 */
class ezpRestRouter extends ezcMvcRouter
{
    public function createRoutes()
    {
        $providerRoutes = ezpRestProvider::getProvider( ezpRestPrefixFilterInterface::getApiProviderName() )->getRoutes();

        $routes = array(
            new ezpMvcRailsRoute( '/fatal', 'ezpRestErrorController', 'show' ),
            new ezpMvcRailsRoute( '/http-basic-auth', 'ezpRestAuthController', 'basicAuth' ),
            new ezpMvcRailsRoute( '/login/oauth', 'ezpRestAuthController', 'oauthRequired' ),
            new ezpMvcRailsRoute( '/oauth/token', 'ezpRestOauthTokenController', 'handleRequest'),

            // ezpRestVersionedRoute( $route, $version )
            // $version == 1 should be the same as if the only the $route had been present
            new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/foo', 'myController', 'myActionOne' ), 1 ),
            new ezpRestVersionedRoute( new ezpMvcRailsRoute( '/foo', 'myController', 'myActionOneBetter' ), 2 ),

        );

        return ezcMvcRouter::prefix( '/api', array_merge( $providerRoutes, $routes ) );
    }
}
?>
