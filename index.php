<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP課題１</title>
    <link rel="stylesheet" href="index.css">
    <body>
        <header>
       <a href="index.php">
           <h1>Laravel News</h1>
           </a> 
   </header>
<div class="top">
       <h2>さあ、最新のニュースをシェアしましょう</h2>
</div>

<?php
// テキストファイルへの書き込み処理
if($_POST["submit"]){
    $filename="index.txt";
    $title=$_POST["title"];
    $comment =$_POST["comment"];
    $data = $title."<br>".$comment;
    
    if(!empty($title) && !empty($comment)){
        $fp =fopen($filename, "a");
        fwrite($fp ,$data . PHP_EOL);
        fclose($fp);
    }elseif(empty($title) && !empty($comment)){
        echo "・タイトルは必須です";
    }elseif(!empty($title) && empty($comment)){
        echo "・記事は必須です";
    }else{
        echo "・タイトルは必須です";
        echo "<br>";
        echo "・記事は必須です";
    }
}
?>


<!-- 新規投稿入力フォーム -->
<form method ="post" action="index.php"　onSubmit="">
        タイトル:<input type="text" name="title" >
        <br>
      　記事:<textarea name="comment" ></textarea>
      <input type="submit" name="submit" value="投稿">
</form>    

<!-- 表示処理 -->
<?php
$filename = 'index.txt';
$lines = file($filename); 
?>

<ul>
<?php foreach ($lines as $line) :?>
  <li><?php echo $line; ?></li>
<?php endforeach; ?>
</ul>


</body>
</html>