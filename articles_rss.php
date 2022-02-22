<?php

use App\Controller\ArticleAgregator;
require_once 'App\Controller\ArticleAgregator.php';
$articleAgregator = new ArticleAgregator();
$articlesFromRss = $articleAgregator->articleByRss();

include_once 'header.php';
?>
<?php
if(!empty($articlesFromRss)){

    $site = $articlesFromRss->channel->title;
    $sitelink = $articlesFromRss->channel->link;

    echo "<h2>".$site."</h2>";
    foreach ($articlesFromRss->channel->item as $item) {
        ?>
        <div class="media mb-5">
            <div class="media-body text-left">
                <h5 class="mt-0"><a class="feed_title" href="<?php echo $item->link; ?>"><?php echo  $item->title; ?></a></h5>
                <span><?php echo date('D, d M Y',strtotime($item->pubDate)); ?></span>
                <div class="post-content">
                    <?php echo implode(' ', array_slice(explode(' ', $item->description), 0, 20)) . "..."; ?> <a href="<?php echo $item->link; ?>">Voir plus</a>
                </div>
            </div>
        </div>
        <?php
    }
}

?>
