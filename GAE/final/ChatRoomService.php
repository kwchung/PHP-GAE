<?php
require '../../vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=./nutc106-1project-d47cdbb9a430.json');
use Google\Cloud\Datastore\DatastoreClient;
use Google\Cloud\Datastore\Entity;
use Google\Cloud\Datastore\EntityIterator;
use Google\Cloud\Datastore\Key;
use Google\Cloud\Datastore\Query\Query;

class ChatRoomService{
    function add($from, $to){
        $from = strtolower($from);
        $to = strtolower($to);
        $datastore = new DatastoreClient();
        try{
            $transaction = $datastore->transaction();
            $data = [
                'To' => $to
            ];
            $chatRoomKey = $datastore->key('Users', $from)
                                    ->pathElement('ChatRooms');
            $task = $datastore->entity($chatRoomKey, $data);
            $transaction->insert($task);

            $data = [
                'To' => $from
            ];
            $chatRoomKey = $datastore->key('Users', $to)
                                    ->pathElement('ChatRooms');
            $task = $datastore->entity($chatRoomKey, $data);
            $transaction->insert($task);

            $transaction->commit();
        } catch (Exception $e) {
            echo 'Caught exception: '.  $e->getMessage(). "\n";
        }
    }

    function getAll($userKey){
        $userKey = strtolower($userKey);
        $datastore = new DatastoreClient();
        $userKey = $datastore->key('Users', $userKey);
        $chatRoomQuery = $datastore->query()
            ->kind('ChatRooms')
            ->hasAncestor($userKey);
        $chatRoomResult = $datastore->runQuery($chatRoomQuery);
        return $chatRoomResult;
    }
}
?>