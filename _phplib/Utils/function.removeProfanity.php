<?php
function removeProfanity($string){

	$badWords = array('/fuck+[[:punct:][:alnum:]]{0,10}/',
	'/@\$\$+[[:punct:][:alnum:]]{0,10}/',
	'/arse+[[:punct:][:alnum:]]{0,10}/', 
	'/ar5e+[[:punct:][:alnum:]]{0,10}/', 
	'/[[:punct:]]ass[[:punct:][:alnum:]]{0,10}/',
	'/ass+[[:punct:][:alnum:]]{0,10}/',
	'/anal+[[:punct:][:alnum:]]{0,10}/',
	'/b!+ch/', '/b!tch/',
	'/b17ch/','/b1tch/','/bi+ch/','/bi7ch/',
	'/bitch+[[:punct:][:alnum:]]{0,10}/',
	'/bastard+[[:punct:][:alnum:]]{0,10}/',
	'/ba5tard+[[:punct:][:alnum:]]{0,10}/',
	'/baws+[[:punct:][:alnum:]]{0,10}/',
	'/b@ws+[[:punct:][:alnum:]]{0,10}/',
	'/bollock+[[:punct:][:alnum:]]{0,10}/',
	'/bollox/','/bo11ox/','/b0110x/','/b0ll0x/','/butt-pirate/',
	'/b00b+[[:punct:][:alnum:]]{0,10}/',
	'/boob+[[:punct:][:alnum:]]{0,10}/',
	'/b0ob+[[:punct:][:alnum:]]{0,10}/',
	'/bo0b+[[:punct:][:alnum:]]{0,10}/',
	'/blowjob+[[:punct:][:alnum:]]{0,10}/',
	'/bl0wjob+[[:punct:][:alnum:]]{0,10}/',
	'/blowj0b+[[:punct:][:alnum:]]{0,10}/',
	'/bl0wj0b+[[:punct:][:alnum:]]{0,10}/',
	'/b10wjob+[[:punct:][:alnum:]]{0,10}/',
	'/b1owj0b+[[:punct:][:alnum:]]{0,10}/',
	'/b10wj0b+[[:punct:][:alnum:]]{0,10}/',
	'/blow\sjob+[[:punct:][:alnum:]]{0,10}/',
	'/c0ck+[[:punct:][:alnum:]]{0,10}/',
	'/cock+[[:punct:][:alnum:]]{0,10}/',
	'/clit+[[:punct:][:alnum:]]{0,10}/',
	'/crap+[[:punct:][:alnum:]]{0,10}/',
	'/cack+[[:punct:][:alnum:]]{0,10}/',
	'/j1sm+[[:punct:][:alnum:]]{0,10}/',
	'/j!sm+[[:punct:][:alnum:]]{0,10}/',
	'/j1sm+[[:punct:][:alnum:]]{0,10}/',
	'/j!sm+[[:punct:][:alnum:]]{0,10}/',
	'/cum+[[:punct:][:alnum:]]{0,10}/', 
	'/cunt+[[:punct:][:alnum:]]{0,10}/', 
	'/cunt/', 
	'/daygo/',
	'/dego/',
	'/dick+[[:punct:][:alnum:]]{0,10}/', 
	'/dildo+[[:punct:][:alnum:]]{0,10}/',
	'/ejackulat+[[:punct:][:alnum:]]{0,10}/',
	'/ejaculat+[[:punct:][:alnum:]]{0,10}/',
	'/fag+[[:punct:][:alnum:]]{0,10}/',
	'/fanny/',
	'/fatass/',
	'/fack+[[:punct:][:alnum:]]{0,10}/',
	'/felch+[[:punct:][:alnum:]]{0,10}/', 
	'/f@ck+[[:punct:][:alnum:]]{0,10}/',
	'/f\*ck+[[:punct:][:alnum:]]{0,10}/',
	'/fcuk+[[:punct:][:alnum:]]{0,10}/',  
	'/fuck/',  
	'/f00k+[[:punct:][:alnum:]]{0,10}/',
	'/fook+[[:punct:][:alnum:]]{0,10}/',
	'/f0ok+[[:punct:][:alnum:]]{0,10}/',
	'/fo0k+[[:punct:][:alnum:]]{0,10}/',
	'/f00ck+[[:punct:][:alnum:]]{0,10}/',
	'/foock+[[:punct:][:alnum:]]{0,10}/',
	'/f0ock+[[:punct:][:alnum:]]{0,10}/',
	'/fo0ck+[[:punct:][:alnum:]]{0,10}/',
	'/foreskin+[[:punct:][:alnum:]]{0,10}/',
	'/fuk+[[:punct:][:alnum:]]{0,10}/',
	'/fux0r/',
	'/gay+[[:punct:][:alnum:]]{0,10}/',
	'/gook+[[:punct:][:alnum:]]{0,10}/',
	'/hoer+[[:punct:][:alnum:]]{0,10}/',
	'/hoor/',
	'/jism+[[:punct:][:alnum:]]{0,10}/',
	'/j1sm+[[:punct:][:alnum:]]{0,10}/',
	'/j!sm+[[:punct:][:alnum:]]{0,10}/',
	'/jizm+[[:punct:][:alnum:]]{0,10}/',
	'/j1zm+[[:punct:][:alnum:]]{0,10}/',
	'/j!zm+[[:punct:][:alnum:]]{0,10}/',
	'/jizz+[[:punct:][:alnum:]]{0,10}/', 
	'/j1zz+[[:punct:][:alnum:]]{0,10}/', 
	'/j!zz+[[:punct:][:alnum:]]{0,10}/', 
	'/kak/',
	'/klootzak+[[:punct:][:alnum:]]{0,10}/',
	'/kock/',
	'/kraut+[[:punct:][:alnum:]]{0,10}/', 
	'/kunt+[[:punct:][:alnum:]]{0,10}/', 
	'/l3i+ch+[[:punct:][:alnum:]]{0,10}/', 
	'/l3itch+[[:punct:][:alnum:]]{0,10}/', 
	'/lesbian+[[:punct:][:alnum:]]{0,10}/', 
	'/lesbo+[[:punct:][:alnum:]]{0,10}/', 
	'/lesbos+[[:punct:][:alnum:]]{0,10}/', 
	'/masturbat+[[:punct:][:alnum:]]{0,10}/',
	'/motherfuck+[[:punct:][:alnum:]]{0,10}/',
	'/minge+[[:punct:][:alnum:]]{0,10}/',
	'/mofo+[[:punct:][:alnum:]]{0,10}/',
	'/m0fo+[[:punct:][:alnum:]]{0,10}/',
	'/mof0+[[:punct:][:alnum:]]{0,10}/',
	'/m0f0+[[:punct:][:alnum:]]{0,10}/',
	'/nazi+[[:punct:][:alnum:]]{0,10}/',
	'/nigga+[[:punct:][:alnum:]]{0,10}/',
	'/nigger+[[:punct:][:alnum:]]{0,10}/',
	'/n1gga+[[:punct:][:alnum:]]{0,10}/',
	'/n1gger+[[:punct:][:alnum:]]{0,10}/',	
	'/n!gga+[[:punct:][:alnum:]]{0,10}/',
	'/n!gger+[[:punct:][:alnum:]]{0,10}/',	
	//'/nob+[[:punct:][:alnum:]]{0,10}/',
	//'/n0b+[[:punct:][:alnum:]]{0,10}/',
	'/nutsack+[[:punct:][:alnum:]]{0,10}/', 
	'/phuck+[[:punct:]]{0,10}/',
	'/paki+[[:punct:][:alnum:]]{0,10}/',
	'/pakki+[[:punct:][:alnum:]]{0,10}/',
	'/pak1+[[:punct:][:alnum:]]{0,10}/',
	'/piss+[[:punct:][:alnum:]]{0,10}/',
	'/porn+[[:punct:][:alnum:]]{0,10}/', 
	'/p0rn+[[:punct:][:alnum:]]{0,10}/',
	'/pr0n+[[:punct:][:alnum:]]{0,10}/',
	'/pusse+[[:punct:]]{0,10}/', 
	'/pussy+[[:punct:][:alnum:]]{0,10}/',
	'/queer+[[:punct:][:alnum:]]{0,10}/',
	'/scrotum+[[:punct:][:alnum:]]{0,10}/',
	'/scheiss+[[:punct:][:alnum:]]{0,10}/', 
	'/schmuck+[[:punct:][:alnum:]]{0,10}/', 
	'/shat+[[:punct:][:alnum:]]{0,10}/',
	'/sh@t+[[:punct:][:alnum:]]{0,10}/',
	'/sh!t+[[:punct:][:alnum:]]{0,10}/',
	'/shit+[[:punct:][:alnum:]]{0,10}/',
	'/$hit+[[:punct:][:alnum:]]{0,10}/',
	'/$h1t+[[:punct:][:alnum:]]{0,10}/',
	'/$h!t+[[:punct:][:alnum:]]{0,10}/',
	'/sh1t+[[:punct:][:alnum:]]{0,10}/',
	'/5h1t+[[:punct:][:alnum:]]{0,10}/',
	'/5hit+[[:punct:][:alnum:]]{0,10}/',
	'/shemale+[[:punct:][:alnum:]]{0,10}/',
	'/shiz+[[:punct:][:alnum:]]{0,10}/',
	'/slut+[[:punct:][:alnum:]]{0,10}/',
	'/spunk+[[:punct:][:alnum:]]{0,10}/', 
	'/smut+[[:punct:]]{0,10}/', 
	'/suka+[[:punct:][:alnum:]]{0,10}/', 
	'/5uka+[[:punct:][:alnum:]]{0,10}/',
	'/5uk+[[:punct:]]{0,10}/',  
	'/teets+[[:punct:]]{0,10}/',
	'/teez+[[:punct:][:alnum:]]{0,10}/',
	'/titt+[[:punct:][:alnum:]]{0,10}/',
	'/tits+[[:punct:][:alnum:]]{0,10}/',
	'/twat++[[:punct:][:alnum:]]{0,10}/', 
	'/viagra+[[:punct:][:alnum:]]{0,10}/',
	'/v1agra+[[:punct:][:alnum:]]{0,10}/',
	'/wank+[[:punct:][:alnum:]]{0,10}/', 
	'/wetback+[[:punct:][:alnum:]]{0,10}/', 
	'/whore+[[:punct:][:alnum:]]{0,10}/',
	'/whoar+[[:punct:]]{0,10}/'
	);

	$stringArr 			= explode(' ',$string);
	$outputStringArr 	= array();
	$matches 	= array();
	$replacement 		='';
	$matchfound 		= false;
	
	for($i=0;$i<count($stringArr);$i++){

		$stringSearch = strtolower($stringArr[$i]);

		for($j=0;$j<count($badWords);$j++){	
			// detect if match is found
			if(preg_match_all($badWords[$j],$stringSearch,$matches)){

				$matchfound = true;
				$stringSearch = preg_match_all($badWords[$j], $stringSearch,$matches);	
			}	
		}
		if($matchfound){	
			// replace the bad language	
			$outputStringArr[$i] = $replacement;//$stringSearch;
		} else {
			// use the original word
			$outputStringArr[$i] = $stringArr[$i];			
		}	
		$matchfound = false;
	}
	$string = implode(' ',$outputStringArr);
	return $string;
}
/* example usage */
//$test = ' you fucking cunt i hate you';
//echo removeBadWords($test);
?>