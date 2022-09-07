<!--正中央-->
<?php
        $num = $News->math('COUNT','id',['sh'=>1]);
        $limit = 5;
        $pages = ceil($num/$limit);
        $page = ($_GET['page'])??1;
        if($page <=0 || $page > $pages){
            $page = 1;
        }
        $start = ($page-1)*$limit;
        $limitSql = " LIMIT $start,$limit";        
        $news = $News->all(['sh'=>1],$limitSql);
?>

<span class="t botli">
    <div>
        更多最新消息區
    </div>

</span>

<ol class="sswww" style="list-style-type:decimal;" start="<?=$start+1?>">
    <?php
        foreach ($news as $key => $new) {
        ?>
    <li>
        <?=mb_substr($new['text'],0,30)?>
		<div class="all" style="display: none;"><?=$new['text']?></div>
    </li>
    <?php
        }
        ?>
</ol>

<div class="page cent">
    <?php
            if($page > 1){
            ?>
    <a href="?do=<?=$do?>&page=<?=$page-1?>">&lt;</a>
    <?php
            }
            for ($i=1; $i <= $pages ; $i++) { 
            ?>
    <a href="?do=<?=$do?>&page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
    <?php
            }
            if($page < $pages){
            ?>
    <a href="?do=<?=$do?>&page=<?=$page+1?>">&gt;</a>
    <?php
            }
            ?>
</div>

<div id="alt"
    style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
$(".sswww li").hover(
    function() {
        $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
            "top": $(this).offset().top - 30
        })
        $("#alt").show()
    }
)
$(".sswww li").mouseout(
    function() {
        $("#alt").hide()
    }
)
</script>