<?php
require '../../vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=./nutc106-1project-d47cdbb9a430.json');
use Google\Cloud\Datastore\DatastoreClient;
use Google\Cloud\Datastore\Entity;
use Google\Cloud\Datastore\EntityIterator;
use Google\Cloud\Datastore\Key;
use Google\Cloud\Datastore\Query\Query;

class ChatService{

    function add($roomKey, $from, $msg){
        $from = strtolower($from);
        $datastore = new DatastoreClient();
        try{
            $data = [
                'CreateBy' => $from,
                'Content' => $msg,
                'CreateTime' => date("Y-m-d H:i:s"),
                'HasRead' => false
            ];
            $chatKey = $datastore->key('ChatRooms', $roomKey)
                                ->pathElement('Chats');
            $task = $datastore->entity($chatKey, $data);
            $datastore->insert($task);
        } catch (Exception $e) {
            echo 'Caught exception: '.  $e->getMessage(). "\n";
        }
    }

    function getAll($roomKey){
        $datastore = new DatastoreClient();
        $roomKey = $datastore->key('ChatRooms', $roomKey);
        $chatQuery = $datastore->query()
            ->kind('Chats')
            ->order('CreateTime', Query::ORDER_ASCENDING)
            ->hasAncestor($roomKey);
        $chatResult = $datastore->runQuery($chatQuery);
        return $chatResult;
    }
}
?>