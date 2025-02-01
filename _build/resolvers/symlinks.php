<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/modDashaMail/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/moddashamail')) {
            $cache->deleteTree(
                $dev . 'assets/components/moddashamail/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/moddashamail/', $dev . 'assets/components/moddashamail');
        }
        if (!is_link($dev . 'core/components/moddashamail')) {
            $cache->deleteTree(
                $dev . 'core/components/moddashamail/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/moddashamail/', $dev . 'core/components/moddashamail');
        }
    }
}

return true;