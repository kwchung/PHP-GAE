<?php
#https://cloud.google.com/datastore/docs/reference/libraries

# Includes the autoloader for libraries installed with composer
require '../vendor/autoload.php';
putenv('GOOGLE_APPLICATION_CREDENTIALS=./nutc106-1project-d47cdbb9a430.json');

# Imports the Google Cloud client library
use Google\Cloud\Datastore\DatastoreClient;

# Your Google Cloud Platform project ID
$projectId = 'nutc106-1project';

# Instantiates a client
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);

# The Cloud Datastore key for the new entity
$taskKey = $datastore->key('Contacts');

include('../templates/head.php');
?>

<div class="row">
    <div class="col">
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
</div>

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
    $result = $datastore->upsert($task);
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  新增成功！
</div>
<?php
}
include('../templates/foot.php');
?>