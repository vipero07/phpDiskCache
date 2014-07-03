phpDiskCache
============

A simple caching solution throw together in lieu of not having the option to install a better cache solution like APC.

The cache folder must be read / writable by php (must be able to fopen to the folder)

####Usage
######Make new diskCache
This will make a cache with the name "cacheName".
```
$cache = new diskCache('cacheName');
```

######Get cache from disk
The get returns false when the cache isn't found, or the cache has expired
```
if(!$cache->get()){
    //put the stuff you want to cache here
    //i.e.
    $str = "this is cached";
    ?>
    <div class="divider"><?=$str?></div>
    <?php
    //sets the cache to everything after the get() function
    //must be inside the if
    $cache->set();
}
```

######To clear cache call
```
$cache->clear();
```
This will only clear the file matching the cacheName set in the constructor.
