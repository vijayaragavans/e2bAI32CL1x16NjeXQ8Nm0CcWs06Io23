<?php

require_once 'Dailymotion.php';

$api = new Dailymotion();
$api->setGrantType(Dailymotion::GRANT_TYPE_AUTHORIZATION, '19a81b988bfd78603f81', '6bb1aa638841efefe1e7decb89f1cfdb4ffabfb2');

try
{
    $result = $api->get('/me/videos', array('fields' => 'id,title,description'));
}
catch (DailymotionAuthRequiredException $e)
{
    // Redirect the user to the Dailymotion authorization page
    header('Location: ' . $api->getAuthorizationUrl());
    return;
}
catch (DailymotionAuthRefusedException $e)
{
    // Handle case when user refused to authorize
    // <YOUR CODE>
}
