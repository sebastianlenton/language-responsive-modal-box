//http://updates.html5rocks.com/2013/01/Voice-Driven-Web-Apps-Introduction-to-the-Web-Speech-API
//http://stiltsoft.com/blog/2013/05/google-chrome-how-to-use-the-web-speech-api/

/*

(31/11/2013)
By Sebastian Lenton

Hello! This is an experiment using the Google Web Speech API, to build a modal box which can be dismissed by swearing at it or telling it to go away.

I think the API is only supported by Chrome 25+ on desktop? If you know otherwise then please get in touch via:
twitter.com.sebastianlenton
sebastianlenton.com/contact
github.com/sebastianlenton

(or, just let me know what you think :-) )
*/

var wordsMap = {
	'fuck'      : true,
	'f***'      : true,
	'shit'      : true,
	's***'      : true,
	'piss'      : true,
	'p***'      : true,
	'off'       : true,
	'go'        : true,
	'away'      : true,
	'bugger'    : true,
	'get'       : true,
	'lost'      : true,
	'do'        : true,
	'one'       : true,
	'you'       : true,
	'b*******'  : true,
	'bollocks'  : true
};

/*
When outputting recognised speech into the console, some sweary strings get obfuscated by asterisks. But, if someone else implemented the speech API it might be different I guess, so best to account for both.

This script goes by individual words, not combination of words, as (in my opinion) it makes it more accurate - eg "fuck" is potentiallyeasier to parse than "fuck off", but the intent is the same just by detecting the word "fuck" most of the time. Similarly, someone might say something weird like "spubble off", but this would still get rid of the modal as it detects the word "off" even though it doesn't account for the word "spubble" - again, the intent is the same.

Also, 'you' is included as I sometimes say 'fuck you!' to these things.

Do bear in mind, [currently (31/11/2013)] the speech recognition is pretty poor (perhaps it's actually my mic which is a bit poor?).
*/


//stuff to do with the modal box showing/hiding
function bindModalCloseButton() {
	$( '#modalClose' ).tap( function() {
		hideModal();
	});
}

function showModal() {
	if( !$( '.overlay' ).hasClass( 'animate' ) ) {
		$( '.overlay' ).addClass( 'animate' );
	}
}

function hideModal() {
	$( '.overlay' ).removeClass( 'animate' );
}

function setModalToShow( interval ) {
	setTimeout( function() { showModal() }, interval );			//set modal to restart
}

//stuff to do with the top status banner thing (set/show/hide)
function setBanner( content, status ) {
	$( '#banner' ).removeClass();

	if( typeof( status ) == 'string' ) {	
		$( '#banner' ).addClass( status );
	}
	$( '#banner p' ).text( content );
}

function showBanner( interval ) {
	if( typeof( interval ) !== 'number' ) {
		interval = 1000;
	}
	setTimeout( function() { $( '#banner' ).addClass( 'active' ) }, interval );
}

function hideBanner() {
	if( typeof( interval ) !== 'number' ) {
		interval = 1000;
	}
	setTimeout( function() { $( '#banner' ).removeClass( 'active' ) }, interval );
}


//speech API not supported fallback
function upgrade() {
	setBanner( 'This browser does not support the Web Speech API. You currently need to use Chrome 25+.', 'error' );
	showBanner();
}

//speech processing
function processSpeech( transcript, wordsMap ) {

	//console.log( transcript );

	//thanks to Joseph Lenton for help with this regex and some other bits
	//split the transcript into an array
	transcript.replace( /[.,; \t\n]+/g, ' ' );
	var transcriptWords = transcript.split( ' ' );
	
	//compare the array against our map of words
	for ( var i = 0; i < transcriptWords.length; i++ ) {
		var word = transcriptWords[i];
		
		if ( wordsMap.hasOwnProperty(word) ) {
			// word is found
			return true;
		}
	}
    return false;
}

function speechMatched() {
	hideModal();
	setModalToShow( 5500 );
}

//speech API setup & run stuff
function speechInit() {
	if ( !( 'webkitSpeechRecognition' in window ) ) {
		upgrade();													//need to do something for this
	} else {
		var recognition = setupRecgonitionObject();
			showBanner();
		
		recognition.onstart = function() {
			hideBanner();
			setModalToShow( 3700 );
		}
		
		recognition.onresult = function(event) {
		    var interim_transcript = getInterimTranscript();
		    
		    if( processSpeech( interim_transcript, wordsMap ) ) {
		    	speechMatched();
		    }
		}
		
		recognition.onerror = function(event) {
			
		}
		
		recognition.onend = function() {
			//you can request microphone access again on end, but I felt it just made things more confusing
			//speechInit();
		}
		
		recognition.start();	
	}
}

function setupRecgonitionObject() {
	var recognition = new webkitSpeechRecognition();
	recognition.continuous = true;
	recognition.interimResults = true;
	
	return recognition;
}

function getInterimTranscript() {
	//in a real-world setting I think you may have to compensate for people saying "new paragraph" - whcih creates a newline
	var interim_transcript = '';
	for (var i = event.resultIndex; i < event.results.length; ++i) {
		interim_transcript += event.results[i][0].transcript;
	}
	return interim_transcript;
}

//main script
jQuery(document).ready(function($) {	
	speechInit();
	
	bindModalCloseButton();
});

//if you like this or have anything to add then please get in touch via the contact details at the top of this script! :-)