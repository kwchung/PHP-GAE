<?php
$routes = array(
    array(
        "key" => "行動服務",
        "paths" => array(
            array(
                "key" => "Profile",
                "path" => "/GAE/profile.php",
                "date" => ""
            ),
            array(
                "key" => "Form",
                "path" => "/GAE/form.php",
                "date" => ""
            ),
            array(
                "key" => "Cloud Datastore",
                "path" => "/GAE/contacts.php",
                "date" => "2017-10-16"
            )
        )
    ),
    array(
        "key" => "雲端服務技術",
        "paths" => array(
            array(
                "key" => "Google SignIn",
                "path" => "/JJ/signin.php",
                "date" => "2017-10-06"
            ),
            array(
                "key" => "Mid",
                "path" => "/JJ/mid.php",
                "date" => "2017-11-01"
            )
        )
    ),
    array(
        "key" => "PHP程式設計",
        "paths" => array()
    )
)
?>
    <body style="padding-top: 4.5rem; font-family:Microsoft JhengHei;">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="/">GCP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <?php
                            foreach ($routes as $key => $value) {
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#!" id="navbarRoute" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$value["key"]?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarRoute">
                                <?php
                                    foreach ($value["paths"] as $key => $value) {
                                ?>
                                    <a class="dropdown-item" href="<?=$value["path"]?>">
                                        <?=$value["key"]?>
                                    </a>
                                <?php
                                    }
                                ?>
                                </div>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">