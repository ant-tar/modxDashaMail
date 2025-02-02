<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/DashaMail/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/dashamail')) {
            $cache->deleteTree(
                $dev . 'assets/components/dashamail/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/dashamail/', $dev . 'assets/components/dashamail');
        }
        if (!is_link($dev . 'core/components/dashamail')) {
            $cache->deleteTree(
                $dev . 'core/components/dashamail/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/dashamail/', $dev . 'core/components/dashamail');
        }
    }
}

return true;