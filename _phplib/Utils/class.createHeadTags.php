<?php
class createHeadTags {
	var $headTag = array();
	function createHeadTags(){
	
		$tempArr = array();
		
		$tempArr['name'] = 'description';
		$tempArr['content'] = '';
		array_push($this->headTag,$tempArr);
		
		
		$tempArr['name'] = 'Content-Language';
		$tempArr['content'] = 'en-gb';
		array_push($this->headTag,$tempArr);
		
		
		$tempArr[0]['name'] = 'distribution';
		$tempArr['content'] = 'global';
		array_push($this->headTag,$tempArr);
		
		$tempArr['name'] = 'language';
		$tempArr['content'] = 'en-gb';
		array_push($this->headTag,$tempArr);
		
		$tempArr['name'] = 'lang';
		$tempArr['content'] = 'en';
		array_push($this->headTag,$tempArr);
		
		$tempArr['name'] = 're-visit';
		$tempArr['content'] = '7 Days';
		array_push($this->headTag,$tempArr);
		
		$tempArr['name'] = 'rating';
		$tempArr['content'] = 'GENERAL';
		array_push($this->headTag,$tempArr);
		
		$tempArr['name'] = 'distribution';
		$tempArr['content'] = 'GLOBAL';
		array_push($this->headTag,$tempArr);

		$tempArr['name'] = 'distribution';
		$tempArr['content'] = 'GLOBAL';
		array_push($this->headTag,$tempArr);
		
		$tempArr['name'] = 'copyright';
		$tempArr['content'] = 'Giosto';
		array_push($this->headTag,$tempArr);



	}
	function addUpdateTag($tagName, $tagContent){
		if(!empty($tagName)){
			$tagExists = false;
			// Search for tag and replace if found
			for($i=0; $i<count($headTag);$i++){
				if(key($this->headTag[$i]['name'] ) == $tagName){				
					$this->headTag[$i]['name']  = $tagContent;
					$tagExists = true;
				} 
			}
			// Tag not found so create new tag
			if(!$tagExists){
				$tempArr['name'] = $tagName;
				$tempArr['content'] = $tagContent;
				array_push($this->headTag,$tempArr);

			}
		}
	}
	function getHeadTags(){
		$headTags = '';

		for($i=0; $i<count($this->headTag);$i++){
			$headTags .='<meta name="'.$this->headTag[$i]['name'].'" content="'.$this->headTag[$i]['content'].'" />';
		}
		
		echo $headTags;
	}
}
?>