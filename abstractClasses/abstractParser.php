<?php

namespace app\abstractClasses;

abstract class abstractParser
{
    private $content;
    private $saveResult;
    public $resultDir = __DIR__ . '\..\parsedFiles\\';
    
    public function __construct(string $content, bool $saveResult = false)
    {
        $this->content = $content;
        $this->saveResult = $saveResult;
    }
    
    /**
     * Метод запуска обработки
     * @return string
     */
    public function run()
    {
        $this->checkBeforeParse($this->content);
        $parseResult = $this->parse($this->content);
        $this->checkResult($this->content);
        if ($this->saveResult === true) {
            $this->saveFile($this->resultDir, $parseResult);
        }
        return $parseResult;
    }
    
    /**
     * Сохранение результата в файл
     * @param string $path
     * @param string $content
     * @return int|null
     */
    public function saveFile(string $path, string $content): ?int
    {
        $filename = md5(microtime(true));
        return file_put_contents($path . $filename, $content);
    }
    
    /**
     * Метод для обработки
     * @param string $content
     * @return string
     */
    abstract protected function parse(string $content): string;
    
    /**
     * Проверка контента перед обработкой
     * @param string $content
     * @return bool
     */
    abstract protected function checkBeforeParse(string $content): bool;
    
    /**
     * Проверка результата
     * @param string $content
     * @return bool
     */
    abstract protected function checkResult(string $content): bool;
}