<?php
/**
 * Класс для скачивания страниц
 */
declare(strict_types=1);

namespace app\classes;


use app\interfaces\Loader;

class CurlLoader implements Loader
{
    private $url;
    private $defaultOptions = [
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true
    ];
    
    public function __construct(string $url)
    {
        $this->url = $url;
    }
    
    /**
     * Скачивание страницы при помощи Curl
     * @param array $customOptions
     * @return string
     * @throws \Exception
     */
    public function download(array $customOptions = []): string
    {
        $ch = curl_init($this->url);
        $options = $this->defaultOptions;
        if ($customOptions !== []) {
            $options = $customOptions + $options;
        }
        $this->addOptions($ch, $options);
        $data = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch));
        }
        curl_close($ch);
        return $data;
    }
    
    /**
     * Добавление опций в курл
     * @param $handle
     * @param array $headers
     * @return void
     */
    private function addOptions($handle, array $headers): void
    {
        foreach ($headers as $option => $value) {
            curl_setopt($handle, $option, $value);
        }
    }
}