<?php 

//curl ini
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT,20);
curl_setopt($ch, CURLOPT_REFERER, 'http://www.bing.com/');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8');
curl_setopt($ch, CURLOPT_MAXREDIRS, 5); // Good leeway for redirections.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Many login forms redirect at least once.
curl_setopt($ch, CURLOPT_COOKIEJAR , "cookie.txt");

//curl get
$x='error';

$query_hash = "9b498c08113f1e09617a1703c22b2f32";
//$query_hash = "298b92c8d7cad703f7565aa892ede943";
$variables = '{"tag_name":"storming","first":8}';
$variables = '{"tag_name":"storming","first":8,"after":"QVFEN0hQV0ZKRXE2MkJERnlVcXhYc0ZkeEdEN1EwOHRfVE9tM2FYcnlteWhZNmFQTTkwZm00YzliMi1WaWdEZW1nei1hUlRVMFFTRWFJSWFaWEw5YWcxRQ=="}';
$url='https://www.instagram.com/graphql/query/?query_hash=' . $query_hash . '&variables=' . urlencode($variables) ;
$url = "https://www.instagram.com/explore/tags/storming/?__a=1&max_id=";

curl_setopt($ch, CURLOPT_HTTPGET, 1);
curl_setopt($ch, CURLOPT_URL, trim($url));
$exec=curl_exec($ch);
$x=curl_error($ch);

$json = json_decode($exec);

echo '<pre>';
print_r($json);


?>