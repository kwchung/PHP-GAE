<?php
require '../../vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=./nutc106-1project-d47cdbb9a430.json');
use Google\Cloud\Datastore\DatastoreClient;
use Google\Cloud\Datastore\Entity;
use Google\Cloud\Datastore\EntityIterator;
use Google\Cloud\Datastore\Key;
use Google\Cloud\Datastore\Query\Query;

class ChatRoomService{

    function add($a, $b){
        $a = strtolower($a);
        $b = strtolower($b);
        $datastore = new DatastoreClient();
        try{
            $data = [
                'A' => $a,
                'B' => $b
            ];
            $chatRoomKey = $datastore->key('ChatRooms');
            $task = $datastore->entity($chatRoomKey, $data);
            $datastore->insert($task);

        } catch (Exception $e) {
            echo 'Caught exception: '.  $e->getMessage(). "\n";
        }
    }

    function getAll($userKey){
        $userKey = strtolower($userKey);
        $datastore = new DatastoreClient();
        $chatRoomQuery = $datastore->gqlQuery("SELECT * FROM ChatRooms WHERE A = @a", [
            'bindings' => [
                'a' => $userKey
            ]
        ]);
        $chatRoomResult = $datastore->runQuery($chatRoomQuery);
        return $chatRoomResult;
    }
}
?>