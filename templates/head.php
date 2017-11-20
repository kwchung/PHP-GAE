<?php
$routes = array(
    array(
        "key" => "行動服務",
        "paths" => array(
            array(
                "key" => "Profile",
                "path" => "/GAE/profile.php",
                "description" => "自我介紹"
            ),
            array(
                "key" => "Form",
                "path" => "/GAE/form.php",
                "description" => "Get、Post 練習"
            ),
            array(
                "key" => "Cloud Datastore",
                "path" => "/GAE/contacts.php",
                "description" => "Cloud Datastore CRUD 練習"
            ),
            array(
                "key" => "Message Board",
                "path" => "/GAE/messageBoard.php",
                "description" => "Transaction練習"
            )
        )
    ),
    array(
        "key" => "雲端服務技術",
        "paths" => array(
            array(
                "key" => "Google SignIn",
                "path" => "/JJ/signin.php",
                "description" => "Google SignIn練習"
            ),
            array(
                "key" => "Mid",
                "path" => "/JJ/mid.php",
                "description" => "GoogleAPIs（signin、calendar、map、gmail）"
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
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark justify-content-between">
                <a class="navbar-brand" href="/">
                    <img src="http://via.placeholder.com/30x30" width="30" height="30" class="align-top" alt="avatar" id="avatar-img" style="display: none;">
                    GCP
                </a>
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
                    <button type="button" id="authorize-button" onclick="handleAuthClick()" class="btn btn-outline-success" style="display: none;">Sign In</button>
                    <button type="button" id="signout-button" onclick="handleSignoutClick()" class="btn btn-outline-success" style="display: none;">Sign Out</button>
                </div>
            </nav>
            <div class="container-fluid">