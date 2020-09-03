<?php


class UrlParser
{


    public function getContent($url)
    {
        return file_get_contents($url);

    }

    public function getAllLinks($url)
    {
        $content = $this->getContent($url);
        $explodingArray = $this->getStringWithATags($content);
        $resultArray = $this->clearArray($explodingArray);

        return $resultArray;

    }

    private function getStringWithATags($content)
    {
        return explode('<a', $content);
    }

    private function clearArray($explodingArray)
    {

        /* ловим в строках тега <a> все начиная с атрибута 'href' до закрытой кавычки.
Длина ссылки ограничена 555 символами (опционально, с запасом) */

        $regExp = '/href="[^\"]{1,555}/';
        $matches = [];
        $links = [];

        foreach ($explodingArray as $str) {
            if (preg_match($regExp, $str, $matches)) {
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