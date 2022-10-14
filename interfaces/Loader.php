<?php

namespace app\interfaces;

interface Loader
{
    /**
     * Скачивание страницы
     * @return string
     */
    public function download() : string;
}