<?php
function addSocialBookmarks($url,$title){

	$url = urlencode($url);
	$title = urlencode($title);
	
	$output = '<div class="sociable">';
	$output .= '<h4>Bookmark and share</h4>';
	$output .= '<ul>';						
	$output .= '<li><a rel="nofollow" target="_blank" href="http://www.stumbleupon.com/submit?url='.$url.'&amp;title='.$title.'" title="StumbleUpon"><img src="images/social_bookmark/stumbleupon.png" title="StumbleUpon" alt="StumbleUpon" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://digg.com/submit?phase=2&amp;url='.$url.'&amp;title='.$title.'" title="Digg"><img src="images/social_bookmark/digg.png" title="Digg" alt="Digg" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://reddit.com/submit?url='.$url.'&amp;title='.$title.'" title="Reddit"><img src="images/social_bookmark/reddit.png" title="Reddit" alt="Reddit" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://del.icio.us/post?url='.$url.'&amp;title='.$title.'" title="del.icio.us"><img src="images/social_bookmark/delicious.png" title="del.icio.us" alt="del.icio.us" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://ma.gnolia.com/bookmarklet/add?url='.$url.'&amp;title='.$title.'" title="Ma.gnolia"><img src="images/social_bookmark/magnolia.png" title="Ma.gnolia" alt="Ma.gnolia" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://www.connotea.org/addpopup?continue=confirm&amp;uri='.$url.'&amp;title='.$title.'" title="connotea"><img src="images/social_bookmark/connotea.png" title="connotea" alt="connotea" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://www.sphere.com/search?q=sphereit:'.$url.'&amp;title='.$title.'" title="SphereIt"><img src="images/social_bookmark/sphere.png" title="SphereIt" alt="SphereIt" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://tailrank.com/share/?text=&amp;link_href='.$url.'&amp;title='.$title.'" title="TailRank"><img src="images/social_bookmark/tailrank.png" title="TailRank" alt="TailRank" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u='.$url.'&amp;t='.$title.'" title="Facebook"><img src="images/social_bookmark/facebook.png" title="Facebook" alt="Facebook" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://twitthis.com/twit?url='.$url.'" title="TwitThis"><img src="images/social_bookmark/twitter.png" title="TwitThis" alt="TwitThis" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$url.'&amp;t='.$title.'" title="YahooMyWeb"><img src="images/social_bookmark/yahoomyweb.png" title="YahooMyWeb" alt="YahooMyWeb" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk='.$url.'&amp;title='.$title.'" title="Google"><img src="images/social_bookmark/googlebookmark.png" title="Google" alt="Google" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://www.furl.net/storeIt.jsp?u='.$url.'&amp;t='.$title.'" title="Furl"><img src="images/social_bookmark/furl.png" title="Furl" alt="Furl" class="sociable-hovers" /></a></li>';
	
	$output .= '<li><a rel="nofollow" target="_blank" href="http://co.mments.com/track?url='.$url.'&amp;title='.$title.'" title="Co.mments"><img src="images/social_bookmark/comments.gif" title="Co.mments" alt="Co.mments" class="sociable-hovers" /></a></li>';
	$output .= '<li><a rel="nofollow" target="_blank" href="http://www.spurl.net/spurl.php?url='.$url.'&amp;title='.$title.'" title="Spurl"><img src="images/social_bookmark/spurl.gif" title="Furl" alt="Spurl" class="sociable-hovers" /></a></li>';
	
	
	$output .= '</ul>';
	$output .= '</div>';
	
	return $output;
}
?>