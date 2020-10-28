# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMaxLength changelog


## Версия 1.1.1 (2013-12-10)
* \* Вызовы функций `includeJs` и `includeCss` заменены на вызовы `includeJsCss`.
* \* Подключение необходимых JS и CSS вынесено в отдельное событие `OnDocFormPrerender`, файлы сейчас подключаются в обычном HTML-виде, а не через JS.
* \* JS-код вынесен в отдельный файл и частично переработан. Мало того, что это просто удобно (ничего лишнего в PHP), это ещё и сокращает объём исходного кода формы редактирования документа, исключая дубликаты при множественных вызовах.
* \- Убрано подключение библиотеки `jQuery.ddTools`, т.к. она подключается в самом `ManagerManager`.


## Версия 1.1 (2013-10-02)
* \* Внимание! Требуется (MODX)EvolutionCMS.plugins.ManagerManager >= 0.6.
* \+ Виджет теперь может применяться не только к TV, но и к полям документа.
* \* Параметры → `fields`: Переименован из `tvs`.
* \* Файл `jquery.ddmaxlength-1.0.min.js` удалён, т.к. последния версия плагина `jQuery.fn.ddMaxLength` включена в плагин `jQuery.ddTools`, файл которого есть по умолчанию в `ManagerManager`.
* \* справлены ошибки в именах классов.


## Версия 1.0.1 (2012-01-13)
* \* Добавлена проверка события `OnDocFormRender`.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>