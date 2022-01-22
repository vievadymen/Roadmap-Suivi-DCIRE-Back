<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/activite' => [
            [['_route' => 'activites', '_controller' => 'App\\Controller\\ActiviteController::addActivite'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'activite', '_controller' => 'App\\Controller\\ActiviteController::listActivite'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/rechercheactivite' => [[['_route' => 'app_activite_rechercheractivite', '_controller' => 'App\\Controller\\ActiviteController::rechercherActivite'], null, ['GET' => 0], null, false, false, null]],
        '/api/autorite' => [
            [['_route' => 'autorites', '_controller' => 'App\\Controller\\AutoriteController::addAutorite'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'autorite', '_controller' => 'App\\Controller\\AutoriteController::listAutorite'], null, ['GET' => 0], null, false, false, null],
        ],
        '/rechercheautorite' => [[['_route' => 'app_autorite_rechercherautorite', '_controller' => 'App\\Controller\\AutoriteController::rechercherAutorite'], null, ['GET' => 0], null, false, false, null]],
        '/commentaire' => [
            [['_route' => 'commentaires', '_controller' => 'App\\Controller\\CommentaireController::addCommentaire'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'commentaire', '_controller' => 'App\\Controller\\CommentaireController::listCommentaire'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/difficulte' => [
            [['_route' => 'difficultes', '_controller' => 'App\\Controller\\DifficulteController::addDifficulte'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'difficulte', '_controller' => 'App\\Controller\\DifficulteController::listDifficulte'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/evenement' => [
            [['_route' => 'evenements', '_controller' => 'App\\Controller\\EvenementController::addEvenement'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'evenement', '_controller' => 'App\\Controller\\EvenementController::listEvenement'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/rechercheevenement' => [[['_route' => 'app_evenement_rechercherevenement', '_controller' => 'App\\Controller\\EvenementController::recherchErevenement'], null, ['GET' => 0], null, false, false, null]],
        '/extraction' => [[['_route' => 'extraction', '_controller' => 'App\\Controller\\ExtractionController::index'], null, null, null, false, false, null]],
        '/historiques' => [[['_route' => 'app_historique_getallhistoriques', '_controller' => 'App\\Controller\\HistoriqueController::getAllHistoriques'], null, ['GET' => 0], null, false, false, null]],
        '/historique/evenement' => [[['_route' => 'historique_evenement', '_controller' => 'App\\Controller\\HistoriqueEvenementController::index'], null, null, null, false, false, null]],
        '/addInterim' => [[['_route' => 'interims', '_controller' => 'App\\Controller\\InterimController::addInterim'], null, ['POST' => 0], null, false, false, null]],
        '/interim' => [[['_route' => 'interim', '_controller' => 'App\\Controller\\InterimController::listInterim'], null, ['GET' => 0], null, false, false, null]],
        '/periodicite' => [
            [['_route' => 'periodicites', '_controller' => 'App\\Controller\\PeriodiciteController::addPeriodicite'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'periodicite', '_controller' => 'App\\Controller\\PeriodiciteController::listPeriodicite'], null, ['GET' => 0], null, false, false, null],
        ],
        '/rechercheperiodicite' => [[['_route' => 'app_periodicite_rechercherperiodicite', '_controller' => 'App\\Controller\\PeriodiciteController::rechercherPeriodicite'], null, ['GET' => 0], null, false, false, null]],
        '/pointDeCoordination' => [[['_route' => 'pointDeCoordinations', '_controller' => 'App\\Controller\\PointDeCoordinationController::addPointDeCoordination'], null, ['POST' => 0], null, false, false, null]],
        '/pointdecoordination' => [[['_route' => 'pointDeCoordination', '_controller' => 'App\\Controller\\PointDeCoordinationController::listPointDeCoordination'], null, ['GET' => 0], null, false, false, null]],
        '/profil' => [[['_route' => 'app_profil_ajouterprofil', '_controller' => 'App\\Controller\\ProfilController::ajouterProfil'], null, ['POST' => 0], null, false, false, null]],
        '/profils' => [[['_route' => 'app_profil_listprofil', '_controller' => 'App\\Controller\\ProfilController::listProfil'], null, ['GET' => 0], null, false, false, null]],
        '/reinitialisationMotDePass' => [[['_route' => 'app_forgot_password_request', '_controller' => 'App\\Controller\\ResetPasswordController::request'], null, null, null, false, false, null]],
        '/check-email' => [[['_route' => 'app_check_email', '_controller' => 'App\\Controller\\ResetPasswordController::checkEmail'], null, null, null, false, false, null]],
        '/api/structure' => [
            [['_route' => 'structures', '_controller' => 'App\\Controller\\StructureController::addStructure'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'structure', '_controller' => 'App\\Controller\\StructureController::EventStructure'], null, ['GET' => 0], null, false, false, null],
        ],
        '/trancheHoraire' => [
            [['_route' => 'trancheHoraires', '_controller' => 'App\\Controller\\TrancheHoraireController::addTrancheHoraire'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'trancheHoraire', '_controller' => 'App\\Controller\\TrancheHoraireController::listtrancheHoraire'], null, ['GET' => 0], null, false, false, null],
        ],
        '/type/periodicite' => [[['_route' => 'type_periodicite', '_controller' => 'App\\Controller\\TypePeriodiciteController::index'], null, null, null, false, false, null]],
        '/typeService' => [
            [['_route' => 'typeService', '_controller' => 'App\\Controller\\TypeServiceController::addTypeService'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'typeServices', '_controller' => 'App\\Controller\\TypeServiceController::listTypeService'], null, ['GET' => 0], null, false, false, null],
        ],
        '/recherchetypeService' => [[['_route' => 'app_typeservice_recherchertypeservice', '_controller' => 'App\\Controller\\TypeServiceController::rechercherTypeService'], null, ['GET' => 0], null, false, false, null]],
        '/type/structure' => [[['_route' => 'type_structure', '_controller' => 'App\\Controller\\TypeStructureController::index'], null, null, null, false, false, null]],
        '/passwordChange' => [[['_route' => 'app_user_passwordchange', '_controller' => 'App\\Controller\\UserController::passwordChange'], null, ['POST' => 0], null, false, false, null]],
        '/deconnexion' => [[['_route' => 'app_user_deconnexion', '_controller' => 'App\\Controller\\UserController::deconnexion'], null, ['GET' => 0], null, false, false, null]],
        '/api/users' => [
            [['_route' => 'app_user_adduser', '_controller' => 'App\\Controller\\UserController::addUser'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_user_listusers', '_controller' => 'App\\Controller\\UserController::listUsers'], null, ['GET' => 0], null, false, false, null],
        ],
        '/search' => [[['_route' => 'app_user_searchuser', '_controller' => 'App\\Controller\\UserController::searchUser'], null, ['GET' => 0], null, false, false, null]],
        '/listEmails' => [[['_route' => 'app_user_listemails', '_controller' => 'App\\Controller\\UserController::listEmails'], null, ['GET' => 0], null, false, false, null]],
        '/workflow' => [[['_route' => 'app_workflow_sendworkflow', '_controller' => 'App\\Controller\\WorkflowController::sendworkflow'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'fos_user_security_login', '_controller' => 'fos_user.security.controller:loginAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login_check' => [[['_route' => 'fos_user_security_check', '_controller' => 'fos_user.security.controller:checkAction'], null, ['POST' => 0], null, false, false, null]],
        '/logout' => [[['_route' => 'fos_user_security_logout', '_controller' => 'fos_user.security.controller:logoutAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/profile' => [[['_route' => 'fos_user_profile_show', '_controller' => 'fos_user.profile.controller:showAction'], null, ['GET' => 0], null, true, false, null]],
        '/profile/edit' => [[['_route' => 'fos_user_profile_edit', '_controller' => 'fos_user.profile.controller:editAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'fos_user_registration_register', '_controller' => 'fos_user.registration.controller:registerAction'], null, ['GET' => 0, 'POST' => 1], null, true, false, null]],
        '/register/check-email' => [[['_route' => 'fos_user_registration_check_email', '_controller' => 'fos_user.registration.controller:checkEmailAction'], null, ['GET' => 0], null, false, false, null]],
        '/register/confirmed' => [[['_route' => 'fos_user_registration_confirmed', '_controller' => 'fos_user.registration.controller:confirmedAction'], null, ['GET' => 0], null, false, false, null]],
        '/resetting/request' => [[['_route' => 'fos_user_resetting_request', '_controller' => 'fos_user.resetting.controller:requestAction'], null, ['GET' => 0], null, false, false, null]],
        '/resetting/send-email' => [[['_route' => 'fos_user_resetting_send_email', '_controller' => 'fos_user.resetting.controller:sendEmailAction'], null, ['POST' => 0], null, false, false, null]],
        '/resetting/check-email' => [[['_route' => 'fos_user_resetting_check_email', '_controller' => 'fos_user.resetting.controller:checkEmailAction'], null, ['GET' => 0], null, false, false, null]],
        '/profile/change-password' => [[['_route' => 'fos_user_change_password', '_controller' => 'fos_user.change_password.controller:changePasswordAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api(?'
                    .'|/(?'
                        .'|a(?'
                            .'|ctivite/(?'
                                .'|([^/]++)(?'
                                    .'|(*:206)'
                                .')'
                                .'|semaine/([^/]++)(?'
                                    .'|(*:234)'
                                .')'
                                .'|([^/]++)(*:251)'
                            .')'
                            .'|utorite/([^/]++)(?'
                                .'|(*:279)'
                            .')'
                            .'|genda/evenement/([^/]++)(*:312)'
                        .')'
                        .'|d(?'
                            .'|ifficulte/(?'
                                .'|semaine/([^/]++)(*:354)'
                                .'|([^/]++)(?'
                                    .'|(*:373)'
                                .')'
                            .')'
                            .'|elete\\-structure/([^/]++)(*:408)'
                        .')'
                        .'|evenement/([^/]++)(?'
                            .'|(*:438)'
                        .')'
                        .'|structure(?'
                            .'|/([^/]++)(?'
                                .'|(*:471)'
                            .')'
                            .'|\\-activite/([^/]++)(*:499)'
                        .')'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:537)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:568)'
                        .'|contexts/(.+)(?:\\.([^/]++))?(*:604)'
                    .')'
                .')'
                .'|/commentaire/([^/]++)(?'
                    .'|(*:638)'
                .')'
                .'|/delete\\-(?'
                    .'|commentaire/([^/]++)(*:679)'
                    .'|pointDeCoordination/([^/]++)(*:715)'
                    .'|trancheHoraire/([^/]++)(*:746)'
                .')'
                .'|/user(?'
                    .'|historique/([^/]++)(*:782)'
                    .'|/([^/]++)(?'
                        .'|(*:802)'
                    .')'
                .')'
                .'|/historiquesDates/([^/]++)(*:838)'
                .'|/interim/([^/]++)(?'
                    .'|(*:866)'
                .')'
                .'|/p(?'
                    .'|eriodicite/([^/]++)(?'
                        .'|(*:902)'
                    .')'
                    .'|ointdecoordination/([^/]++)(*:938)'
                    .'|rofil/([^/]++)(?'
                        .'|(*:963)'
                    .')'
                .')'
                .'|/PointDeCoordination/([^/]++)(*:1002)'
                .'|/re(?'
                    .'|set(?'
                        .'|(?:/([^/]++))?(*:1037)'
                        .'|ting/reset/([^/]++)(*:1065)'
                    .')'
                    .'|gister/confirm/([^/]++)(*:1098)'
                .')'
                .'|/t(?'
                    .'|rancheHoraire/([^/]++)(?'
                        .'|(*:1138)'
                    .')'
                    .'|ypeService/([^/]++)(?'
                        .'|(*:1170)'
                    .')'
                .')'
                .'|/blockUser/([^/]++)(*:1200)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        206 => [
            [['_route' => 'app_activite_detailsactivite', '_controller' => 'App\\Controller\\ActiviteController::detailsactivite'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'delete_activite', '_controller' => 'App\\Controller\\ActiviteController::deleteactivite'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        234 => [
            [['_route' => 'semaine_precedent', '_controller' => 'App\\Controller\\ActiviteController::semaine_precedent'], ['semaine'], ['GET' => 0], null, false, true, null],
            [['_route' => 'precedent-activite', '_controller' => 'App\\Controller\\ActiviteController::PrecedeActivite'], ['semaine'], ['GET' => 0], null, false, true, null],
        ],
        251 => [[['_route' => 'app_activite_modifiactivite', '_controller' => 'App\\Controller\\ActiviteController::modifiActivite'], ['id'], ['PUT' => 0], null, false, true, null]],
        279 => [
            [['_route' => 'app_autorite_detailsautorite', '_controller' => 'App\\Controller\\AutoriteController::detailsAutorite'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'delete_autorite', '_controller' => 'App\\Controller\\AutoriteController::deleteAutorite'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'app_autorite_modifiautorite', '_controller' => 'App\\Controller\\AutoriteController::modifiAutorite'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        312 => [[['_route' => 'agenda-evenement', '_controller' => 'App\\Controller\\EvenementController::AgendaEvenement'], ['semaine'], ['GET' => 0], null, false, true, null]],
        354 => [[['_route' => 'difficulte-semaine', '_controller' => 'App\\Controller\\DifficulteController::DifficulteSemaine'], ['semaine'], ['GET' => 0], null, false, true, null]],
        373 => [
            [['_route' => 'app_difficulte_detailsdifficulte', '_controller' => 'App\\Controller\\DifficulteController::detailsDifficulte'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'delete_difficulte', '_controller' => 'App\\Controller\\DifficulteController::deleteDifficulte'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'app_difficulte_modifidifficulte', '_controller' => 'App\\Controller\\DifficulteController::modifiDifficulte'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        408 => [[['_route' => 'delete_structure', '_controller' => 'App\\Controller\\StructureController::deleteStructure'], ['id'], ['DELETE' => 0], null, false, true, null]],
        438 => [
            [['_route' => 'app_evenement_detailsevenement', '_controller' => 'App\\Controller\\EvenementController::detailsEvenement'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'delete_evenement', '_controller' => 'App\\Controller\\EvenementController::deleteEvenement'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'app_evenement_modifievenement', '_controller' => 'App\\Controller\\EvenementController::modifiEvenement'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        471 => [
            [['_route' => 'app_structure_detailsstructure', '_controller' => 'App\\Controller\\StructureController::detailsStructure'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_structure_modifistructure', '_controller' => 'App\\Controller\\StructureController::modifiStructure'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        499 => [[['_route' => 'app_structure_structureactivite', '_controller' => 'App\\Controller\\StructureController::structureActivite'], ['id'], ['GET' => 0], null, false, true, null]],
        537 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        568 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        604 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        638 => [
            [['_route' => 'app_commentaire_detailscommentaire', '_controller' => 'App\\Controller\\CommentaireController::detailsCommentaire'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_commentaire_modificommentaire', '_controller' => 'App\\Controller\\CommentaireController::modifiCommentaire'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        679 => [[['_route' => 'delete_commentaire', '_controller' => 'App\\Controller\\CommentaireController::deleteCommentaire'], ['id'], ['DELETE' => 0], null, false, true, null]],
        715 => [[['_route' => 'delete_pointDeCoordination', '_controller' => 'App\\Controller\\PointDeCoordinationController::deletePointDeCoordination'], ['id'], ['DELETE' => 0], null, false, true, null]],
        746 => [[['_route' => 'delete_trancheHoraire', '_controller' => 'App\\Controller\\TrancheHoraireController::deletetrancheHoraire'], ['id'], ['DELETE' => 0], null, false, true, null]],
        782 => [[['_route' => 'app_historique_getuserhistoriques', '_controller' => 'App\\Controller\\HistoriqueController::getUserHistoriques'], ['id'], ['GET' => 0], null, false, true, null]],
        802 => [
            [['_route' => 'app_user_detailsuser', '_controller' => 'App\\Controller\\UserController::detailsUser'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_user_modifierutilisateur', '_controller' => 'App\\Controller\\UserController::modifierUtilisateur'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        838 => [[['_route' => 'app_historique_gethistoriquesentre', '_controller' => 'App\\Controller\\HistoriqueController::gethistoriquesEntre'], ['id'], ['POST' => 0], null, false, true, null]],
        866 => [
            [['_route' => 'app_interim_detailsinterim', '_controller' => 'App\\Controller\\InterimController::detailsInterim'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'delete_interim', '_controller' => 'App\\Controller\\InterimController::deleteInterim'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'app_interim_modifiinterim', '_controller' => 'App\\Controller\\InterimController::modifiInterim'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        902 => [
            [['_route' => 'app_periodicite_detailsperiodicite', '_controller' => 'App\\Controller\\PeriodiciteController::detailsPeriodicite'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'delete_periodicite', '_controller' => 'App\\Controller\\PeriodiciteController::deletePeriodicite'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'app_periodicite_modifiperiodicite', '_controller' => 'App\\Controller\\PeriodiciteController::modifiPeriodicite'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        938 => [[['_route' => 'modifie_pointDeCoordination', '_controller' => 'App\\Controller\\PointDeCoordinationController::modifiPointDeCoordination'], ['id'], ['PUT' => 0], null, false, true, null]],
        963 => [
            [['_route' => 'app_profil_deleteprofil', '_controller' => 'App\\Controller\\ProfilController::deleteProfil'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'app_profil_modifierprofil', '_controller' => 'App\\Controller\\ProfilController::modifierProfil'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        1002 => [[['_route' => 'app_pointdecoordination_detailspointdecoordination', '_controller' => 'App\\Controller\\PointDeCoordinationController::detailsPointDeCoordination'], ['id'], ['GET' => 0], null, false, true, null]],
        1037 => [[['_route' => 'app_reset_password', 'token' => null, '_controller' => 'App\\Controller\\ResetPasswordController::reset'], ['token'], ['POST' => 0], null, false, true, null]],
        1065 => [[['_route' => 'fos_user_resetting_reset', '_controller' => 'fos_user.resetting.controller:resetAction'], ['token'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1098 => [[['_route' => 'fos_user_registration_confirm', '_controller' => 'fos_user.registration.controller:confirmAction'], ['token'], ['GET' => 0], null, false, true, null]],
        1138 => [
            [['_route' => 'app_tranchehoraire_detailstranchehoraire', '_controller' => 'App\\Controller\\TrancheHoraireController::detailstrancheHoraire'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'modifie_trancheHoraire', '_controller' => 'App\\Controller\\TrancheHoraireController::modifitrancheHoraire'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        1170 => [
            [['_route' => 'app_typeservice_detailstypeservice', '_controller' => 'App\\Controller\\TypeServiceController::detailsTypeService'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'delete_typeService', '_controller' => 'App\\Controller\\TypeServiceController::deleteTypeService'], ['id'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'app_typeservice_modifitypeservice', '_controller' => 'App\\Controller\\TypeServiceController::modifiTypeService'], ['id'], ['PUT' => 0], null, false, true, null],
        ],
        1200 => [
            [['_route' => 'app_user_bloquerutilisateur', '_controller' => 'App\\Controller\\UserController::bloquerUtilisateur'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
