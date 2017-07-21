<?php
/*/
Plugin Name: Diritto Pratico
Plugin URI: http://wp.dirittopratico.it
Description: Individua automaticamente i riferimenti normativi contenuti negli articoli
Version: 1.0.2
Author: Claudio De Stasio
Author URI: https://plus.google.com/114864954035070574426
/*/

// Funzione per l'individuazione dell'URL della pagina corrente
function current_pageurl() {

	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

// Funzione per l'integrazione con Note di udienza
function notediudienza($text) { if (stripos($text, '||off||')) {return str_ireplace("||off||","",$text);}

	$enabled	= true;
	$target		= 'target="_blank"';
	$dp_css		= "margin: 5px;border: 1px #D9D9D9 dashed;background-color: rgba(124, 119, 98, 0.02);padding: 15px;";
	$img_css	= "position:relative;top:-30px;right:-25px;float:right;";
	$base 		= WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));


$text=str_ireplace("||note||",'
<iframe style="width:100%; height:500px; border:none;" src="http://note.dirittopratico.it" ></iframe>
<script type="text/javascript" src="'.$base.'iframeResizer.min.js"></script>
<script type="text/javascript">iFrameResize();</script>
',$text);


preg_match_all( "#\|\|(.*?)\|\|#s", $text, $matches );
	
	for($x=0; $x<count($matches[0]); $x++)
		{
		$match		= $matches[1][$x];
		$dp_bef		= '<div style="'.$dp_css.'"><p>';
		$dp_aft		= '</p></div>';
		
		if ($match=="link") {

			$match="";
			$dp_bef="";
			$dp_aft="";
					
		}
		
		$page = ($enabled) ? $dp_bef.'<a href="http://note.dirittopratico.it/*'.current_pageurl().'&editor=html&idtag='.$x.'"'.$target.'><img style="'.$img_css.'" src="'.$base.'note.png" title="utilizza questo modello con Note di udienza" /></a>'.$match.$dp_aft:"<p>$match</p>";
		$text = str_replace($matches[0][$x], $page, $text);		
		}
return $text;

}

// Funzione per il riconoscimento dei riferimenti normativi
function dirittopratico($text) { if (stripos($text, '||off||')) {return $text;}

	$enabled	= true;
	$target		= 'target="_blank"';
	$color		= "";

$text=preg_replace("/

(\bart.{1,8}\d.{0,50}?

# codice civile
((?:\bcc\b)|(?:\bcodice\b|\bcod\.|\bcod\b|\bc\.|\bc\b)(?:\s)*(?:civile\b|civ\.|c\.|c\b)

# codice di procedura civile
|(?:\bcpc\b)|(?:\bcodice\b|\bcod\.|\bcod\b|\bc\.|\bc\b)(?:\s)*(?:\sdi\s*)?(?:procedura|proc\.|p\.|p)(?:\s)*(?:civile\b|civ\.|c\.|c\b)

# codice di procedura penale
|(?:\bcpp\b)|(?:\bcodice\b|\bcod\.|\bcod\b|\bc\.|\bc\b)(?:\s)*(?:\sdi\s*)?(?:procedura|proc\.|p\.|p)(?:\s)*(?:penale\b|pen\.|p\.|p\b)

# codice penale
|(?:\bcp\b)|(?:\bcodice\b|\bcod\.|\bcod\b|\bc\.|\bc\b)(?:\s)*(?:penale\b|pen\.|p\.|p\b)

# codice della strada
|(?:\bcds\b)|(?:\bcodice\b|\bcod\.|\bcod\b|\bc\.|\bc\b)(?:\s)*(?:\sdella\s)?(?:strada\b|str\.|str\b)

|(?:[^#](\d\d\d\d)|pct|tecniche|cad|digitale|cod\..*ass\.|assicurazioni|cambiaria|assegni|consumo|personali|privacy|deont.*forense|amministrativo|finanza|redditi|l\.f\.|fallimentare|locazioni)

))(?=[^<>\[\]]*(?:<\w|<\/[^a]|\[\[|$))

/ix","[[$1]]",$text);


	preg_match_all( "#\[\[(.*?)\]\]#s", $text, $matches );
	
	for($x=0; $x<count($matches[0]); $x++)
		{
		$match=$matches[1][$x];
		
		$temp1 = explode('|', $match);
		$case = count($temp1);
		if ($case==1)
			{
			$name=$page=$temp1[0];
			}
		else
			{
			$page=$temp1[0];
			$name=$temp1[1];
			}
		$readypage = str_replace(' ', '_', $page);

		$name = ($color=="") ? $name : "<font color='$color'>$name</font>";
		
		$link='<a style="border-bottom: 1px dashed #000; text-decoration: none;" href="http://wiki.dirittopratico.it/Speciale:Ricerca/'.$readypage.'" title="Cerca '.$name.' su Diritto Pratico" '.$target.'>'.$name.'</a>';
		$output = ($enabled) ? $link : $name;

		$text = str_replace($matches[0][$x], $output, $text);
		}

return $text;

}

add_filter('the_content','dirittopratico');
add_filter('the_content','notediudienza');
add_filter('comment_text','dirittopratico');

?>