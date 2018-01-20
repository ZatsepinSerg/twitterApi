<?php
session_start();
use Abraham\TwitterOAuth\TwitterOAuth;

require "vendor/autoload.php";
require "MainFunctional.php";

class TwitterMessager implements MainFunctional
{
    public $connection;
    public $twittName;

    public function __construct()
    {
        define('CONSUMER_KEY', '96jBkM3KcIydBNY9map5eTAOi');
        define('CONSUMER_SECRET', 'c2iTSjd08ZwcBmcoqq6SXJDbqacNLbLQkSN3G5yfS07bi0r8xy');
        define('OAUTH_CALLBACK', 'http://netpeack.com/callback.php');
        $this->connection = $this->connectMessager();
        $this->twittName ='davidduchovny';
    }
    public function connectMessager()
    {
        if(!isset($_SESSION['access_token'])){
            $connection = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET);
            $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
            $_SESSION['oauth_token'] = $request_token['oauth_token'];
            $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
            $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
            header('Location: '. $url);
        }else {
            $access_token = $_SESSION['access_token'];
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
            $user = $connection->get('account/verify_credentials');
            return $connection;
        }
    }

    public function viewMessage()
    {
        $collectTwits = [];
        $tweets =  $this->connection->get('statuses/user_timeline', ['count' => 25, 'exclude_replies' => true,
            'screen_name' => $this->twittName, 'include_rts' => false]);

        setcookie('id_twitt',$tweets[0]->id);

        foreach ($tweets AS $key => $tweet) {
            $collectTwits[$key][] = $tweet->text;
            $collectTwits[$key][] = date('Y-m-d H:i:s', strtotime($tweet->created_at));
            $collectTwits[$key][] = $tweet->user->name;
            $collectTwits[$key][] = $tweet->user->profile_image_url;
        }
        return  $collectTwits;
    }

    public function newTweet()
    {
        $old_id = $_COOKIE['id_twitt'];
        $collectTwits = [];
        $count = 0;
        do {
            $count++;
            $tweets = $this->connection->get('statuses/user_timeline', ['count' => $count, 'exclude_replies' => true,
                'screen_name' => $this->twittName, 'include_rts' => false]);
        }
        while($tweets[$count - 1]->id !=  $old_id);

        $countNewTwitt = count($tweets)-1;

      for($i = 0;$i < $countNewTwitt;$i++){
            $collectTwits[$i][] = $tweets[$i]->text;
            $collectTwits[$i][] = date('Y-m-d H:i:s', strtotime($tweets[$i]->created_at));
            $collectTwits[$i][] = $tweets[$i]->user->name;
            $collectTwits[$i][] = $tweets[$i]->user->profile_image_url;
            $collectTwits[$i][] = $tweets[$i]->id;
        }

        setcookie('id_twitt',$tweets[0]->id);

        return  $collectTwits;
    }
}


