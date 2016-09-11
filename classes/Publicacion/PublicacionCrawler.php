<?php 

class PublicacionCrawler {

	public function crawl($id) 
	{
		global $config;

		$url = "https://www.instagram.com/query?q=ig_user($id)+%7B+media.after(1%2C+" . $config['crawler_num_pub'] . ")+%7B%0A++count%2C%0A++nodes+%7B%0A++++caption%2C%0A++++code%2C%0A++++comments+%7B%0A++++++count%0A++++%7D%2C%0A++++comments_disabled%2C%0A++++date%2C%0A++++dimensions+%7B%0A++++++height%2C%0A++++++width%0A++++%7D%2C%0A++++display_src%2C%0A++++id%2C%0A++++is_video%2C%0A++++likes+%7B%0A++++++count%0A++++%7D%2C%0A++++owner+%7B%0A++++++id%0A++++%7D%2C%0A++++thumbnail_src%2C%0A++++video_views%0A++%7D%2C%0A++page_info%0A%7D%0A+%7D";

		$options = array(
			'http' => array(
				'method' => 'GET',
				'header' => 
					// ":authority:www.instagram.com\r\n" .
					// ":method:POST\r\n" .
					// ":path:/query/\r\n" .
					// ":scheme:https\r\n" .
					// "accept:*/*\r\n" .
					// "accept-encoding:gzip, deflate, br\r\n" .
					// "accept-language:es-419,es;q=0.8,en-US;q=0.6,en;q=0.4,gl;q=0.2\r\n" .
					// "cache-control:max-age=0\r\n" .
					"content-length:511\r\n" .
					"content-type:application/x-www-form-urlencoded\r\n" .
					"cookie:mid=V4HC8QAEAAEXeMTPOn_W7F3K8u-7; sessionid=IGSC5af51e9322fa436ae4771beeb7bfa08b132d2fe9402f9664bf8f211b617ee662%3AfAClQdjBghDQ'cT2f3LfjIlFxWIjXE7us%3A%7B%22_token_ver%22%3A2%2C%22_auth_user_id%22%3A3905092089%2C%22_token%22%3A%223905092089%3AyuzWDJc7OK7BjkkIpyX'NpLCG351ZtGQC%3Adb002a68e70ba835ff9d75551ca95052bb66b078dfac0f7d596906ece888d9ed%22%2C%22asns%22%3A%7B%22190.45.203.26%22%3A22047%2C%2'2time%22%3A1473386211%7D%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22last_refreshed%22%3A147'3386299.136438%2C%22_platform%22%3A4%2C%22_auth_user_hash%22%3A%22%22%7D; csrftoken=sK0s3GO922QtxfkBSYa3SxLnKkRgLyOq; s_network=; 'ds_user_id=3905092089; ig_pr=1; ig_vw=1440\r\n" .
					"dnt:1\r\n" .
					"origin:https://www.instagram.com\r\n" .
					"referer:https://www.instagram.com/nicolelulichile/\r\n" .
					"user-agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36\r\n" .
					// "x-csrftoken:sK0s3GO922QtxfkBSYa3SxLnKkRgLyOq\r\n" .
					"x-instagram-ajax:1\r\n" .
					"x-requested-with:XMLHttpRequest\r\n"
			)
		);

		$context = stream_context_create($options);
		$response = file_get_contents($url, false, $context);
		$data = json_decode($response);

		return $data;
	}

	public function testId($id) 
	{
		$data = $this->crawl($id);
		if(isset($data->media)) return true;
		else return false;
	}

	public function getPosts($id) 
	{
		$data = $this->crawl($id);
		$publicaciones = array();

		if(isset($data->media)) {
			foreach($data->media->nodes as $node) {

				$publicacion = new Publicacion();
				$publicacion->setId($node->code);
				$publicacion->setIdUsuario($id);
				$publicacion->setImagen($node->thumbnail_src);
				$publicacion->setUrl("https://www.instagram.com/p/" . $node->code . "/");
				$publicacion->setComentarios($node->comments->count);
				$publicacion->setLikes($node->likes->count);			
				$publicacion->setFechaPublicacion(date('Y-m-d H:i:s', $node->date));
				$publicacion->setFechaActualizacion(date('Y-m-d H:i:s'));
				$publicacion->setEstado(1);
				$publicacion->setDestacada(0);

				($node->is_video == true) ? $publicacion->setVideo(1):$publicacion->setVideo(0);
				if(isset($node->caption)) $publicacion->setTitulo(mb_convert_encoding($node->caption, 'UTF-8'));

				// echo "<pre>"; print_r($instaPublicacion); echo "</pre>"; die;

				$publicaciones[] = $publicacion;
			}
		} else {
			echo "No media found for user $id\n\r";
		}

		return $publicaciones;

	}

	public function getUrl($url) {

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_REFERER, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$str = curl_exec($curl);
		curl_close($curl);

		return $str;

	}

}

?>