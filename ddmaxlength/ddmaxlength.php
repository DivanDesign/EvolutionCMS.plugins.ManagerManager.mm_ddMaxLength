<?php
/**
 * mm_ddMaxLength
 * @version 1.0.1 (2012-01-13)
 *
 * Widget for ManagerManager plugin allowing number limitation of chars inputing in TV.
 * 
 * @param $fields {comma separated string} - TV names to which the widget is applied. @required
 * @param $roles {comma separated string} - The roles that the widget is applied to (when this parameter is empty then widget is applied to the all roles). Default: ''.
 * @param $templates {comma separated string} - Id of the templates to which this widget is applied. Default: ''.
 * @param $length {integer} - Maximum number of inputing chars. Default: 150.
 * 
 * @link http://code.divandesign.biz/modx/mm_ddmaxlength/1.0.1
 *
 * @copyright 2012, DivanDesign
 * http://www.DivanDesign.biz
 */

function mm_ddMaxLength($fields = '', $roles = '', $templates = '', $length = 150){
	global $modx, $mm_current_page;
	$e = &$modx->Event;

	if ($e->name == 'OnDocFormRender' && useThisRule($roles, $templates)){
		$output = '';
		
		$fields = tplUseTvs($mm_current_page['template'], $fields, 'text,textarea');
		if ($fields == false){return;}

		$site = $modx->config['site_url'];

		$output .= "// ---------------- mm_ddMaxLength :: Begin ------------- \n";
		//General functions
		$output .= includeJs($site.'assets/plugins/managermanager/widgets/ddmaxlength/jquery.ddmaxlength-1.0.min.js');
		$output .= includeCss($site.'assets/plugins/managermanager/widgets/ddmaxlength/ddmaxlength.css');

		foreach ($fields as $tv){
			$output .= '
$j("#tv'.$tv['id'].'").addClass("ddMaxLengthField").each(function(){
	$j(this).parent().append("<div class=\"ddMaxLengthCount\"><span></span></div>");
}).ddMaxLength({
	max: '.$length.',
	containerSelector: "div.ddMaxLengthCount span",
	warningClass: "maxLenghtWarning"
});
			';
		}

		$output .= '
$j("#mutate").submit(function(){
	var ddErrors = new Array();
	$j("div.ddMaxLengthCount span").each(function(){
		var $this = $j(this), field = $this.parents(".ddMaxLengthCount:first").parent().find(".ddMaxLengthField");
		if (parseInt($this.text()) < 0){
			field.addClass("maxLenghtErrorField").focus(function(){
				field.removeClass("maxLenghtErrorField");
			});
			ddErrors.push(field.parents("tr").find("td:first-child .warning").text());
		}
	});

	if(ddErrors.length > 0){
		alert("Некорректно заполнены поля: " + ddErrors.join(","));
		
		return false;
	} else {
		return true;
	}
});
		';

		$output .= "\n// ---------------- mm_ddMaxLength :: End -------------";

		$e->output($output . "\n");
	}
}
?>