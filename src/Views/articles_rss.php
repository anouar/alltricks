<?php
namespace App\Views;
require_once '../../vendor/autoload.php';

use App\Controller\ArticleAgregator;

$articleAgregator = new ArticleAgregator();
$articlesFromRss = $articleAgregator->articleByRss();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alltricks · Test</title>
   
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col mb-6">
                <a href="../../index.php"><img src="https://via.placeholder.com/150x70" alt="logo ligue 1 France" width="120px"/></a>
            </div>
            <div class="col mb-6">
                <h1><a href="../../index.php">Test Alltricks</a> </h1>
            </div>
        </div>
</nav>
<div class="container">
    <div class="text-left mt-5">
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
