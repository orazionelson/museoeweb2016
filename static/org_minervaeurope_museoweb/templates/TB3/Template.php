<?php 
/* SVN FILE: $Id$ */

/**
 * Custom Template Class for T2 template
 *
 * @copyright Copyright(c) 2005-2009 Ministero per i beni e le attività culturali. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * Museo & Web CMS is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 *
 * @author		Daniele Ugoletti <daniele@ugoletti.com>, Gruppo Meta <http://www.gruppometa.it>
 * @version		$Id: CustomTemplate.php,$
 * @package		Museo&Web CMS
 * @category	Class
 */

require_once('class_color.inc.php');

class Template extends org_minervaeurope_museoweb_CustomTemplate
{
	function processBoxes()
	{
		$box = array(	'boxLogin' 		=> 'boxLogin',
						'boxLogin2' 	=> 'boxUser',
						'boxTools' 		=> 'navigation2',
						'boxEvents' 	=> 'boxEvents',
						'boxNews' 		=> 'boxNews',
						'boxSearch' 	=> 'boxSearch');
		
		foreach($box as $b=>$componentName)
		{
			if ($b=='boxLogin2') $b = "boxLogin";
			$component = &$this->_owner->getComponentById($componentName);
			if (is_object($component))
			{
				if ($b=='boxLogin2' || $b=='boxLogin' && $component->getAttribute('visible')==false) continue;
				$component->setAttribute('enabled', !$this->_template[$b]=='0');
				$component->setAttribute('editableRegion', $this->_template[$b]=='1' ? 'leftSidebar':'rightSidebar');
			}
		}
	}
	
