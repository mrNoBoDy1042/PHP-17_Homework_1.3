<?php
// Массив исходных данных
$world_animals = array(
  'Africa' => array('Poelagus marjorita', 'Otocyon megalotis'),
  'Eurasia' => array('Neofelis nebulosa', 'Cuon alpinus'),
  'North America' => array('Neovison vison', 'Dasypus'),
  'Australia' => array('Macropus', 'Phascolarctos cinereus', 'Sarcophilus harrisii'),
);

// Массив для названий, состоящих из двух слов
$two_words = array();
// Вспомогательный массив для перемешивания названий
$parsed_names = array();
$parsed_second_names = array();

// Проходим по массиву исходных данных и находим нужные названия
// состоящие из двух слов
foreach ($world_animals as $country => $animals)
{
  foreach ($animals as $animal)
  {
    if (strpos($animal, ' '))
    {
      // Добавляем в массив подходящее название
      $two_words[] = $animal;
      // Разбиваем название на две строки и сохраняем в нужных массивах
      list($parsed_names[], $parsed_second_names[]) = explode(" ", $animal);
    }
  }
}

// Случайно перемешиваем массивы названий
shuffle($parsed_names);
shuffle($parsed_second_names);

// Создаем новый массив для хранения выдуманных названий
$imagined_animals = array();

echo "<pre>";
// Генерируем новые названия и сортируем по регионам
for ($i=0; $i < count($parsed_names); $i++)
{
  // Создаем новое название
  $new_name = "$parsed_names[$i] $parsed_second_names[$i]";
  // Находим назваение региона
  foreach ($world_animals as $country => $animals)
  {
    foreach ($animals as $animal)
    {
      if (strpos($animal, $parsed_names[$i]) === 0)
      {
        // Сохраняем в массиве по ключу региона
        $imagined_animals[$country][] = $new_name;
        break 2;
      }
    }
  }
}

// Выводим полученных животных по регионам животных
foreach ($imagined_animals as $country => $animals) {
  echo "<h2>$country</h2>";
  foreach ($animals as $key => $animal) {
    echo $animal;
    // Вывод запятых и точки в конце
    $end_line = ($key != count($animals)-1)? ", <br>" : ".";
    echo "$end_line";
  }
}
?>
