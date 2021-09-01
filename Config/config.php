<?php

define("URL","http://localhost:91/Apis");
define("Version",uniqid(rand(),true));
function asset(string $path):string{
return URL . "/app/assets/{$path}?v=" . Version . md5(Version);
}