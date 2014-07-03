<?php
class diskCache {
    var $cachefile;
    var $cachetime;
       
    function diskCache($cacheName){
        $this->cachefile = './cache/'.$cacheName;
        $this->cachetime = 1 * 60 * 60; // 1 hour
    }
    function get(){
        $cacheExists = false;
        if (file_exists($this->cachefile) && (time() - $this->cachetime < filemtime($this->cachefile))) {
            include($this->cachefile);
            $cacheExists = true;
        }
        if(!$cacheExists) ob_start(); // start the output buffer
        return $cacheExists;
    }
    function set(){
        $fp = fopen($this->cachefile, 'w'); // open the cache file for writing
        fwrite($fp, ob_get_contents()); // save the contents of output buffer to the file
        fclose($fp); // close the file
        ob_end_flush(); // Send the output to the browser
    }
    function clear(){
        unlink($this->cachefile);
    }
}
?>
