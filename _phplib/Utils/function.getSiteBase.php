<?php
function getSiteBase(){
/////////////////////////////////////////////////////////////////
// live
/////////////////////////////////////////////////////////////////
$siteBase = '<base href="http://www.NottinghamSciencePark.co.uk/" />';
/////////////////////////////////////////////////////////////////
// production
/////////////////////////////////////////////////////////////////
$siteBase = '<base href="http://localhost/NottinghamSciencePark.co.uk/" />';
/////////////////////////////////////////////////////////////////
return $siteBase;
}
?>