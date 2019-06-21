<?php
class AdafruitManager
{
    public $key;
    public $username;
    public $group;
    public $url;

    public function __construct($key, $username, $group, $url="http://io.adafruit.com/api/v2/")
    {
        /*
         * Constructeur permettant l'entrée des données essentielles à la réussite des fonctions suivantes
         */
        $this->key = $key;
        $this->username = $username;
        $this->group = $group;
        $this->url = $url.$this->username;
    }

    public function createGroup($quoted = false)
    {
        /*
         * Fonction permettant de créer un groupe
         */
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
        /*
         * Fonction permettant de créer un feed
         */
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

    public function send($feed, $value, $quoted = false)
    {
        /*
         * Fonction permettant d'envoyer une nouvelle donnée à un feed appartenant à un groupe précis
         */
        $req = '{"value":';

        if($quoted) $req .= '"';

        $req .= $value;

        if($quoted) $req .= '"';

        $req .= '}';


        $url = $this->url."/groups/".$this->group."/feeds/".$feed."/data";
        $res = $this->sendRequest($url, true, $req);

        return $res;
    }

    public function getGroupNames()
    {
        /*
         * Fonction permettant la récupération de tous les noms des groupes présents
         */
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
        /*
         * Fonction permettant la récupération de tous les feeds appartenant à un groupe
         */
        $url = $this->url."/groups/".$this->group."/feeds/";

        return $this->sendRequest($url);
    }

    public function getGroupFeed($feed)
    {
        /*
         * Fonction permettant la récupération de la dernière valeur d'un feed appartenant à  un groupe
         */
        $url = $this->url."/groups/".$this->group."/feeds/".$feed."/data/last";

        return $this->sendRequest($url);
    }

    protected function sendRequest($url, $isPOST = false, $body = "")
    {
        /*
         * Fonction permettant l'envoi de requête pour chaque fonction précédente
         */
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