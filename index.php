<?php
if(file_exists("data/config.xml"))
{
	$config = simplexml_load_file("data/config.xml");

	$social = $config->social;
	$general = $config->general;
}
else
{
	die("Error: Configuration file not found. Are you sure you followed the installation instructions?");
}
define("IMAGE_BASE", "data/img/");

include("handlers/gallery.php");
$gallery = new Gallery();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $general->siteName." - ".$general->siteTag; ?></title>
	<meta charset="utf-8">
	<meta name="author" content="<?php echo $general->siteOwner; ?>">
	<meta name="description" content="Photo Gallery powered by Arcade; http://github.com/trickmod/arcade/"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="resources/css/reset.css">
	<link rel="stylesheet" type="text/css" href="resources/css/main.css">
</head>
<body>

	<header>
		<div class="logo">
			<?php echo $general->siteName; ?>
		</div>

		<div id="menu_icon"></div>
		<nav>
			<ul>
				<li><a href="./" class="selected">Home</a></li>
				<li>
					<a href="#" class="expandCat">Categories</a>
					<ul id="categories">
						<li><a href="?cat=all">View All</a></li>
						<?php
						//$categories = scandir('data/img');
						$categories = $gallery->fetchCategories();

						foreach($categories as $category)
						{
						  echo '<li><a href="?cat='.$category.'">'.$category.'</a></li>';
						}
						?>
					</ul>
				</li>
			</ul>
		</nav>

		<div class="footer clearfix">
			<ul class="social clearfix">
				<?php
				echo (!empty($social->facebook) ? '<li><a href="http://facebook.com/'.$social->facebook.'" data-title="Facebook"><i class="fa fa-facebook"></i></a></li>' : '');
				echo (!empty($social->googleplus) ? '<li><a href="http://plus.google.com/u/0/'.$social->googleplus.'" data-title="Google+"><i class="fa fa-google-plus"></i></a></li>' : '');
				echo (!empty($social->behance) ? '<li><a href="http://behance.net/'.$social->behance.'" data-title="Behance"><i class="fa fa-behance"></i></a></li>' : '');
				echo (!empty($social->twitter) ? '<li><a href="http://twitter.com/'.$social->twitter.'" data-title="Twitter"><i class="fa fa-twitter"></i></a></li>' : '');
				echo (!empty($social->instagram) ? '<li><a href="http://instagram.com/'.$social->instagram.'" data-title="Instagram"><i class="fa fa-instagram"></i></a></li>' : '');
				echo (!empty($social->dribbble) ? '<li><a href="http://dribbble.com/'.$social->dribbble.'" data-title="Dribbble"><i class="fa fa-dribbble"></i></a></li>' : '');
				echo (!empty($social->fhpx) ? '<li><a href="http://500px.com/'.$social->fhpx.'" data-title="500px"><i class="fa fa-500px"></i></a></li>' : '');
				echo (!empty($social->github) ? '<li><a href="http://github.com/'.$social->github.'" data-title="GitHub"><i class="fa fa-dribbble"></i></a></li>' : '');
				echo (!empty($social->lastfm) ? '<li><a href="https://last.fm/user/'.$social->lastfm.'" data-title="Last.fm"><i class="fa fa-lastfm"></i></a></li>' : '');
				echo (!empty($social->flickr) ? '<li><a href="http://flickr.com/photos/'.$social->flickr.'" data-title="Flickr"><i class="fa fa-flickr"></i></a></li>' : '');
				echo (!empty($social->twitch) ? '<li><a href="http://twitch.tv/'.$social->twitch.'" data-title="Twitch"><i class="fa fa-twitch"></i></a></li>' : '');
				echo (!empty($social->youtube) ? '<li><a href="http://youtube.com/'.$social->youtube.'" data-title="YouTube"><i class="fa fa-youtube"></i></a></li>' : '');
				?>
			</ul>

			<div class="rights">
				<p>Copyright © <?php echo date('Y')." ".$general->siteOwner; ?></p>
				<p>Powered by <a href="http://github.com/trickmod/arcade">Arcade</a></p>
			</div>
		</div >
	</header>

	<section class="main clearfix">
		<?php
		$allCats = array();

		if(isset($_GET['cat']))
		{
			if($_GET['cat'] == "all")
			{
				$catsToDisplay = $gallery->fetchCategories();
			}
			else
			{
				$catsToDisplay = explode(",", $_GET['cat']);
			}

			foreach($catsToDisplay as $catToDisplay)
			{
				foreach($gallery->importFromDir($catToDisplay) as $image)
				{
					echo '
				<div class="thumb">
					<a class="popup" href="'.$image.'">
						<img src="'.$image.'" class="media" alt=""/>
					</a>
				</div>
					';
				}
			}
		}
		else
		{
			echo "No image categories selected to display.";
		}

		?>
	</section>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/main.js"></script>
    <script type="text/javascript" src="resources/js/jquery.magnific-popup.min.js"></script>
</body>
</html>
