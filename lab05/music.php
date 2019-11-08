


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php $song_count = 5678; ?>
		<p>
			I love music.
			I have <?= $song_count?> total songs,
			which is over <?= (int)($song_count / 10) ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->

		<div class="section">
			<h2>Yahoo! Top Music News</h2>
		
			<ol>
				<?php 
					$news_pages;
					if(isset($_GET["newspages"]))
						$news_pages = $_GET["newspages"];
					else
						$news_pages = 5;
					
					for($i = 1; $i <= $news_pages; $i++){ 
				?>
					<li><a href="http://music.yahoo.com/news/archive/?page=<?= $i ?>">Page <?= $i ?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
				<?php
					$fav_arts = array("Guns N' Roses", "Green Day", "Blink182", "Queen"); 
					$fav_arts = file("favorite.txt");
					foreach($fav_arts as $fav_art){ 
				?>
					<li><a href="http://en.wikipedia.org/wiki/<?= $fav_art ?>"><?= $fav_art ?></a></li>
				<?php } ?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php 
					$mp3files = glob("lab5/musicPHP/songs/*.mp3");
					$musics = array();
					foreach($mp3files as $mp3file){
						$musics[$mp3file] = (int)(filesize($mp3file)/1024);
					}
					arsort($musics);
					foreach($musics as $path => $size){ 
				?>
					<li class="mp3item">
						<a href="<?= $path ?>"><?= basename($path) ?></a> (<?= $size ?> KB)
					</li>
				<?php } ?>

				<!-- Exercise 8: Playlists (Files) -->
				<?php
					$playlists = glob("lab5/musicPHP/songs/*.m3u");
					rsort($playlists);
					foreach($playlists as $playlist) {
				?>
					<li class="playlistitem"><?= basename($playlist) ?>:
						<ul>
							<?php
								$music_lists = file($playlist);
								shuffle($music_lists);
								foreach($music_lists as $music){
									if($music[0] == "#"){
										continue;
									}
							?>
								<li><?= $music ?></li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