	function processImages()
	{
		$this->_content['imageLogo'] = '';
		if (intval($this->_template['imageLogo']) > 0)
		{
			$style = 'margin-left: '.intval($this->_template['logoLeftMargin']).'px; margin-top: '.intval($this->_template['logoTopMargin']).'px;';
			$this->_content['imageLogoUrl'] = org_glizy_helpers_Media::getUrlById($this->_template['imageLogo'], true );
			$this->_content['imageLogo'] = org_glizy_helpers_Media::getImageById($this->_template['imageLogo'], false, '', $style);
		}
		else
		{
			$this->_content['imageLogoUrl'] = 'static/org_minervaeurope_museoweb/templates/TB3/assets/images/logoMibac.gif';
			$this->_content['imageLogo'] = '<img src="static/org_minervaeurope_museoweb/templates/TB3/assets/images/logoMibac.gif" alt="Ministero per i Beni e le Attivit&agrave; Culturali" title="Ministero per i Beni e le Attivit&agrave; Culturali" style="margin-top: 25px; margin-left: 40px;"/>';
		}

		$this->logoUrl = $this->_content['imageLogoUrl'];
		
		if (!empty($this->_template['linkLogo']))
		{
			$this->_content['imageLogo'] = org_glizy_helpers_Link::formatLink($this->_template['linkLogo'], $this->_template['linkLogo'], $this->_content['imageLogo']);
		}
			
		$this->_content['imageHeader'] = '';
		if (intval($this->_template['imageHeader']) > 0)
		{
			$this->_content['imageHeader'] = org_glizy_helpers_Media::getUrlById($this->_template['imageHeader']);
		}
	}
	
	
	function processColors()
	{
		if (!isset($this->_template['color1'])) return;
		if($this->_owner->cssCacheFileName===false)
		{
			if (empty($this->_template['color21'])) $this->_template['color21'] = '#FFFFFF';
			
			$colors = array();
			$colors[] = array('color5', 0.5, 'color23');
			$colors[] = array('color5', 0.3, 'color24');
			$colors[] = array('color12', 0.5, 'color25');
			
			foreach($colors as $c)
			{
				$color = new color();
				$color->set_from_rgbhex($this->_template[$c[0]]);
				$color->whiteOpacity($c[1]);
				$this->_template[$c[2]] = '#'.$color->get_rgbhex();
			}
			
			$css = file_get_contents(dirname(__FILE__).'/assets/css/styles.part');
			for ($i=1 ;$i<25;$i++)
			{
				$css = str_replace('##COLOR_'.$i.'##', $this->_template['color'.$i], $css);
			}
			
			// crea le immagini necessaria
			$img = imagecreatetruecolor(6, 6);
			$c1 = imagecolorallocate($img, 255, 255, 255);
			$c2RGB = $this->hex_to_rgb($this->_template['color5']);
			$c2 = imagecolorallocate($img, $c2RGB['red'], $c2RGB['green'], $c2RGB['blue']);
			$c3RGB = $this->hex_to_rgb($this->_template['color6']);
			$c3 = imagecolorallocate($img, $c3RGB['red'], $c3RGB['green'], $c3RGB['blue']);
			$c4RGB = $this->hex_to_rgb($this->_template['color2']);
			$c4 = imagecolorallocate($img, $c4RGB['red'], $c4RGB['green'], $c4RGB['blue']);			
			$fileNameImg1 = $this->_owner->cacheObj->getFileName().'img1.gif';
			imagefilledrectangle ($img, 0, 0, 5, 5, $c1);
			imagerectangle ($img, 0, 0, 5, 5, $c2);
			imagefilledrectangle ($img, 1, 1, 4, 4, $c3);
			ImageGIF($img, $fileNameImg1);
			imagedestroy($img);
			$css = str_replace('##IMG_1##', $fileNameImg1, $css);
			
			// crea le immagini necessaria
			$img = imagecreatetruecolor(5, 9);
			$c1 = imagecolorallocate($img, 255, 255, 255);
			$c2RGB = $this->hex_to_rgb($this->_template['color5']);
			$c2 = imagecolorallocate($img, $c2RGB['red'], $c2RGB['green'], $c2RGB['blue']);
			$c4RGB = $this->hex_to_rgb($this->_template['color2']);
			$c4 = imagecolorallocate($img, $c4RGB['red'], $c4RGB['green'], $c4RGB['blue']);		
			$fileName = $this->_owner->cacheObj->getFileName().'img2.gif';
			imagefilledrectangle ($img, 0, 0, 4, 8, $c1);
			imagefilledpolygon($img, array(0,0, 4,4, 0,8), 3, $c2);
			imagecolortransparent($img, $c1);
			ImageGIF($img, $fileName);
			$css = str_replace('##IMG_2##', $fileName, $css);
			
			$fileName = $this->_owner->cacheObj->getFileName().'img3.gif';
			imagefilledpolygon($img, array(0,0, 4,4, 0,8), 3, $c4);
			ImageGIF($img, $fileName);
			$css = str_replace('##IMG_3##', $fileName, $css);
			
			$fileName = $this->_owner->cacheObj->getFileName().'img4.gif';
			imagefilledrectangle ($img, 0, 0, 4, 8, $c1);
			imagefilledpolygon($img, array(4,0, 0,4, 4,8), 3, $c4);
			ImageGIF($img, $fileName);
			$css = str_replace('##IMG_4##', $fileName, $css);
			
			imagedestroy($img);
			
			
			
			$css = str_replace('##CUSTOM##', $this->_template['customCSS'], $css);
			$css = str_replace('##HEADER_ALIGN##', isset($this->_template['imageAlign']) && $this->_template['imageAlign']=='left'  ? '230px' : 'right', $css);
			$css = str_replace('##HEADER_IMAGE##', $this->_content['imageHeader']!='' ? 'url(../'.$this->_content['imageHeader'].')' : '', $css);
			
			$headerHeight = !empty($this->_template['headerHeight']) ? intval($this->_template['headerHeight']) : 119;
			$css = str_replace('##HEIGHT_HEADER##', $headerHeight.'px', $css);
			$css = str_replace('##HEIGHT_LOGO##', ($headerHeight+2).'px', $css);
		
			$this->_owner->cacheObj->save($css, NULL, 'templateCss');
			$this->_owner->cssCacheFileName = $this->_owner->cacheObj->getFileName();
		}
		
		$this->_content['css'] = '<link rel="stylesheet" href="'.$this->_owner->cssCacheFileName.'" type="text/css" media="screen" />';
	}
	
