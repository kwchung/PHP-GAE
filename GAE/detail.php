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
$transaction = $datastore->transaction();
# The Cloud Datastore key for the new entity
$key = $datastore->key('Contacts', trim($_GET["id"]));
$entity = $transaction->lookup($key);

include('../templates/head.php');
?>
    <div class="row">
        <div class="col">
            <h3>修改聯絡人</h3>
            <?php
            if(isset($_POST['submit'])){
                $entity['name' ] = $_POST['name'];
                $entity['phone'] = $_POST['phone'];
                $entity['email'] = $_POST['email'];

                # Saves the entity
                $transaction->upsert($entity);
                $transaction->commit();
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    修改成功！
                </div>
                <?php
            }
            ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="id">Id</label>
                            <input type="text" class="form-control" name="id" id="id" value="<?=$entity->key()?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?=$entity['name']?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?=$entity['email']?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone" value="<?=$entity['phone']?>" required="required">
                        </div>
                        <button type="button" onclick="window.location='./contacts.php'" class="btn btn-primary">回上一頁</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
        </div>
    </div>

    <?php

    include('../templates/foot.php');
?>