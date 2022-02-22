<?php

use App\Controller\ArticleAgregator;
require_once 'App\Controller\ArticleAgregator.php';

$articleAgregator = new ArticleAgregator();
$articlesFromBd = $articleAgregator->articleByDB();

include_once 'header.php';

?>
<?php
if(!empty($articlesFromBd)){
    foreach ($articlesFromBd as $article){
?>
<div class="media mb-5">
    <div class="media-body text-left">
        <h5 class="mt-0"><?php echo  $article->name ?></h5>
        <p><?php echo  $article->sourceName ?></p>
        <div class="post-content">
            <p><?php echo  $article->content ?></p>
        </div>
        <?php
    }
}
?>

