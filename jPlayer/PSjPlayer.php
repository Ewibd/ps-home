<?php $JPfile=$_GET["file"]; ?>    
<?php $JPstartsec = $_GET["startsec"]; ?>
<?php if (!is_numeric($JPstartsec)) {$JPstartsec=0;} ?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />

<title>Podcast Science Audio Player</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="skin/black-and-gray/jplayer-black-and-gray.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<script type="text/javascript">
//<![CDATA[
//alert("<?php echo ($JPstartsec); ?>");
$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				mp3:"<?php echo $_GET["file"]; ?>"
			}).jPlayer("pause",<?php echo ($JPstartsec); ?>);
		},
		swfPath: "js",
		supplied: "mp3",
		wmode: "window",
		preload: "none",
		volume: "1"
		
	});
});
//]]>
</script>
</head>
<body style="margin:0;padding:0">

		<div id="jquery_jplayer_1" class="jp-jplayer"></div>

		<div class="jp-audio-container">
			<div id="jp_container_1" class="jp-audio">
				<div class="jp-type-single">
					<div id="jp_interface_1" class="jp-gui jp-interface">
						<ul class="jp-controls">
							<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
							<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
							<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
							<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
						</ul>
						<div class="jp-progress-container">
							<div class="jp-progress">
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>
								</div>
							</div>
						</div>
						<div class="jp-volume-bar-container">
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
							<!--div class="jp-time-holder"></div>
							<div class="jp-current-time"></div>
							<div class="jp-duration"></div-->
	
							<!--ul class="jp-toggles">
								<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
								<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
							</ul-->
						</div>
					</div>
				</div>
				<p class="credits">Player <a href="http://www.podcastscience.fm" target="_blank">podcastscience.fm</a></p>
			</div>
		</div>
</body>
</html>
