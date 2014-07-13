<?php

/**
 *
 * @author amr@nefya.com
 *
 */
class ImageSelect extends CWidget{
	private $id;
	public $text = ' Subir Foto';
	private $assetsDir;
	public $path;
	public $alt = '';
	public $uploadUrl;
	public $htmlOptions=array();
	//$('#div_image_select_".$this->id." img').attr('src', responseText + '?' + new Date().getTime());
	public function init(){
		$this->id = uniqid();
		$dir = dirname(__FILE__) . '/assets';
		$this->assetsDir = Yii::app()->assetManager->publish($dir);
		$this->register();
		Yii::app()->clientScript->registerScript('script_'.$this->id,
			"$('#div_image_select_".$this->id." form').hide();
			$('#div_image_select_".$this->id." a').file().choose(function(e, input) {
				$('#image-select-loading-".$this->id."').show();
				$('#btnEnviar').prop('disabled', true);	
				$('#btnEnviar').html('Espere...');	
				input.appendTo('#div_image_select_".$this->id." form');
				$('#div_image_select_".$this->id." form').ajaxSubmit({
					success : function(responseText){
						$('#div_image_select_".$this->id." img').attr('src', responseText);
						$('#btnEnviar').prop('disabled', false);	
						$('#btnEnviar').html('Subir');	
					}
				});
			});
            $('#div_image_select_".$this->id." img').load(function() {
			    $('#image-select-loading-".$this->id."').hide();
			});"
			,CClientScript::POS_READY);
	}

	public function run(){
		echo '<div class="span2" style="text-align: center; position: relative;">';
		echo '<div class="image-select-loading" id="image-select-loading-'.$this->id.'" style="display: none;">text</div>';
		echo '<div id="div_image_select_'.$this->id.'" style="display: inline-block; margin-left: auto; margin-right: auto; position: relative; direction: ltr;">';
			echo CHtml::image($this->path, $this->alt, $this->htmlOptions);

		echo '<a id="btn_change_image" class="image-select-edit" style="background-color: transparent; position: absolute; left: 5px; bottom: -20px;">'.$this->text.'</a>';
		echo '<form id="frm_img_selecta" action="'.$this->uploadUrl.'" method="POST" enctype="multipart/form-data"></form>';
		echo '</div>';
		echo '</div>';
	}

	public function register($rtl=false){
		$this->registerCss($rtl);
		$this->registerScripts($rtl);
	}

	public function registerCss($rtl=false){
		Yii::app()->clientScript->registerCssFile($this->assetsDir.'/css/hidden-file-input.css');
		Yii::app()->clientScript->registerCssFile($this->assetsDir.'/css/image-select.css');
	}

	public function registerScripts($rtl){
		Yii::app()->clientScript->registerScriptFile($this->assetsDir.'/js/jquery.form.js',CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($this->assetsDir.'/js/jquery-custom-file-input.js',CClientScript::POS_HEAD);
	}
}
