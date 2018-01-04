<?php
require '../../vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=./nutc106-1project-d47cdbb9a430.json');
use Google\Cloud\Datastore\DatastoreClient;
use Google\Cloud\Datastore\Entity;
use Google\Cloud\Datastore\EntityIterator;
use Google\Cloud\Datastore\Key;
use Google\Cloud\Datastore\Query\Query;

class UserService{

    /**
     * 註冊
     *
     * @username    使用者名稱
     * @email       信箱（帳號）
     * @pwd         密碼
     * @return      是否註冊成功
     */
    function register($username, $email, $pwd){
        $email = strtolower($email);
        $datastore = new DatastoreClient();
        $key = $datastore->key('Users', $email);
        $data = [
            'name'  => $username,
            'password' => $pwd
        ];

        $task = $datastore->entity($key, $data);
        try{
            $datastore->insert($task);
            return true;
        }
        catch(ConflictException $e){
            return false;
        }
    }

    /**
     * 登入
     *
     * @email       帳號（信箱）
     * @pwd         密碼
     * @return      是否登入成功
     */
    function login($email, $pwd){
        $email = strtolower($email);
        $datastore = new DatastoreClient();
        $key = $datastore->key('Users', $email);
        $entity = $datastore->lookup($key);

        if (is_null($entity)) {
            return '帳號錯誤或不存在';
        }
        else {
            if($entity['password'] == $pwd){
                return true;
            }
            else{
                return '密碼錯誤';
            }
        }
    }
}
?>