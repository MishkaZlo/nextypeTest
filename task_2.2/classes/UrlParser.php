<?php


class UrlParser
{
    const REGULAREXP = '/href="[^\"]{1,555}/';
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getContent()
    {
        return file_get_contents($this->url);
    }

    public function getAllLinks()
    {
        $content = $this->getContent();
        $explodingArray = $this->getStringWithATags($content);
        return $this->clearArray($explodingArray);
    }

    private function getStringWithATags($content)
    {
        $ArrayWithATags = explode('<a', $content);
        array_shift($ArrayWithATags);
        return $ArrayWithATags;
    }

    private function clearArray($explodingArray)
    {
        $matches = [];
        $links = [];

        /* ловим в строках тега <a> всe, начиная с атрибута 'href' до закрытой кавычки.
Длина ссылки ограничена 555 символами (опционально, с запасом) */
        foreach ($explodingArray as $str) {
            if (preg_match(self::REGULAREXP, $str, $matches)) {
                $links [] = $matches[0];
            }
        }

        /* собираем массив с очищенным атрибутом 'href' */
        $strToDelete = 'href="';
        foreach ($links as $link) {
            $resultArray[] = (str_replace($strToDelete, '', $link));
        }
        return $resultArray;
    }

}