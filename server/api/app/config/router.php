<?php

$router = $di->getRouter();

// Define your routes here

$router->addGet(
    "/characters", array(
        'controller' => 'personaje',
        'action' => 'get',
    )
);

$router->addGet(
    "/characters/:int", array(
        'controller' => 'personaje',
        'action' => 'getbyid',
        'id' => 1
    )
);

$router->addGet(
    "/planets", array(
        'controller' => 'planeta',
        'action' => 'get',
    )
);

$router->addGet(
    "/planets/:int", array(
        'controller' => 'planeta',
        'action' => 'getbyid',
        'id' => 1
    )
);

$router->addGet(
    "/sagas", array(
        'controller' => 'saga',
        'action' => 'get',
    )
);

$router->addGet(
    "/sagas/:int", array(
        'controller' => 'saga',
        'action' => 'getbyid',
        'id' => 1
    )
);

$router->addGet(
    "/fusions", array(
        'controller' => 'fusion',
        'action' => 'get',
    )
);

$router->addGet(
    "/fusions/:int", array(
        'controller' => 'fusion',
        'action' => 'getbyid',
        'id' => 1
    )
);

$router->addGet(
    "/races", array(
        'controller' => 'raza',
        'action' => 'get',
    )
);

$router->addGet(
    "/races/:int", array(
        'controller' => 'raza',
        'action' => 'getbyid',
        'id' => 1
    )
);

$router->addGet(
    "/transformations", array(
        'controller' => 'transformacion',
        'action' => 'get',
    )
);

$router->addGet(
    "/transformations/:int", array(
        'controller' => 'transformacion',
        'action' => 'getbyid',
        'id' => 1
    )
);

$router->addGet(
    "/universe", array(
        'controller' => 'universo',
        'action' => 'get',
    )
);

$router->addGet(
    "/universe/:int", array(
        'controller' => 'universo',
        'action' => 'getbyid',
        'id' => 1
    )
);

$router->add(
    "/post/characters", array(
        'controller' => 'personaje',
        'action' => 'post',
    )
);


$router->add(
    "/post/races", array(
        'controller' => 'raza',
        'action' => 'post',
    )
);


$router->add(
    "/check_singin", array(
        'controller' => 'usuario',
        'action' => 'check_singin',
    )
);

$router->add(
    "/check_email", array(
        'controller' => 'usuario',
        'action' => 'check_email',
    )
);

$router->add(
    "/check_username", array(
        'controller' => 'usuario',
        'action' => 'check_username',
    )
);

$router->add(
    "/register_user", array(
        'controller' => 'usuario',
        'action' => 'register_user',
    )
);

$router->add(
    "/new_password", array(
        'controller' => 'usuario',
        'action' => 'change_password',
    )
);

$router->add(
    "/send_message", array(
        'controller' => 'contacto',
        'action' => 'getmensajes',
    )
);



$router->handle();
