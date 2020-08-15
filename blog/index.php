<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0'">
    <link rel="stylesheet" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="/stylesheet.css">
    <title>Blog - Daniel Webster FLL Tournament</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50247309-2', 'team2342.org');
  ga('send', 'pageview');

</script>
  </head>
  <body>
    <div id="header">
	  <a href="http://www.firstlegoleague.org" target="_blank"><img src="/images/fll.png" alt="FLL Logo" id="fll-logo"></a>
	  <h1><a href="/">Daniel Webster FLL Tournament</a></h1>
	</div>
	<div id="menu">
	  <nav>
	    <ul>
		  <li><a href="/">Home</a></li>
		  <li><a href="/blog/" id="page-here">Blog</a></li>
		  <li><a href="/sponsors">Sponsors</a></li>
		  <li><a href="/contact">Contact</a></li>
		  <li><a href="/blog/viewpost.php?id=10">Volunteer</a></li>
		</ul>
	  </nav>
	</div>
	<div id="content">
	  <p style="float:right"><a href="feed/" target="_blank">RSS Feed</a></p>
	  <h1>Blog</h1>
	  <p>&nbsp;</p>
<?php
	try {
 
		$stmt = $db->query('SELECT postID, postTitle, postCont, postDate FROM blog_posts ORDER BY postID DESC');
		while($row = $stmt->fetch()){
			
			echo '<div>';
				echo '<h2><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h2>';
				echo '<p>&nbsp;</p>';
				echo '<p><small style="color:gray;">Posted on '.date('M jS Y H:i', strtotime($row['postDate'])).'</small></p>';
				echo '<p>&nbsp;</p>';
				echo '<p>'.$row['postCont'].'</p>';
				echo '<p>&nbsp;</p>';
			echo '</div>';
 
		}
 
	} catch(PDOException $e) {
	    echo $e->getMessage();
	}
?>
	</div>
  </body>
</html>