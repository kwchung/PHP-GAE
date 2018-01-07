<?php
$chatService = new ChatService();
if(isset($_POST['send_msg'])){
    $chatService->add(trim($_GET['id']), $_SESSION['userKey'], $_POST['msg']);
}
if(isset($_GET['id'])){
?>
    <div id="chat" class="border border-danger d-flex flex-column" style="flex: 8;">
<?php
    $chats = $chatService->getAll(trim($_GET['id']));
    foreach ($chats as $entity) {
        if($entity['CreateBy'] == $_SESSION['userKey']){
?>
        <div class="media media-right" >
            <div class="media-body rounded d-inline-flex"><?=$entity['Content'].'-----'.$entity['CreateTime']?></div>
        </div>
<?php
        }else{
?>
        <div class="media media-left" >
            <img src="https://www.shareicon.net/data/512x512/2016/05/29/772558_user_512x512.png" class="rounded-circle" alt="">
            <div class="media-body rounded"><?=$entity['Content'].'-----'.$entity['CreateTime']?></div>
        </div>
        <?php
        }
    }
?>
    </div>
    <form method="post" style="flex: 1;">
        <div class="form-group">
            <textarea class="form-control" name="msg" id="msg"></textarea>
        </div>
        <button type="submit" class="btn btn-info" name="send_msg">SUBMIT</button>
    </form>
<?php
}else{
?>
    <h1>開始聊天吧</h1>
<?php
}
?>
