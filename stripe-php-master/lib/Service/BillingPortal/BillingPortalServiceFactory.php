<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\BILLingPortal;

/**
 * Service factory class for API resources in the BILLingPortal namespace.
 *
 * @property ConfigurationService $configurations
 * @property SessionService $sessions
 */
class BillingPortalServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'configurations' => ConfigurationService::class,
        'sessions' => SessionService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
