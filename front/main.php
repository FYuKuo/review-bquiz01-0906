<div style="width:100%; padding:2px; height:290px;">
    <div id="mwww" loop="true" style="width:100%; height:100%;">
        <div style="width:99%; height:100%; position:relative;" class="cent"></div>
    </div>
</div>

<!--正中央-->
<script>
var lin = new Array();
<?php
$mvims = $Mvim->all(['sh'=>1]);
foreach ($mvims as $key => $mvim) {
    ?>
lin.push('./img/<?=$mvim['img']?>');
<?php
}
?>

var now = 0;
ww();
if (lin.length > 1) {
    setInterval("ww()", 3000);
    now = 1;
}

function ww() {
    $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
    //$("#mwww").attr("src",lin[now])
    now++;
    if (now >= lin.length)
        now = 0;
}
</script>

<div
    style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
    <span class="t botli d-f " style="justify-content: space-between;">
        <div>
            最新消息區
        </div>
        <div>
            <?php
            if($News->math('COUNT','id',['sh'=>1]) > 5){
            ?>
                <a href="?do=news">
                    More...
                </a>
            <?php
            }
            ?>
        </div>
    </span>

    <ul class="ssaa" style="list-style-type:decimal;">
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
        foreach ($news as $key => $new) {
        ?>
        <li>
            <?=mb_substr($new['text'],0,10)?>
            <div class="all" style="display: none;"><?=$new['text']?></div>
        </li>
        <?php
        }
        ?>
    </ul>

    <div id="altt"
        style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
    </div>
    <script>
    $(".ssaa li").hover(
        function() {
            $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
            $("#altt").show()
        }
    )
    $(".ssaa li").mouseout(
        function() {
            $("#altt").hide()
        }
    )
    </script>
</div>