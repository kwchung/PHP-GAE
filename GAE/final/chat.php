<?php
$chatService = new ChatService();
if(isset($_POST['send_msg']) && isset($_POST['msg']) && !empty($_POST['msg'])){
    $chatService->add(trim($_GET['id']), $_SESSION['userKey'], $_POST['msg']);
}
if(!isset($_GET['id'])){
?>
    <h1>開始聊天吧</h1>
<?php
}else{
?>
    <div id="chatBox" class="d-flex flex-column" style="flex: 8;">
<?php
    $chats = $chatService->getAll(trim($_GET['id']));
    foreach ($chats as $entity) {
        if($entity['CreateBy'] == $_SESSION['userKey']){
?>
        <div class="chat chat-right d-flex flex-row-reverse">
            <div class="chat-body rounded d-inline-flex float-right"><?=$entity['Content']?></div>
            <span class="time float-right"><?=$entity['CreateTime']?></span>
        </div>
<?php
        }else{
?>
        <div class="chat chat-left d-flex flex-row">
            <img src="https://www.shareicon.net/data/512x512/2016/05/29/772558_user_512x512.png" class="rounded-circle" alt="">
            <div class="chat-body rounded d-inline-flex"><?=$entity['Content']?></div>
            <span class="time float-left"><?=$entity['CreateTime']?></span>
        </div>
        <?php
        }
    }
?>
    </div>
    <form method="post" class="d-flex flex-row" style="flex: 1;">
        <div class="form-group" style="flex: 9;">
            <textarea class="form-control" name="msg" id="msg"></textarea>
        </div>
        <div class="form-group" style="flex: 1;">
            <button type="submit" class="btn btn-info" name="send_msg">SUBMIT</button>
        </div>
    </form>
<?php
}
?>