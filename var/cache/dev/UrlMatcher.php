<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/client' => [[['_route' => 'client_index', '_controller' => 'App\\Controller\\ClientController::index'], null, ['GET' => 0], null, true, false, null]],
        '/client/new' => [[['_route' => 'client_new', '_controller' => 'App\\Controller\\ClientController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api' => [
            [['_route' => 'compte_partenaire_index', '_controller' => 'App\\Controller\\ComptePartenaireController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'depot_index', '_controller' => 'App\\Controller\\DepotController::index'], null, ['GET' => 0], null, true, false, null],
        ],
        '/api/ajoutCompte' => [[['_route' => 'compte_partenaire_new', '_controller' => 'App\\Controller\\ComptePartenaireController::ajoutCompte'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/frais' => [[['_route' => 'frais_index', '_controller' => 'App\\Controller\\FraisController::index'], null, ['GET' => 0], null, true, false, null]],
        '/frais/new' => [[['_route' => 'frais_new', '_controller' => 'App\\Controller\\FraisController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/part/ajoutPartenaire' => [[['_route' => 'partenaire_new', '_controller' => 'App\\Controller\\PartenaireController::ajoutPartenaire'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/trans/transaction' => [[['_route' => 'transactionNew', '_controller' => 'App\\Controller\\TransactionController::envoi'], null, ['POST' => 0], null, false, false, null]],
        '/api/trans/retrait' => [[['_route' => 'retrait', '_controller' => 'App\\Controller\\TransactionController::retrait'], null, null, null, false, false, null]],
        '/api/uti/ajoutUser' => [[['_route' => 'usernew', '_controller' => 'App\\Controller\\UserController::ajoutUser'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/client/([^/]++)(?'
                    .'|(*:61)'
                    .'|/edit(*:73)'
                    .'|(*:80)'
                .')'
                .'|/api(?'
                    .'|/(?'
                        .'|([^/]++)(?'
                            .'|(*:110)'
                            .'|/edit(*:123)'
                            .'|(*:131)'
                        .')'
                        .'|depot(*:145)'
                        .'|([^/]++)(?'
                            .'|(*:164)'
                            .'|/edit(*:177)'
                            .'|(*:185)'
                        .')'
                        .'|part(?'
                            .'|(*:201)'
                            .'|/(?'
                                .'|ajoutUserPart/([^/]++)(*:235)'
                                .'|([^/]++)(*:251)'
                                .'|partenaires/([^/]++)(*:279)'
                                .'|([^/]++)(?'
                                    .'|/edit(*:303)'
                                    .'|(*:311)'
                                .')'
                            .')'
                        .')'
                        .'|register(?'
                            .'|/([^/]++)(*:342)'
                            .'|Part/([^/]++)(*:363)'
                        .')'
                        .'|login(*:377)'
                        .'|trans(?'
                            .'|(*:393)'
                            .'|/([^/]++)(?'
                                .'|(*:413)'
                                .'|/edit(*:426)'
                                .'|(*:434)'
                            .')'
                        .')'
                        .'|uti(?'
                            .'|(*:450)'
                            .'|/(?'
                                .'|listerUser/([^/]++)(*:481)'
                                .'|([^/]++)(?'
                                    .'|(*:500)'
                                    .'|/edit(*:513)'
                                .')'
                                .'|userLister/([^/]++)(*:541)'
                                .'|([^/]++)(*:557)'
                            .')'
                        .')'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:596)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:627)'
                        .'|c(?'
                            .'|ontexts/(.+)(?:\\.([^/]++))?(*:666)'
                            .'|lients(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:701)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:739)'
                                .')'
                            .')'
                        .')'
                        .'|transactions(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:783)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:821)'
                            .')'
                        .')'
                        .'|frais(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:857)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:895)'
                            .')'
                        .')'
                        .'|login_check(*:916)'
                    .')'
                .')'
                .'|/frais/([^/]++)(?'
                    .'|(*:944)'
                    .'|/edit(*:957)'
                    .'|(*:965)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        61 => [[['_route' => 'client_show', '_controller' => 'App\\Controller\\ClientController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        73 => [[['_route' => 'client_edit', '_controller' => 'App\\Controller\\ClientController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        80 => [[['_route' => 'client_delete', '_controller' => 'App\\Controller\\ClientController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        110 => [[['_route' => 'compte_partenaire_show', '_controller' => 'App\\Controller\\ComptePartenaireController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        123 => [[['_route' => 'compte_partenaire_edit', '_controller' => 'App\\Controller\\ComptePartenaireController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        131 => [[['_route' => 'compte_partenaire_delete', '_controller' => 'App\\Controller\\ComptePartenaireController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        145 => [[['_route' => 'depot_new', '_controller' => 'App\\Controller\\DepotController::depot'], [], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        164 => [[['_route' => 'depot_show', '_controller' => 'App\\Controller\\DepotController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        177 => [[['_route' => 'depot_edit', '_controller' => 'App\\Controller\\DepotController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        185 => [[['_route' => 'depot_delete', '_controller' => 'App\\Controller\\DepotController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        201 => [[['_route' => 'partenaire_index', '_controller' => 'App\\Controller\\PartenaireController::index'], [], ['GET' => 0], null, true, false, null]],
        235 => [[['_route' => 'usernewPart', '_controller' => 'App\\Controller\\PartenaireController::ajoutUserPart'], ['id'], ['POST' => 0], null, false, true, null]],
        251 => [[['_route' => 'partenaire_show', '_controller' => 'App\\Controller\\PartenaireController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        279 => [[['_route' => 'partenairesLister', '_controller' => 'App\\Controller\\PartenaireController::lister'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        303 => [[['_route' => 'partenaire_edit', '_controller' => 'App\\Controller\\PartenaireController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        311 => [[['_route' => 'partenaire_delete', '_controller' => 'App\\Controller\\PartenaireController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        342 => [[['_route' => 'register', '_controller' => 'App\\Controller\\SecurityController::register'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        363 => [[['_route' => 'registerPart', '_controller' => 'App\\Controller\\SecurityController::registerPart'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        377 => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], [], ['POST' => 0], null, false, false, null]],
        393 => [[['_route' => 'transaction_index', '_controller' => 'App\\Controller\\TransactionController::index'], [], ['GET' => 0], null, true, false, null]],
        413 => [[['_route' => 'transaction_show', '_controller' => 'App\\Controller\\TransactionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        426 => [[['_route' => 'transaction_edit', '_controller' => 'App\\Controller\\TransactionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        434 => [[['_route' => 'transaction_delete', '_controller' => 'App\\Controller\\TransactionController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        450 => [[['_route' => 'user_index', '_controller' => 'App\\Controller\\UserController::index'], [], ['GET' => 0], null, true, false, null]],
        481 => [[['_route' => 'listerUsers', '_controller' => 'App\\Controller\\UserController::listerUser'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        500 => [[['_route' => 'user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        513 => [[['_route' => 'user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        541 => [[['_route' => 'userLister', '_controller' => 'App\\Controller\\UserController::userListe'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        557 => [[['_route' => 'user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        596 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        627 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        666 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        701 => [
            [['_route' => 'api_clients_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_clients_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        739 => [
            [['_route' => 'api_clients_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_clients_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_clients_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        783 => [
            [['_route' => 'api_transactions_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_transactions_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        821 => [
            [['_route' => 'api_transactions_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_transactions_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_transactions_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        857 => [
            [['_route' => 'api_frais_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Frais', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_frais_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Frais', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        895 => [
            [['_route' => 'api_frais_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Frais', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_frais_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Frais', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_frais_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Frais', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        916 => [[['_route' => 'api_login_check'], [], null, null, false, false, null]],
        944 => [[['_route' => 'frais_show', '_controller' => 'App\\Controller\\FraisController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        957 => [[['_route' => 'frais_edit', '_controller' => 'App\\Controller\\FraisController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        965 => [
            [['_route' => 'frais_delete', '_controller' => 'App\\Controller\\FraisController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
