<?php require('../includes/config.php'); ?>
<rss version="2.0">
  <channel>
    <title>Blog - Daniel Webster FLL Tournament</title>
    <link>http://fll-tournament.team2342.org/blog/</link>
    <description>Blog - Daniel Webster FLL Tournament is RSS Feed</description>
    <language>en-us</language>
<?php
	try {
 
		$stmt = $db->query('SELECT postID, postTitle, postCont, postDate FROM blog_posts ORDER BY postID DESC');
		while($row = $stmt->fetch()){
			
			echo '<item>';
				echo '<title>'.$row['postTitle'].'</title>';
				echo '<pubDate>'.date('jS M Y H:i:s', strtotime($row['postDate'])).' EST</pubDate>';
				echo '<link>http://fll-tournament.team2342.org/blog/viewpost.php?id='.$row['postID'].'</link>';
				echo '<description><![CDATA['.$row['postCont'].']]></description>';
			echo '</item>';
 
		}
 
	} catch(PDOException $e) {
	    echo $e->getMessage();
	}
?>
  </channel>
</rss>