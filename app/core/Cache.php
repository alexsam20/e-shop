<?php

namespace shop;

class Cache
{
    use TSingleton;

    public function setCache($key, $data, $seconds = 3600): bool
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;

        return (bool)file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content));
    }

    public function getCache($key): mixed
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function deleteCache($key): void
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }
}