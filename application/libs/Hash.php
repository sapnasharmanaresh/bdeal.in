<?php

class Hash {

    function __construct() {}
    
    /**
     * 
     * @param string $algo  the algorithm(md5, sha1, whirlpool etc) 
     * @param string $salt the salt value must remian constant throughout the system
     * @param string $data the data to encode
     * @return string
     */
    public static function create($algo,$data,$salt){
       $context = hash_init($algo, HASH_HMAC, $salt);
        hash_update($context, $data);
        
        return hash_final($context);
    }

}

