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
    "/universes", array(
        'controller' => 'universo',
        'action' => 'get',
    )
);

$router->addGet(
    "/universes/:int", array(
        'controller' => 'universo',
        'action' => 'getbyid',
        'id' => 1
    )
);

$router->addGet(
    "/tables", array(
        'controller' => 'tables',
        'action' => 'get'
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


$router->add(
    "/transformation_character", array(
        'controller' => 'Transformacionpersonaje',
        'action' => 'get'
    )
);

$router->add(
    "/transformation_character/:int/:int", array(
        'controller' => 'Transformacionpersonaje',
        'action' => 'getbyid',
        'id' => 1,
        'id2' => 2
    )
);

$router->add(
    "/transformation_fusion", array(
        'controller' => 'Transformacionfusion',
        'action' => 'get'
    )
);

$router->add(
    "/transformation_fusion/:int/:int", array(
        'controller' => 'Transformacionfusion',
        'action' => 'getbyid',
        'id' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_character", array(
        'controller' => 'Aparicionpersonaje',
        'action' => 'get'
    )
);

$router->add(
    "/apparition_character/:int/:int", array(
        'controller' => 'Aparicionpersonaje',
        'action' => 'getbyid',
        'id' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_race", array(
        'controller' => 'Aparicionraza',
        'action' => 'get'
    )
);

$router->add(
    "/apparition_race/:int/:int", array(
        'controller' => 'Aparicionraza',
        'action' => 'getbyid',
        'id' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_transformation", array(
        'controller' => 'Apariciontransformacion',
        'action' => 'get'
    )
);

$router->add(
    "/apparition_transformation/:int/:int", array(
        'controller' => 'Apariciontransformacion',
        'action' => 'getbyid',
        'id' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_fusion", array(
        'controller' => 'Aparicionfusion',
        'action' => 'get'
    )
);

$router->add(
    "/apparition_fusion/:int/:int", array(
        'controller' => 'Aparicionfusion',
        'action' => 'getbyid',
        'id' => 1,
        'id2' => 2
    )
);

$router->add(
    "/characters/post", array(
        'controller' => 'Personaje',
        'action' => 'post'
    )
);

$router->add(
    "/characters/put/:int", array(
        'controller' => 'Personaje',
        'action' => 'put',
        'id' => 1
    )
);

$router->add(
    "/characters/delete/:int", array(
        'controller' => 'Personaje',
        'action' => 'delete',
        'id' => 1
    )
);

$router->add(
    "/races/post", array(
        'controller' => 'Raza',
        'action' => 'post'
    )
);

$router->add(
    "/races/put/:int", array(
        'controller' => 'Raza',
        'action' => 'put',
        'id' => 1
    )
);

$router->add(
    "/races/delete/:int", array(
        'controller' => 'Raza',
        'action' => 'delete',
        'id' => 1
    )
);

$router->add(
    "/transformations/post", array(
        'controller' => 'Transformacion',
        'action' => 'post'
    )
);

$router->add(
    "/transformations/put/:int", array(
        'controller' => 'Transformacion',
        'action' => 'put',
        'id' => 1
    )
);

$router->add(
    "/transformations/delete/:int", array(
        'controller' => 'Transformacion',
        'action' => 'delete',
        'id' => 1
    )
);

$router->add(
    "/fusions/post", array(
        'controller' => 'Fusion',
        'action' => 'post'
    )
);

$router->add(
    "/fusions/put/:int", array(
        'controller' => 'Fusion',
        'action' => 'put',
        'id' => 1
    )
);

$router->add(
    "/fusions/delete/:int", array(
        'controller' => 'Fusion',
        'action' => 'delete',
        'id' => 1
    )
);

$router->add(
    "/planets/post", array(
        'controller' => 'Planeta',
        'action' => 'post'
    )
);

$router->add(
    "/planets/put/:int", array(
        'controller' => 'Planeta',
        'action' => 'put',
        'id' => 1
    )
);

$router->add(
    "/planets/delete/:int", array(
        'controller' => 'Planeta',
        'action' => 'delete',
        'id' => 1
    )
);

$router->add(
    "/universes/post", array(
        'controller' => 'Universo',
        'action' => 'post'
    )
);

$router->add(
    "/universes/put/:int", array(
        'controller' => 'Universo',
        'action' => 'put',
        'id' => 1
    )
);

$router->add(
    "/universes/delete/:int", array(
        'controller' => 'Universo',
        'action' => 'delete',
        'id' => 1
    )
);

$router->add(
    "/sagas/post", array(
        'controller' => 'Saga',
        'action' => 'post'
    )
);

$router->add(
    "/sagas/put/:int", array(
        'controller' => 'Saga',
        'action' => 'put',
        'id' => 1
    )
);

$router->add(
    "/sagas/delete/:int", array(
        'controller' => 'Saga',
        'action' => 'delete',
        'id' => 1
    )
);

$router->add(
    "/transformation_character/post", array(
        'controller' => 'Transformacionpersonaje',
        'action' => 'post'
    )
);

$router->add(
    "/transformation_character/put/:int/:int", array(
        'controller' => 'Transformacionpersonaje',
        'action' => 'put',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/transformation_character/delete/:int/:int", array(
        'controller' => 'Transformacionpersonaje',
        'action' => 'delete',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/transformation_fusion/post", array(
        'controller' => 'Transformacionfusion',
        'action' => 'post'
    )
);

$router->add(
    "/transformation_fusion/put/:int/:int", array(
        'controller' => 'Transformacionfusion',
        'action' => 'put',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/transformation_fusion/delete/:int/:int", array(
        'controller' => 'Transformacionfusion',
        'action' => 'delete',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_fusion/post", array(
        'controller' => 'Aparicionfusion',
        'action' => 'post'
    )
);

$router->add(
    "/apparition_fusion/put/:int/:int", array(
        'controller' => 'Aparicionfusion',
        'action' => 'put',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_fusion/delete/:int/:int", array(
        'controller' => 'Aparicionfusion',
        'action' => 'delete',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_character/post", array(
        'controller' => 'Aparicionpersonaje',
        'action' => 'post'
    )
);

$router->add(
    "/apparition_character/put/:int/:int", array(
        'controller' => 'Aparicionpersonaje',
        'action' => 'put',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_character/delete/:int/:int", array(
        'controller' => 'Aparicionpersonaje',
        'action' => 'delete',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_transformation/post", array(
        'controller' => 'Apariciontransformacion',
        'action' => 'post'
    )
);

$router->add(
    "/apparition_transformation/put/:int/:int", array(
        'controller' => 'Apariciontransformacion',
        'action' => 'put',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_transformation/delete/:int/:int", array(
        'controller' => 'Apariciontransformacion',
        'action' => 'delete',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_race/post", array(
        'controller' => 'Aparicionraza',
        'action' => 'post'
    )
);

$router->add(
    "/apparition_race/put/:int/:int", array(
        'controller' => 'Aparicionraza',
        'action' => 'put',
        'id1' => 1,
        'id2' => 2
    )
);

$router->add(
    "/apparition_race/delete/:int/:int", array(
        'controller' => 'Aparicionraza',
        'action' => 'delete',
        'id1' => 1,
        'id2' => 2
    )
);


$router->handle();
