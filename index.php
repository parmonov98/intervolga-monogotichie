<?php


// В переменной $a лежит текст новости. В переменной $link лежит ссылка на страницу с полным текстом этой новости.
// Нужно в переменную $b записать сокращенный текст новости по правилам:
// - обрезать до 180 символов
// - приписать многоточие
// - последние 2 слова и многоточие сделать ссылкой на полный текст новости.
// Какие проблемы вы видите в решении этой задачи? Что может пойти не так?
// Результат: ссылка на репозиторий с кодом и ваши комментарии.

$a = "text ";
$link = "https://blog.ru/post/test-post";
$limitLength = 10;

function getPostDescription($text, $url)
{
  $length = strlen($text);
  global $limitLength;
  if ($length > $limitLength) {
    
    $text = substr($text, 0, $limitLength);    
    $words = explode(" ", $text);
// print_r($words);die;
    $last_word1 = array_pop($words);
    $last_word2 = array_pop($words);
    
    $aTag = '<a href="' . $url . '">' . $last_word2 . " " . $last_word1 . '...</a>';

    $text = implode(" ", $words);
    return $text .= $aTag;

  }
  
  if ($length < $limitLength) {
    
    $words = explode(" ", $text);
    if (count($words) >= 2) {
      $last_word1 = array_pop($words);
      $last_word2 = array_pop($words);      
      $aTag = '<a href="' . $url . '">' . $last_word2 . " " . $last_word1 . '...</a>';
    }else{
      $last_word1 = $text;
      $aTag = '<a href="' . $url . '">' . $last_word1 . '...</a>';
    }
    

    $text = implode(" ", $words);
    return $text .= $aTag;

  }


  
}

echo getPostDescription($a, $link);