	function render()
	{
		if ($this->_template['templateType']=='3')
		{
			$pageObj = &$this->_owner->getRootComponent();
			$templateName = $pageObj->getAttribute('templateFileName');
			if ($templateName=='home.php')
			{
				$pageObj->setAttribute('templateFileName', 'home_3cols.php');
			}
			else
			{
				$pageObj->setAttribute('templateFileName', 'page_3cols.php');
			}
		}

		
		$this->_owner->addOutputCode($this->_content['css'], 		'head');
		$this->_owner->addOutputCode($this->_content['dc'], 		'metaTags');
		$this->_owner->addOutputCode($this->_content['hiddenNav'], 	'hiddenNav');
		$this->_owner->addOutputCode($this->_content['imageLogo'],  'logo');
		$this->_owner->addOutputCode($this->_content['imageLogoUrl'],  'logoUrl');
		$this->_owner->addOutputCode($this->_template['linkLogo'],  'linkLogo');
		$this->_owner->addOutputCode('<h1>'.$this->_template['title'].'</h1>', 'logotitle');

		$this->_owner->addOutputCode($this->_owner->_content['title'], 		'doctitle');
		$this->_owner->addOutputCode($this->_owner->_content['address'], 	'sidebarAddress');
		$this->_owner->addOutputCode($this->_owner->_content['footer'], 	'footer');
	}
	
	function processHiddenNavigation()
	{
		$output  = '<div>'.__T('MW_HIDENNAV_TEXT1').'</div>';
		$output .= '<a href="index.php?pageId=Guida" accesskey="9" title="'.__T('MW_HIDENNAV_TEXT2').'">'.__T('MW_HIDENNAV_TEXT3').'</a><div>|</div>';
		$output .= '<a href="index.php" accesskey="1" title="'.__T('MW_HIDENNAV_TEXT4').'">Home</a><div>|</div>';
		$output .= '<a href="#leftSidebar" accesskey="2" title="'.__T('MW_HIDENNAV_TEXT5').'">'.__T('MW_HIDENNAV_TEXT6').'</a><div>|</div>';
		$output .= '<a href="#leftSidebar" accesskey="3" title="'.__T('MW_HIDENNAV_TEXT7').'">'.__T('MW_HIDENNAV_TEXT8').'</a><div>|</div>';
		$output .= '<a href="#languages" accesskey="4" title="'.__T('MW_HIDENNAV_TEXT9').'">'.__T('MW_HIDENNAV_TEXT9').'</a><div>|</div>';
		$output .= '<a href="#top" accesskey="5" title="'.__T('MW_HIDENNAV_TEXT10').'">'.__T('MW_HIDENNAV_TEXT10').'</a>';
		$this->_content['hiddenNav'] = $output;
	}
	
	function hex_to_rgb($hex)
	{
		// remove '#'
		if(substr($hex,0,1) == '#')
			$hex = substr($hex,1) ;

		// expand short form ('fff') color
		if(strlen($hex) == 3)
		{
			$hex = substr($hex,0,1) . substr($hex,0,1) .
				   substr($hex,1,1) . substr($hex,1,1) .
				   substr($hex,2,1) . substr($hex,2,1) ;
		}

		if(strlen($hex) != 6)
			fatal_error('Error: Invalid color "'.$hex.'"') ;

		// convert
		$rgb['red'] = hexdec(substr($hex,0,2)) ;
		$rgb['green'] = hexdec(substr($hex,2,2)) ;
		$rgb['blue'] = hexdec(substr($hex,4,2)) ;

		return $rgb ;
	}
}
?>
