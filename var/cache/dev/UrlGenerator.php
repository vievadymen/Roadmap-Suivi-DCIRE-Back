<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    'activites' => [[], ['_controller' => 'App\\Controller\\ActiviteController::addActivite'], [], [['text', '/api/activite']], [], []],
    'activite' => [[], ['_controller' => 'App\\Controller\\ActiviteController::listActivite'], [], [['text', '/api/activite']], [], []],
    'app_activite_detailsactivite' => [['id'], ['_controller' => 'App\\Controller\\ActiviteController::detailsactivite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/activite']], [], []],
    'app_activite_rechercheractivite' => [[], ['_controller' => 'App\\Controller\\ActiviteController::rechercherActivite'], [], [['text', '/api/rechercheactivite']], [], []],
    'delete_activite' => [['id'], ['_controller' => 'App\\Controller\\ActiviteController::deleteactivite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/activite']], [], []],
    'semaine_precedent' => [['semaine'], ['_controller' => 'App\\Controller\\ActiviteController::semaine_precedent'], [], [['variable', '/', '[^/]++', 'semaine'], ['text', '/api/activite/semaine']], [], []],
    'precedent-activite' => [['semaine'], ['_controller' => 'App\\Controller\\ActiviteController::PrecedeActivite'], [], [['variable', '/', '[^/]++', 'semaine'], ['text', '/api/activite/semaine']], [], []],
    'app_activite_modifiactivite' => [['id'], ['_controller' => 'App\\Controller\\ActiviteController::modifiActivite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/activite']], [], []],
    'autorites' => [[], ['_controller' => 'App\\Controller\\AutoriteController::addAutorite'], [], [['text', '/api/autorite']], [], []],
    'autorite' => [[], ['_controller' => 'App\\Controller\\AutoriteController::listAutorite'], [], [['text', '/api/autorite']], [], []],
    'app_autorite_detailsautorite' => [['id'], ['_controller' => 'App\\Controller\\AutoriteController::detailsAutorite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/autorite']], [], []],
    'app_autorite_rechercherautorite' => [[], ['_controller' => 'App\\Controller\\AutoriteController::rechercherAutorite'], [], [['text', '/rechercheautorite']], [], []],
    'delete_autorite' => [['id'], ['_controller' => 'App\\Controller\\AutoriteController::deleteAutorite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/autorite']], [], []],
    'app_autorite_modifiautorite' => [['id'], ['_controller' => 'App\\Controller\\AutoriteController::modifiAutorite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/autorite']], [], []],
    'commentaires' => [[], ['_controller' => 'App\\Controller\\CommentaireController::addCommentaire'], [], [['text', '/commentaire']], [], []],
    'commentaire' => [[], ['_controller' => 'App\\Controller\\CommentaireController::listCommentaire'], [], [['text', '/commentaire']], [], []],
    'app_commentaire_detailscommentaire' => [['id'], ['_controller' => 'App\\Controller\\CommentaireController::detailsCommentaire'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/commentaire']], [], []],
    'delete_commentaire' => [['id'], ['_controller' => 'App\\Controller\\CommentaireController::deleteCommentaire'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/delete-commentaire']], [], []],
    'app_commentaire_modificommentaire' => [['id'], ['_controller' => 'App\\Controller\\CommentaireController::modifiCommentaire'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/commentaire']], [], []],
    'difficultes' => [[], ['_controller' => 'App\\Controller\\DifficulteController::addDifficulte'], [], [['text', '/api/difficulte']], [], []],
    'difficulte' => [[], ['_controller' => 'App\\Controller\\DifficulteController::listDifficulte'], [], [['text', '/api/difficulte']], [], []],
    'app_difficulte_detailsdifficulte' => [['id'], ['_controller' => 'App\\Controller\\DifficulteController::detailsDifficulte'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/difficulte']], [], []],
    'delete_difficulte' => [['id'], ['_controller' => 'App\\Controller\\DifficulteController::deleteDifficulte'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/difficulte']], [], []],
    'app_difficulte_modifidifficulte' => [['id'], ['_controller' => 'App\\Controller\\DifficulteController::modifiDifficulte'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/difficulte']], [], []],
    'evenements' => [[], ['_controller' => 'App\\Controller\\EvenementController::addEvenement'], [], [['text', '/api/evenement']], [], []],
    'evenement' => [[], ['_controller' => 'App\\Controller\\EvenementController::listEvenement'], [], [['text', '/api/evenement']], [], []],
    'app_evenement_detailsevenement' => [['id'], ['_controller' => 'App\\Controller\\EvenementController::detailsEvenement'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/evenement']], [], []],
    'app_evenement_rechercherevenement' => [[], ['_controller' => 'App\\Controller\\EvenementController::recherchErevenement'], [], [['text', '/api/rechercheevenement']], [], []],
    'delete_evenement' => [['id'], ['_controller' => 'App\\Controller\\EvenementController::deleteEvenement'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/evenement']], [], []],
    'app_evenement_modifievenement' => [['id'], ['_controller' => 'App\\Controller\\EvenementController::modifiEvenement'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/evenement']], [], []],
    'agenda-evenement' => [[], ['_controller' => 'App\\Controller\\EvenementController::AgendaEvenement'], [], [['text', '/api/agenda/evenement']], [], []],
    'extraction' => [[], ['_controller' => 'App\\Controller\\ExtractionController::index'], [], [['text', '/extraction']], [], []],
    'app_historique_getuserhistoriques' => [['id'], ['_controller' => 'App\\Controller\\HistoriqueController::getUserHistoriques'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/userhistorique']], [], []],
    'app_historique_getallhistoriques' => [[], ['_controller' => 'App\\Controller\\HistoriqueController::getAllHistoriques'], [], [['text', '/historiques']], [], []],
    'app_historique_gethistoriquesentre' => [['id'], ['_controller' => 'App\\Controller\\HistoriqueController::gethistoriquesEntre'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/historiquesDates']], [], []],
    'historique_evenement' => [[], ['_controller' => 'App\\Controller\\HistoriqueEvenementController::index'], [], [['text', '/historique/evenement']], [], []],
    'interims' => [[], ['_controller' => 'App\\Controller\\InterimController::addInterim'], [], [['text', '/addInterim']], [], []],
    'interim' => [[], ['_controller' => 'App\\Controller\\InterimController::listInterim'], [], [['text', '/interim']], [], []],
    'app_interim_detailsinterim' => [['id'], ['_controller' => 'App\\Controller\\InterimController::detailsInterim'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/interim']], [], []],
    'delete_interim' => [['id'], ['_controller' => 'App\\Controller\\InterimController::deleteInterim'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/interim']], [], []],
    'app_interim_modifiinterim' => [['id'], ['_controller' => 'App\\Controller\\InterimController::modifiInterim'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/interim']], [], []],
    'periodicites' => [[], ['_controller' => 'App\\Controller\\PeriodiciteController::addPeriodicite'], [], [['text', '/periodicite']], [], []],
    'periodicite' => [[], ['_controller' => 'App\\Controller\\PeriodiciteController::listPeriodicite'], [], [['text', '/periodicite']], [], []],
    'app_periodicite_detailsperiodicite' => [['id'], ['_controller' => 'App\\Controller\\PeriodiciteController::detailsPeriodicite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/periodicite']], [], []],
    'app_periodicite_rechercherperiodicite' => [[], ['_controller' => 'App\\Controller\\PeriodiciteController::rechercherPeriodicite'], [], [['text', '/rechercheperiodicite']], [], []],
    'delete_periodicite' => [['id'], ['_controller' => 'App\\Controller\\PeriodiciteController::deletePeriodicite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/periodicite']], [], []],
    'app_periodicite_modifiperiodicite' => [['id'], ['_controller' => 'App\\Controller\\PeriodiciteController::modifiPeriodicite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/periodicite']], [], []],
    'pointDeCoordinations' => [[], ['_controller' => 'App\\Controller\\PointDeCoordinationController::addPointDeCoordination'], [], [['text', '/pointDeCoordination']], [], []],
    'pointDeCoordination' => [[], ['_controller' => 'App\\Controller\\PointDeCoordinationController::listPointDeCoordination'], [], [['text', '/pointdecoordination']], [], []],
    'app_pointdecoordination_detailspointdecoordination' => [['id'], ['_controller' => 'App\\Controller\\PointDeCoordinationController::detailsPointDeCoordination'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/PointDeCoordination']], [], []],
    'delete_pointDeCoordination' => [['id'], ['_controller' => 'App\\Controller\\PointDeCoordinationController::deletePointDeCoordination'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/delete-pointDeCoordination']], [], []],
    'modifie_pointDeCoordination' => [['id'], ['_controller' => 'App\\Controller\\PointDeCoordinationController::modifiPointDeCoordination'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/pointdecoordination']], [], []],
    'app_profil_ajouterprofil' => [[], ['_controller' => 'App\\Controller\\ProfilController::ajouterProfil'], [], [['text', '/profil']], [], []],
    'app_profil_listprofil' => [[], ['_controller' => 'App\\Controller\\ProfilController::listProfil'], [], [['text', '/profils']], [], []],
    'app_profil_deleteprofil' => [['id'], ['_controller' => 'App\\Controller\\ProfilController::deleteProfil'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/profil']], [], []],
    'app_profil_modifierprofil' => [['id'], ['_controller' => 'App\\Controller\\ProfilController::modifierProfil'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/profil']], [], []],
    'app_forgot_password_request' => [[], ['_controller' => 'App\\Controller\\ResetPasswordController::request'], [], [['text', '/reinitialisationMotDePass']], [], []],
    'app_check_email' => [[], ['_controller' => 'App\\Controller\\ResetPasswordController::checkEmail'], [], [['text', '/check-email']], [], []],
    'app_reset_password' => [['token'], ['token' => null, '_controller' => 'App\\Controller\\ResetPasswordController::reset'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/reset']], [], []],
    'structures' => [[], ['_controller' => 'App\\Controller\\StructureController::addStructure'], [], [['text', '/api/structure']], [], []],
    'structure' => [[], ['_controller' => 'App\\Controller\\StructureController::EventStructure'], [], [['text', '/api/structure']], [], []],
    'app_structure_detailsstructure' => [['id'], ['_controller' => 'App\\Controller\\StructureController::detailsStructure'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/structure']], [], []],
    'app_structure_structureactivite' => [['id'], ['_controller' => 'App\\Controller\\StructureController::structureActivite'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/structure-activite']], [], []],
    'delete_structure' => [['id'], ['_controller' => 'App\\Controller\\StructureController::deleteStructure'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/delete-structure']], [], []],
    'app_structure_modifistructure' => [['id'], ['_controller' => 'App\\Controller\\StructureController::modifiStructure'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/api/structure']], [], []],
    'trancheHoraires' => [[], ['_controller' => 'App\\Controller\\TrancheHoraireController::addTrancheHoraire'], [], [['text', '/trancheHoraire']], [], []],
    'trancheHoraire' => [[], ['_controller' => 'App\\Controller\\TrancheHoraireController::listtrancheHoraire'], [], [['text', '/trancheHoraire']], [], []],
    'app_tranchehoraire_detailstranchehoraire' => [['id'], ['_controller' => 'App\\Controller\\TrancheHoraireController::detailstrancheHoraire'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/trancheHoraire']], [], []],
    'delete_trancheHoraire' => [['id'], ['_controller' => 'App\\Controller\\TrancheHoraireController::deletetrancheHoraire'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/delete-trancheHoraire']], [], []],
    'modifie_trancheHoraire' => [['id'], ['_controller' => 'App\\Controller\\TrancheHoraireController::modifitrancheHoraire'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/trancheHoraire']], [], []],
    'type_periodicite' => [[], ['_controller' => 'App\\Controller\\TypePeriodiciteController::index'], [], [['text', '/type/periodicite']], [], []],
    'typeService' => [[], ['_controller' => 'App\\Controller\\TypeServiceController::addTypeService'], [], [['text', '/typeService']], [], []],
    'typeServices' => [[], ['_controller' => 'App\\Controller\\TypeServiceController::listTypeService'], [], [['text', '/typeService']], [], []],
    'app_typeservice_detailstypeservice' => [['id'], ['_controller' => 'App\\Controller\\TypeServiceController::detailsTypeService'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/typeService']], [], []],
    'app_typeservice_recherchertypeservice' => [[], ['_controller' => 'App\\Controller\\TypeServiceController::rechercherTypeService'], [], [['text', '/recherchetypeService']], [], []],
    'delete_typeService' => [['id'], ['_controller' => 'App\\Controller\\TypeServiceController::deleteTypeService'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/typeService']], [], []],
    'app_typeservice_modifitypeservice' => [['id'], ['_controller' => 'App\\Controller\\TypeServiceController::modifiTypeService'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/typeService']], [], []],
    'type_structure' => [[], ['_controller' => 'App\\Controller\\TypeStructureController::index'], [], [['text', '/type/structure']], [], []],
    'app_user_passwordchange' => [[], ['_controller' => 'App\\Controller\\UserController::passwordChange'], [], [['text', '/passwordChange']], [], []],
    'app_user_deconnexion' => [[], ['_controller' => 'App\\Controller\\UserController::deconnexion'], [], [['text', '/deconnexion']], [], []],
    'app_user_adduser' => [[], ['_controller' => 'App\\Controller\\UserController::addUser'], [], [['text', '/user']], [], []],
    'app_user_detailsuser' => [['id'], ['_controller' => 'App\\Controller\\UserController::detailsUser'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/user']], [], []],
    'app_user_listusers' => [[], ['_controller' => 'App\\Controller\\UserController::listUsers'], [], [['text', '/api/users']], [], []],
    'app_user_modifierutilisateur' => [['id'], ['_controller' => 'App\\Controller\\UserController::modifierUtilisateur'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/user']], [], []],
    'app_user_bloquerutilisateur' => [['id'], ['_controller' => 'App\\Controller\\UserController::bloquerUtilisateur'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/blockUser']], [], []],
    'app_user_searchuser' => [[], ['_controller' => 'App\\Controller\\UserController::searchUser'], [], [['text', '/search']], [], []],
    'app_user_listemails' => [[], ['_controller' => 'App\\Controller\\UserController::listEmails'], [], [['text', '/listEmails']], [], []],
    'app_workflow_sendworkflow' => [[], ['_controller' => 'App\\Controller\\WorkflowController::sendworkflow'], [], [['text', '/workflow']], [], []],
    'api_entrypoint' => [['index', '_format'], ['_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index' => 'index'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', 'index', 'index'], ['text', '/api']], [], []],
    'api_doc' => [['_format'], ['_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], [], [['variable', '.', '[^/]++', '_format'], ['text', '/api/docs']], [], []],
    'api_jsonld_context' => [['shortName', '_format'], ['_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName' => '.+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '.+', 'shortName'], ['text', '/api/contexts']], [], []],
    'fos_user_security_login' => [[], ['_controller' => 'fos_user.security.controller:loginAction'], [], [['text', '/login']], [], []],
    'fos_user_security_check' => [[], ['_controller' => 'fos_user.security.controller:checkAction'], [], [['text', '/login_check']], [], []],
    'fos_user_security_logout' => [[], ['_controller' => 'fos_user.security.controller:logoutAction'], [], [['text', '/logout']], [], []],
    'fos_user_profile_show' => [[], ['_controller' => 'fos_user.profile.controller:showAction'], [], [['text', '/profile/']], [], []],
    'fos_user_profile_edit' => [[], ['_controller' => 'fos_user.profile.controller:editAction'], [], [['text', '/profile/edit']], [], []],
    'fos_user_registration_register' => [[], ['_controller' => 'fos_user.registration.controller:registerAction'], [], [['text', '/register/']], [], []],
    'fos_user_registration_check_email' => [[], ['_controller' => 'fos_user.registration.controller:checkEmailAction'], [], [['text', '/register/check-email']], [], []],
    'fos_user_registration_confirm' => [['token'], ['_controller' => 'fos_user.registration.controller:confirmAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/register/confirm']], [], []],
    'fos_user_registration_confirmed' => [[], ['_controller' => 'fos_user.registration.controller:confirmedAction'], [], [['text', '/register/confirmed']], [], []],
    'fos_user_resetting_request' => [[], ['_controller' => 'fos_user.resetting.controller:requestAction'], [], [['text', '/resetting/request']], [], []],
    'fos_user_resetting_send_email' => [[], ['_controller' => 'fos_user.resetting.controller:sendEmailAction'], [], [['text', '/resetting/send-email']], [], []],
    'fos_user_resetting_check_email' => [[], ['_controller' => 'fos_user.resetting.controller:checkEmailAction'], [], [['text', '/resetting/check-email']], [], []],
    'fos_user_resetting_reset' => [['token'], ['_controller' => 'fos_user.resetting.controller:resetAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/resetting/reset']], [], []],
    'fos_user_change_password' => [[], ['_controller' => 'fos_user.change_password.controller:changePasswordAction'], [], [['text', '/profile/change-password']], [], []],
];
