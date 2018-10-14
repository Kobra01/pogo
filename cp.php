<?php
if (isset($_GET['r'])) {
    
} else {
    header("Location: index.html");
}


if ($_GET['r'] != "" and $_GET['a'] != "") {
    if (isset($_GET['st']) and $_GET['st'] != "") {
        $start = "Schlüpft: ".$_GET['st']." Uhr";
    }elseif ($_GET['end_in'] != "") {
        $start = "Bereits geschlüpft";
    }else {
        header("Location: index.html");
    }
}else {
    header("Location: index.html");
}

/* --------------------------- */

$nl = "%0D%0A";
include_once dirname(__FILE__).'/arena.php';

$link = constant($_GET['a']);

if ($_GET['st'] != "") {
    $start_time = strtotime($_GET['st']);
    $meet_time = date("G:i", strtotime("+25 minutes", $start_time));
    $end_time = date("G:i", strtotime("+45 minutes", $start_time));
}else {
    $start_time = strtotime("+2 hours", time());
    $add = "+".$_GET['end_in']." minutes";
    $add2 = "+".($_GET['end_in'] - 7)." minutes";
    $end_time = date("G:i", strtotime($add, $start_time));
    $meet_time = date("G:i", strtotime($add2, $start_time));
}


/* ------------- Create WA Link -------------- */

if (isset($_GET['submit']) and $_GET['submit'] == "Info") {
    if ($_GET['st'] != "") {
        $start = $_GET['st']." Uhr";
        $link_post = "smooth-gaming.eu/pogoraid/cp.php?r=".rawurlencode($_GET['r'])."&a=".rawurlencode($_GET['a'])."&st=".rawurlencode($_GET['st']);
    }
    $watextl1 = rawurlencode($start." *".$_GET['r']."*").$nl;
    $watextl2 = rawurlencode("🏛 ".$_GET['a']).$nl;
    $watextl3 = rawurlencode("".$link_post).$nl;
    $watextl4 = rawurlencode("");
    $watextl5 = rawurlencode("");
    $watextl6 = rawurlencode("");
    $watextl7 = rawurlencode("");
    $watextl8 = rawurlencode(""); 
    $watextl9 = rawurlencode("");
    $watextl10 = rawurlencode("");
    $watextl11 = rawurlencode("");
    $watextl12 = rawurlencode("");
    $watextl13 = rawurlencode("");
    $watextl14 = rawurlencode("");
} else {
    $watextl1 = rawurlencode("smooth-gaming.eu/pogoraid").$nl;
    $watextl2 = rawurlencode("").$nl;
    $watextl3 = rawurlencode("*".$_GET['r']."*").$nl;
    $watextl4 = rawurlencode($start).$nl;
    $watextl5 = rawurlencode("").$nl;
    $watextl6 = rawurlencode("Arena 🏛 ".$_GET['a']).$nl;
    $watextl7 = rawurlencode("").$nl;
    $watextl8 = rawurlencode("Standort📍 ".$link).$nl; 
    $watextl9 = rawurlencode("").$nl;
    $watextl10 = rawurlencode("Treff⏳: ".$meet_time." Uhr").$nl;
    $watextl11 = rawurlencode("").$nl;
    $watextl12 = rawurlencode("Ende⌛: ".$end_time." Uhr").$nl;
    $watextl13 = rawurlencode("").$nl;
    $watextl14 = rawurlencode("👥").$nl;
}

$finalwatext = $watextl1.$watextl2.$watextl3.$watextl4.$watextl5.$watextl6.$watextl7.$watextl8.$watextl9.$watextl10.$watextl11.$watextl12.$watextl13.$watextl14;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PoGo Raid Post Generator</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css"/>
    </head>
    <body>
        
        <div id="wrapper">

            <h1>Pokemon Go</h1>

            <h2>Post:</h2>

            <div class="post">
                <p><?php 
                    if (isset($_GET['submit']) and $_GET['submit'] == "Info" and $_GET['st'] != "") {
                        echo $start." <b>".$_GET['r']."</b><br>";
                        echo $_GET['a']."<br>";
                        echo '<a href=http://'.$link_post.'>'.$link_post."</a><br>";
                    } elseif (isset($_GET['submit']) and $_GET['submit'] == "Info") {
                        echo "Achtung: [INFO] geht nur mit genauer Startzeit.";
                        echo "<br>";
                    } else {
                        echo '<a href="http://smooth-gaming.eu/pogoraid">smooth-gaming.eu/pogoraid</a><br>';
                        echo "<br>";
                        echo "<b>".$_GET['r']."</b><br>";
                        echo $start."<br>";
                        echo "<br>";
                        echo "Arena🏛 ".$_GET['a']."<br>";
                        echo "<br>";
                        echo 'Standort📍 <a href="'.$link.'">'.$link.'</a><br>';
                        echo "<br>";
                        echo "Treff⏳: ".$meet_time." Uhr <br>";
                        echo "<br>";
                        echo "Ende⌛: ".$end_time." Uhr <br>";
                        echo "<br>";
                        echo "👥<br>";
                    }

                ?></p>
            </div>

            <?php
                if (isset($_GET['submit']) and $_GET['submit'] == "Info" and $_GET['st'] != "") {
                    echo '<a class="btn_wa" href="https://wa.me/?text='.$finalwatext.'">'.'Whatsapp'.'</a>'; 
                } elseif (isset($_GET['submit']) and $_GET['submit'] == "Info") {
                    
                } else {
                    echo '<a class="btn_wa" href="https://wa.me/?text='.$finalwatext.'">'.'Whatsapp'.'</a>';
                }
            ?>

            <div id="footer">
                <p class="info">powered by <a href="smooth-gaming.eu">smooth-gaming.eu</a></p>
                <p class="pp">Es werden keinerlei Daten gespeichert.</p>
            </div>
            
        </div>

    </body>
</html>