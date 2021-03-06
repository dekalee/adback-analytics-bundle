<?php

namespace Dekalee\AdbackAnalyticsBundle\CacheWarmer;

use Dekalee\AdbackAnalytics\Query\ScriptUrlQuery;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;

/**
 * Class ConfigFileCacheWarmer
 */
class ConfigFileCacheWarmer implements CacheWarmerInterface
{
    protected $query;

    /**
     * @param ScriptUrlQuery $query
     */
    public function __construct(ScriptUrlQuery $query)
    {
        $this->query = $query;
    }

    /**
     * Checks whether this warmer is optional or not.
     *
     * Optional warmers can be ignored on certain conditions.
     *
     * A warmer should return true if the cache can be
     * generated incrementally and on-demand.
     *
     * @return bool true if the warmer is optional, false otherwise
     */
    public function isOptional()
    {
        return false;
    }

    /**
     * Warms up the cache.
     *
     * @param string $cacheDir The cache directory
     */
    public function warmUp($cacheDir)
    {
        $this->query->execute();
    }
}
