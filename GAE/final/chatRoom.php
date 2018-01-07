<?php
$chatRoomService = new ChatRoomService();
$userService = new UserService();
if(isset($_POST["btn_add"]) && isset($_POST["to"])){
    $from = $_SESSION["userKey"];
    $to = $_POST["to"];
    $chatRoomService = new ChatRoomService();
    $chatRoomService->add($from, $to);
}
$chatRooms = $chatRoomService->getAll($_SESSION["userKey"]);
?>
<div class="list-group flex-column mh-100" style="height: calc(100vh - 62px); min-width: 15rem; overflow-y: scroll;">
<?php
if(is_null($chatRooms)){
?>
    <a href="#" data-toggle="modal" data-target="#contactModal" class="w-100 list-group-item list-group-item-action justify-content-between d-flex" style="min-height: 3.3rem;">
        新增好友
    </a>
<?php
}else{
    foreach ($chatRooms as $entity) {
        $user = $userService->get($entity['To']);
?>
        <a href="?id=<?=$entity->key()->pathEndIdentifier()?>" class="w-100 list-group-item list-group-item-action justify-content-between d-flex" style="min-height: 3.3rem;">
            <span><?=$user['name']?></span>
            <span class="badge badge-primary badge-pill">10</span>
        </a>
<?php
    }
}
?>
</div>
<button type="button" class="btn btn-sm btn-info rounded-circle fixed-bottom" data-toggle="modal" data-target="#contactModal">
    <i class="material-icons">add</i>
</button>
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a friend by email.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" class="form-control" id="to" name="to" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btn_add">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>