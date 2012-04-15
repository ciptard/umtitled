<?php

    // Settings
    $cachedir = 'cache/caches/'; // Directory to cache files in (keep outside web root)
    $cachetime = $GLOBALS['cache_lifespan']; // Seconds to cache files for
    $cacheext = 'html'; // Extension to give cached files (usually cache, htm, txt)

    // Ignore List
    $ignore_list = array(
        // 'addedbytes.com/rss.php',
        // 'addedbytes.com/search/'
    );

    // Script
    $page = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Requested page
    $cachefile = $cachedir . 'scraped.' . $cacheext; // Cache file to either load or create

    $ignore_page = false;
    for ($i = 0; $i < count($ignore_list); $i++) {
        $ignore_page = (strpos($page, $ignore_list[$i]) !== false) ? true : $ignore_page;
    }

    $cachefile_created = ((@file_exists($cachefile)) and ($ignore_page === false)) ? @filemtime($cachefile) : 0;
    @clearstatcache();

    // Show file from cache if still valid
    if (time() - $cachetime < $cachefile_created) {

        //ob_start('ob_gzhandler');
        @readfile($cachefile);
        //ob_end_flush();
        exit();

    }

    // If we're still here, we need to generate a cache file

    ob_start();

?>