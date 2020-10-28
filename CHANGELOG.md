# (MODX)EvolutionCMS.plugins.ManagerManager.mm_ddMaxLength changelog


## Version 1.1.1 (2013-12-10)
* \* The calls of the functions `includeJs` and `includeCss` were replaced by `includeJsCss`.
* \* The including of required JS and CSS files is currently being realized while occuring the event `OnDocFormPrerender`. The files are included as HTML.
* \* The JS code became a stand-alone file and was partially revised. It is convenient because of php code cleanness and it shortens the amount of code of a document edit frame.
* \- The `jQuery.ddTools` library is no longer included here because it is in `ManagerManager`.


## Version 1.1 (2013-10-02)
* \* Attention! (MODX)EvolutionCMS.plugins.ManagerManager >= 0.6 is required.
* \+ The widget now can also be applied to document fields.
* \* Parameters → `fields`: Was renamed from `tvs`.
* \* The file `jquery.ddmaxlength-1.0.min.js` has been deleted because the ManagerManager plugin already contains the `jQuery.ddTools` library including the `jQuery.fn.ddMaxLength` plugin.
* \* Misprints in classnames have been corrected.


## Version 1.0.1 (2012-01-13)
* \* Added checking of the `OnDocFormRender` event.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>