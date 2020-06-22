<?php
$url = "";
function crawl_page($url,$depth=2)
{
    if($depth>0)
    {
        $html = file_get_contents($url);
        preg_match_all('~<a.*?href="(.*?)".*?>~',$html,$matches);
        foreach($matches[1] as $newurl)
        {
            crawl_page($newurl,$depth-1);
        }
        file_put_contents('results.html',"\n\n".$html."\n\n",FILE_APPEND);
    }
}
// crawl_page('https://www.foxsports.com/soccer/scores',2);

crawl_page($url, 2)
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="text" name="" id="" value="<?php echo $url ?>">
    </form>
</body>
</html>