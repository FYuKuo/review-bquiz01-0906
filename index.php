<?php
include('./api/base.php');
$do = ($_GET['do'])??'main';
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>

    <div id="main">
        <?php
			include('./front/header.php');
		?>

        <div id="ms">

            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor cent">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>
                    <?php
                    $menus = $Menu->all(['parent'=>0,'sh'=>1]);
                    foreach ($menus as $key => $menu) {
                    ?>
                    <div class="menu_out p-r cup">
                        <div class="mainmu">
                        <a style="color:#000; font-size:13px; text-decoration:none;" href="<?=$menu['href']?>">
                            <?=$menu['text']?>
                        </a>
                    </div>

                    <div class="mw p-a cup">
                        <?php
                        $menuChilds = $Menu->all(['parent'=>$menu['id']]);
                        foreach ($menuChilds as $key => $menuChild) {
                        ?>
                            <a style="color:#000; font-size:13px; text-decoration:none;" href="<?=$menuChild['href']?>">
                                <div class="mainmu2">
                                    <?=$menuChild['text']?>
                                </div>
                            </a>
                            <?php
                        }
                        ?>
                    </div>

                    </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :
                        <?=$Total->find(1)['text']?>

                    </span>
                </div>
            </div>

            <div class="di"
                style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">

                <?php
				include('./front/marquee.php');
				?>

                <div style="height:32px; display:block;"></div>

                <?php
				if(file_exists('./front/'.$do.'.php')){
					include('./front/'.$do.'.php');
				}else{
					include('./front/main.php');
				}
				?>
            </div>

            <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                <!--右邊-->
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                    onclick="lo('?do=login')">管理登入</button>
                <div style="width:89%; height:480px;" class="dbor">
                    <span class="t botli">校園映象區</span>
                    <script>
                    var nowpage = 0,
                        num = 0;

                    function pp(x) {
                        var s, t;
                        if (x == 1 && nowpage - 1 >= 0) {
                            nowpage--;
                        }
                        if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
                            nowpage++;
                        }
                        $(".im").hide()
                        for (s = 0; s <= 2; s++) {
                            t = s * 1 + nowpage * 1;
                            $("#ssaa" + t).show()
                        }
                    }
                    pp(1)
                    </script>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>

        <?php
		include('./front/footer.php');
		?>
    </div>


    <script>
    $(document).ready(function(e) {
        $(".mainmu").mouseover(
            function() {
                $(this).next(".mw").show()
            }
        )
        $(".mainmu").mouseout(
            function() {
                $(this).next(".mw").hide()
            }
        )

        $(".mw").mouseover(
            function() {
                $(this).show()
            }
        )
        $(".mw").mouseout(
            function() {
                $(this).hide()
            }
        )
    });
    </script>
</body>

</html>