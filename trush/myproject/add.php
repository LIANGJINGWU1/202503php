<?php include 'includes/header.php'; ?>
<h1>添加电影资源</h1>
<form action="api/add_post.php" method="post" id = "postForm" enctype="multipart/form-data">
    <label>番号： </label><br>
    <input type = "text" name = "code" value = ""><br>
    <label>标题： </label><br>
    <input type = "text" name = "title" value = ""><br>
    <label>类型：  </label><br>
    <input type = "text" name = "tag" value = ""><br>
    <label>更新日期： </label><br>
    <input type = "date" name = "update" value = ""><br>
    <label>时长： </label><br>
    <input type = "text" name = "duration" value = ""><br>
    <label>厂商：  </label><br>
    <input type = "text" name = "studio" value = ""><br>
    <label>封面图片： </label><br>
    <input type = "file" name = "cover_img" value = "" id = ""><br>
    <label>磁力链接： </label><br>
    <input type = "text" name = "magnet_link" value = ""><br>
    <button type="submit">添加</button>
</form>
<div id = 'message'> </div>
<script src = "assets/add.js"></script>
<?php include 'includes/footer.php'; ?>
<!--点击提交，先是add_js储存表单数据，
fetch发送给后端add_post，后端执行了数据库指令，
将结果返回给addjs，-->
