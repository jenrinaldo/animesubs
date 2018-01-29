<?php

class GogoanimeAPI{
	public static function curl($urll){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $urll);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, $urll);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) ChromeHD/52.0.2743.82 Safari/537.36');
		$exec = curl_exec($ch);
		$exec = str_replace(urldecode('%0A'), '', $exec);
		return $exec;
	}
	public static function get_data($urll){
		    # Mengambil kontens URL dan Membuat Struktur untuk Hasilnya
            $hehe = "https:";
            $kontens = self::curl($urll);
			$hasil_gogo  = array();
			# Mengambil data "Link" kemudian di Filter
            preg_match("'<a href=\"#\" class=\"active\" rel=\"1\" data-video=\"\s*(.*?)\s*\" >'si", $kontens, $anime);
			if(isset($anime[1])) $hasil_gogo["anime"] = $hehe.$anime[1];
			preg_match("'<a href=\"#\" rel=\"100\" data-video=\"\s*(.*?)\s*\" >'si", $kontens, $vidcdn);
			if(isset($vidcdn[1])) $hasil_gogo["vidcdn"] = $hehe.$vidcdn[1];
			preg_match("'<a href=\"#\" rel=\"12\" data-video=\"\s*(.*?)\s*\">'si", $kontens, $streamango);
			if(isset($streamango[1])) $hasil_gogo["streamango"] = $streamango[1];
			preg_match("'<a href=\"#\" rel=\"7\" data-video=\"\s*(.*?)\s*\">'si", $kontens, $estram);
			if(isset($estram[1])) $hasil_gogo["estram"] = $estram[1];
			preg_match("'<a href=\"#\" rel=\"16\" data-video=\"\s*(.*?)\s*\">'si", $kontens, $open);
			if(isset($open[1])) $hasil_gogo["open"] = $open[1];
			preg_match("'<a href=\"#\" rel=\"5\" data-video=\"\s*(.*?)\s*\">'si", $kontens, $open);
			if(isset($open[1])) $hasil_gogo["openload"] = $open[1];
			preg_match("'<a href=\"#\" rel=\"3\" data-video=\"\s*(.*?)\s*\">'si", $kontens, $mp4);
			if(isset($mp4[1])) $hasil_gogo["mp4"] = $mp4[1];
			return $hasil_gogo;
	}
}
header("Content-Type: text/javascript");
$URLs = $_GET["urll"];
$Gogoanime = new GogoanimeAPI();
if(isset($URLs) && $URLs != ""){
	$DATAs = $Gogoanime->get_data($URLs);
	echo json_encode($DATAs);
}else{
	echo "0";
}
exit;


?>