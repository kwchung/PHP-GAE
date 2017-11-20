<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<?php
date_default_timezone_set('Asia/Taipei');
# https://cloud.google.com/datastore/docs/reference/libraries
# https://cloud.google.com/appengine/docs/flexible/php/using-cloud-datastore

# Includes the autoloader for libraries installed with composer
require '../vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=./nutc106-1project-d47cdbb9a430.json');

# Imports the Google Cloud client library
use Google\Cloud\Datastore\DatastoreClient;
use Google\Cloud\Datastore\Entity;
use Google\Cloud\Datastore\EntityIterator;
use Google\Cloud\Datastore\Key;
use Google\Cloud\Datastore\Query\Query;

# Your Google Cloud Platform project ID
$projectId = 'nutc106-1project';

# Instantiates a client
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);

# MessageBoard
$messageBoardKey = $datastore->key('MessageBoard', trim($_GET["id"]));
$messageBoard = $datastore->lookup($messageBoardKey);

# Message
$messageQuery = $datastore->query()
    ->kind('Message')
    ->order('PostTime', Query::ORDER_DESCENDING)
    ->hasAncestor($messageBoardKey);
$messageResult = $datastore->runQuery($messageQuery);

include('../templates/head.php');
?>
  <div class="row">
  <div class="col-12">
  <nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./messageBoard.php">Message Board</a></li>
    <li class="breadcrumb-item"><a href="#"><?=$messageBoard['Name']?></a></li>
  </ol>
</nav>
  </div>
    <div class="col-3">
      <h3>新增留言</h3>
        <?php
        if(isset($_POST['submit'])){
            try{
                $transaction = $datastore->transaction();
                $data = [
                    'Title'  => $_POST['title'],
                    'Message'  => $_POST['msg'],
                    'PostTime'  => date('Y-m-d H:i:s')
                ];
                $messageKey = $datastore->key('MessageBoard', trim($_GET["id"]))
                                        ->pathElement('Message');
                # Prepares the new entity
                $task = $datastore->entity($messageKey, $data);

                # Saves the entity
                $transaction->insert($task);

                $messageBoard['Count'] = $messageBoard['Count'] + 1;
                $transaction->update($messageBoard);
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            $transaction->commit();
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          新增成功！
        </div>
<?php
  }
?>
          <form method="post">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required="required">
            </div>
            <div class="form-group">
              <label for="msg">Message</label>
              <input type="text" class="form-control" name="msg" id="msg" placeholder="Enter Message" required="required">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    <div class="col-9">
      <h3>Message<?=' ( ' . $messageBoard['Count'] . ' ) '?></h3>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Message</th>
            <th>PostTime</th>
          </tr>
        </thead>
        <tbody>
          <?php
  foreach ($messageResult as $entity) {
?>
            <tr>
              <td>
                <?=$entity->key()->pathEndIdentifier()?>
              </td>
              <td>
                <?=$entity['Title']?>
              </td>
              <td>
                <?=$entity['Message']?>
              </td>
              <td>
                <?=$entity['PostTime']?>
              </td>
            </tr>
  <?php
    }
  ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php
  include('../templates/foot.php');
?>