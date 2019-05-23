<?php
class AdafruitManager
{
    public $key;
    public $username;
    public $group;
    public $url;

    public function __construct($key, $username, $group, $url="http://io.adafruit.com/api/v2/")
    {
        $this->key = $key;
        $this->username = $username;
        $this->group = $group;
        $this->url = $url.$this->username;
    }

    public function createGroup($quoted = false)
    {
        $req = '{"name":';

        if($quoted) $req .= '"';

        $req .= $this->group;

        if($quoted) $req .= '"';

        $req .= '}';
        $url = $this->url."/groups";
        $res = $this->sendRequest($url, true, $req);

        return $res;
    }

    public function createFeed($value, $quoted = true)
    {
        $req = '{"description":';
        if($quoted) $req .= '"';
        $req .= $value;
        if($quoted) $req .= '",';

        $req .= '"key":';
        if($quoted) $req .= '"';
        $req .= $this->group;
        if($quoted) $req .= '",';

        $req .= '"licence":';
        if($quoted) $req .= '"';
        if($quoted) $req .= '",';

        $req .= '"name":';
        if($quoted) $req .= '"';
        $req .= $value;
        if($quoted) $req .= '"';

        $req .= '}';
        $url = $this->url."/groups/".$this->group."/feeds";
        $res = $this->sendRequest($url, true, $req);

        return $res;
    }

    public function getGroupNames()
    {
        $url = $this->url."/groups";

        $c = curl_init($url);

        $headers = array();
        $headers[] = "X-AIO-Key: ".$this->key;
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);

        $json = json_decode(curl_exec($c));

        curl_close($c);

        $arr = array();
        foreach($json as $j)
            $arr[] = $j->name;

        return $arr;
    }

    public function getGroupFeeds()
    {
        $url = $this->url."/groups/".$this->group."/feeds/";

        return $this->sendRequest($url);
    }

    public function getGroupFeed($feed)
    {
        $url = $this->url."/groups/".$this->group."/feeds/".$feed."/data";

        return $this->sendRequest($url);
    }

    protected function sendRequest($url, $isPOST = false, $body = "")
    {

        $c = curl_init($url);

        $headers = array();
        $headers[] = "X-AIO-Key: ".$this->key;


        if($isPOST)
        {
            curl_setopt($c, CURLOPT_POST, true);
            $headers[] = "Content-Type: application/json";
            curl_setopt($c, CURLOPT_POSTFIELDS, $body);
        }

        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($c);

        curl_close($c);

        return $res;
    }
}