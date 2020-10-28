<?php
/**
 * mm_ddMaxLength
 * @version 1.2.1 (2016-12-06)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/mm_ddmaxlength
 * 
 * @copyright 2012–2016 DD Group {@link https://DivanDesign.biz }
 */

function mm_ddMaxLength($params){
	//For backward compatibility
	if (
		!is_array($params) &&
		!is_object($params)
	){
		//Convert ordered list of params to named
		$params = \ddTools::orderedParamsToNamed([
			'paramsList' => func_get_args(),
			'compliance' => [
				'fields',
				'roles',
				'templates',
				'length'
			]
		]);
	}
	
	//Defaults
	$params = (object) array_merge(
		[
			'fields' => '',
			'length' => 150,
			'allowTypingOverLimit' => true,
			'roles' => '',
			'templates' => ''
		],
		(array) $params
	);
	
	if (
		!useThisRule(
			$params->roles,
			$params->templates
		)
	){
		return;
	}
	
	global $modx;
	$e = &$modx->Event;
	
	$output = '';
	
	if ($e->name == 'OnDocFormPrerender'){
		$widgetDir =
			$modx->config['site_url'] .
			'assets/plugins/managermanager/widgets/ddmaxlength/'
		;
		
		$output .= includeJsCss(
			(
				$widgetDir .
				'ddmaxlength.css'
			),
			'html'
		);
		$output .= includeJsCss(
			(
				$widgetDir .
				'jQuery.ddMM.mm_ddMaxLength.js'
			),
			'html',
			'jQuery.ddMM.mm_ddMaxLength',
			'1.0.1'
		);
		
		$e->output($output);
	}else if ($e->name == 'OnDocFormRender'){
		$params->fields = getTplMatchedFields(
			$params->fields,
			'text,textarea'
		);
		
		if ($params->fields == false){
			return;
		}
		
		$output .=
			'//---------- mm_ddMaxLength :: Begin -----' .
			PHP_EOL
		;
		
		foreach (
			$params->fields as
			$field
		){
			$output .=
'
$j.ddMM
	.fields
	.' . $field . '
	.$elem
	.addClass("ddMaxLengthField")
	.each(function(){
		$j(this)
			.parent()
			.append("<div class=\"ddMaxLengthCount\"><span></span></div>")
		;
	})
	.ddMaxLength({
		max: ' . intval($params->length) . ',
		canWriteError: ' . intval($params->allowTypingOverLimit) . ',
		containerSelector: "div.ddMaxLengthCount span",
		warningClass: "maxLengthWarning"
	})
;
'
			;
		}
		
		$output .=
			'//---------- mm_ddMaxLength :: End -----' .
			PHP_EOL
		;
		
		$e->output($output);
	}
}
?>