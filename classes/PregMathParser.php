<?php

namespace app\classes;

use app\abstractClasses\abstractParser;

class PregMathParser extends abstractParser
{
    /** Шаблон регулярного выражения **/
    private $regEx = '/<([^\/>\s\.-]+)[^>;]*/imsu';
    
    /**
     * Метод для обработки скаченной страницы
     * @param string $content
     * @return string
     */
    protected function parse(string $content): string
    {
        preg_match_all($this->regEx,
            $content,
            $out);
        $parseList = array_count_values($out[1]);
        arsort($parseList);
        $parseString = $this->prepareHtmlResult($parseList);
        return $parseString;
    }
    
    /**
     * Проверка контента перед обработкой
     * @param string $content
     * @return bool
     */
    protected function checkBeforeParse(string $content): bool
    {
        return true;
    }
    
    /**
     * Проверка результата после обработки
     * @param string $content
     * @return bool
     */
    protected function checkResult(string $content): bool
    {
        return true;
    }
    
    /**
     * Подготовить HTML результат
     * @param array $parseList
     * @return string
     */
    private function prepareHtmlResult(array $parseList): string
    {
        $parseString = '';
        foreach ($parseList as $tag => $count) {
            $parseString .= "<b>$tag</b>: $count<br>";
        }
        return $parseString;
    }
}