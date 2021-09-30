<?php
    
    session_start();

    // system users
    $app_users = array(
        array('id' => 1, 'email' => 'adm@adm.com', 'pw' => 'adm123', 'profile_id' => 1),
        array('id' => 2, 'email' => 'user@user.com', 'pw' => 'user123', 'profile_id' => 2),
        array('id' => 3, 'email' => 'user2@user2.com', 'pw' => 'user123', 'profile_id' => 2)
    );

    // variable to verify the user has been authenticated and its type
    $user_authenticated = false;
    $user_id = null;
    $user_profile_id = null;

    // user profiles (adm or common user)
    $profiles = array(1 => 'Staff', 2 => 'Common');

    // verify
    foreach($app_users as $user) {
        if($user['email'] == $_POST['email'] && $user['pw'] == $_POST['pw']) {
            $user_authenticated = true;
            $user_id = $user['id'];
            $user_profile_id = $user['profile_id'];
        };
    };

    // result
    if ($user_authenticated) {
        echo 'Authenticated!';
        $_SESSION['authenticated'] = 'Y';
        $_SESSION['id'] = $user_id;
        $_SESSION['profile_id'] = $user_profile_id;
        header('Location: home.php');
    } else {
        header('Location: index.php?login=error');
        $_SESSION['authenticated'] = 'N';
    };

?>