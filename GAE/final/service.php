<?php
require '../../vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=./nutc106-1project-d47cdbb9a430.json');
use Google\Cloud\Datastore\DatastoreClient;
use Google\Cloud\Datastore\Entity;
use Google\Cloud\Datastore\EntityIterator;
use Google\Cloud\Datastore\Key;
use Google\Cloud\Datastore\Query\Query;
class Service{
    private static $projectId;
    function __constructor(){
        $this->projectId = 'nutc106-1project';
    }

    function register($username, $email, $pwd){
        $datastore = new DatastoreClient([
            'projectId' => $projectId
        ]);
        $users_query = $datastore->gqlQuery('SELECT * FROM Users WHERE email = @email', [
            'bindings'=>[
                'email' =>$email
            ]
        ]);
        $result = $datastore->runQuery($users_query);

        if (!is_null($result)) {
            return false;
        }
        else{
            $data = [
                'name'  => $username,
                'email' => $email,
                'password' => $pwd
            ];

            $taskKey = $datastore->key('Users');
            $task = $datastore->entity($taskKey, $data);
            $datastore->upsert($task);
            return true;
        }
    }
}
?>