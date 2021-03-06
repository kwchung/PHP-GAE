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

# The Cloud Datastore key for the new entity
$taskKey = $datastore->key('Contacts');
$contactsQuery = $datastore->query()
->kind('Contacts')
->order('name', Query::ORDER_ASCENDING)
->order('phone', Query::ORDER_DESCENDING);
$result = $datastore->runQuery($contactsQuery);

if(isset($_GET["delete"])){
  $deleteId =  trim($_GET["delete"]);
  $key = $datastore->key('Contacts', $deleteId);
  $datastore->delete($key);
  header("Location:./contacts.php");
}

include('../templates/head.php');
?>
  <div class="row">
    <div class="col-3">
      <h3>新增聯絡人</h3>
      <?php
  if(isset($_POST['submit'])){
    $data = [
      'name'  => $_POST['name'],
      'phone' => $_POST['phone'],
      'email' => $_POST['email']
    ];

    # Prepares the new entity
    $task = $datastore->entity($taskKey, $data);

    # Saves the entity
    $datastore->upsert($task);
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
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required="required">
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="required">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter phone" required="required">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    <div class="col-9">
      <h3>Contacts（聯絡人列表）</h3>
      <p>Order: Name(asc)、Phone(desc)</p>
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Active</th>
          </tr>
        </thead>
        <tbody>
          <?php
  foreach ($result as $entity) {
?>
            <tr>
              <td>
                <?=$entity->key()->pathEndIdentifier()?>
              </td>
              <td>
                <?=$entity['name']?>
              </td>
              <td>
                <?=$entity['phone']?>
              </td>
              <td>
                <?=$entity['email']?>
              </td>
              <td>
                <div class="btn-group" role="group">
                  <button onclick="window.location='./detail.php?id=<?=$entity->key()->pathEndIdentifier();?>'" type="button" class="btn btn-primary">修改</button>
                  <button type="button" onclick="window.location='./contacts.php?delete=<?=$entity->key()->pathEndIdentifier();?>'" name="delete"
                    class="btn btn-danger">刪除</button>
                </div>
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