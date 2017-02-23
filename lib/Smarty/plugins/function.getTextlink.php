<?php

function smarty_function_getTextlink($params, &$smarty)
{
    return getTextlink($params['ad_before'], $params['ad_des'], $params['ad_url'], $params['ad_after']);
}

?>
