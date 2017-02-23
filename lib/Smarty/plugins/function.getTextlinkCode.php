<?php

function smarty_function_getTextlinkCode($params, &$smarty)
{
    return getTextlinkCode($params['ad_before'], $params['ad_des'], $params['ad_url'], $params['ad_after']);
}

?>
