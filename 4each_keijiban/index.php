<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

mb_internal_encoding("uft8");
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
$stmt=$pdo->query("select * from 4each_keijiban");

?>

    <div class="logo"><img src="4eachblog_logo.jpg"></div>
    <header>
        <ul>
            <li>トップ</li>
               <li>プロフィール</li>
               <li>4eachについて</li>
               <li>登録フォーム</li>
               <li>問い合わせ</li>
               <li>その他</li>
           </ul>
    </header>
    <main>
        <div class="left">
            <h1>プログラミングに役立つ掲示板</h1>
            
            <form method="post" action="insert.php">
                <h2>入力フォーム</h2>

                <div>
                    <label>ハンドルネーム</label>
                    <br>
                    <input type="text" class="text" name="handlename" size="45">
                </div>

                <div>
                    <label>タイトル</label>
                    <br>
                    <input type="text" class="text" name="title" size="45">
                </div>

                <div>
                    <label>コメント</label>
                    <br>
                    <textarea cols="65" rows="7" name="comments"></textarea>
                </div>

                <div>
                     <input type="submit" class="submit" value="送信する">
                </div>
            </form>
        </div>

        <div class="right">
            <h2>人気の記事</h2>
            <ul>
                <li>PHPオススメ本</li>
                <li>PHP MyAdminの使い方</li>
                <li>今人気のエディタ Top5</li>
                <li>HTMLの基礎</li>
            </ul>

            <h2>オススメリンク</h2>
            <ul>
                <li>インターノウス株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipseのダウンロード</li>
                <li>Bracketsのダウンロード</li>
            </ul>

            <h2>カテゴリ</h2>
            <ul>
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
            </ul>
        </div>
           
        <?php

        while ($row = $stmt->fetch()){

        echo "<div class='kiji'>";
        echo "<h2>".$row['title']."</h2>";
        echo "<div class='kiji_nakami'>";
        echo $row['comments'];
        echo "<div class='handlename'>posted by".$row['handlename']."</div>";
        echo "</div>";
        echo "</div>";

        }

        ?>

        <footer>
            <p>copyrightright ©︎ internous | 4each blog the which provides A to Z about programming.</p>
        </footer>
    </main>

</body>
</html>