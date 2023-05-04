<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
session_start();
//require_once('./Controller/AuthentificationController.php');
include_once './autoLoad.php';
//http://localhost/...
//https://www.h2prog.com/...
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

try {
    if (empty($_GET['page'])) {
        throw new Exception("La page n'existe pas !");
    } else {

        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case "admin":
                switch ($url[1]) {

                        //start stagiaire
                    case "stagiaires":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new StagiaireController();
                        $data->displayStagiaires();
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "supprimerStagiaire":
                        //if ($_SESSION['function'] == "admin") {
                        echo "hahahha";
                        $data = new StagiaireController();
                        $data->deleteStagiaire($url[2]);
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "modifierStagiaire":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new StagiaireController();
                            $data->getStagiaire($url[2]);
                        } else {
                            echo "hahah";
                        }
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "editStagiaireValidated":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new StagiaireController();
                        $data->editStagiaireDb($drata);
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;

                    case "createStagiaire":
                        //if ($_SESSION['function'] == "admin") {

                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new StagiaireController();
                        $data->createStagiaire($drata);

                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                        //end stagiaire
                        //start module
                    case "modules":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new ModuleController();
                        $data->displayModules();
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "supprimerModule":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new ModuleController();
                        $data->deleteModule($url[2]);
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "modifierModule":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new ModuleController();
                            $data->getModule($url[2]);
                        } else {
                            echo "hahah";
                        }
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "editModuleValidated":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new ModuleController();
                        $data->editModuleDb($drata);
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;

                    case "createModule":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new ModuleController();
                        $data->createModule($drata);

                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                        //end module
                        //start formation
                    case "formations":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new FormationController();
                        $data->displayFormations();
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "supprimerFormation":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new FormationController();
                        $data->deleteFormation($url[2]);
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "formationsArchive":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new FormationController();
                        $data->getArchive();
                        /*} else {
                                header("location: http://localhost/AlyfPlaning");
                            }*/
                        break;
                    case "archiveFormation":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new FormationController();
                        $data->archiveFormation($url[2]);
                        /*} else {
                                header("location: http://localhost/AlyfPlaning");
                            }*/
                        break;
                    case "modifierFormation":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new FormationController();
                            $data->getFormation($url[2]);
                        }
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "editFormationValidated":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new FormationController();
                        $data->editFormationDb($drata);
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "editModuleFormationValidated":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $drata = json_decode(file_get_contents("php://input"));
                            $data = new FormationController();
                            $data->editModuleFormationDb($drata, $url[2]);
                        }
                        /*} else {
                                header("location: http://localhost/AlyfPlaning");
                            }*/
                        break;
                    case "createModulesDansFormation":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new FormationController();
                        $data->createModulesDansFormation($drata);
                        /*} else {
                                header("location: http://localhost/AlyfPlaning");
                            }*/
                        break;
                    case "modulesInFormation":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new FormationController();
                            $data->getDbModules($url[2]);
                        }
                        /*} else {
                                    header("location: http://localhost/AlyfPlaning");
                                }*/
                        break;

                    case "createFormation":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new FormationController();
                        $data->createFormation($drata);

                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                        //end formation
                        //start admin
                    case "administrateurs":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new AdminController();
                        $data->displayAdmins();
                        /*} else {
        header("location: http://localhost/AlyfPlaning");
    }*/
                        break;
                    case "supprimerAdmin":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new AdminController();
                        $data->deleteAdmin($url[2]);
                        /*} else {
        header("location: http://localhost/AlyfPlaning");
    }*/
                        break;
                    case "modifierAdmin":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new AdminController();
                            $data->getAdmin($url[2]);
                        }
                        /*} else {
        header("location: http://localhost/AlyfPlaning");
    }*/
                        break;
                    case "editAdminValidated":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new AdminController();
                        $data->editAdminDb($drata);
                        /*} else {
        header("location: http://localhost/AlyfPlaning");
    }*/
                        break;
                    case "createAdmin":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new AdminController();
                        $data->createAdmin($drata);


                        break;
                        //end admin
                        //start formateur
                    case "fromateurs":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new FormateurController();
                        $data->displayFormateurs();
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "supprimerFormateur":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new FormateurController();
                        $data->deleteFormateur($url[2]);
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "modifierFormateur":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new FormateurController();
                            $data->getFormateur($url[2]);
                        }
                        break;
                    case "competancesFormateur":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new FormateurController();
                            $data->getCompetances($url[2]);
                        }

                        /*} else {
            header("location: http://localhost/AlyfPljson_decodeaning");
        }*/
                        break;
                    case "editFormateurValidated":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new FormateurController();
                        $data->editFormateurDb($drata);
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "editCompetanceFormateurValidated":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $drata = json_decode(file_get_contents("php://input"));
                            $data = new FormateurController();
                            $data->editCompetanceFormateurDb($drata, $url[2]);
                        }
                        /*} else {
                header("location: http://localhost/AlyfPlaning");
            }*/
                        break;
                    case "formateurByModule":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new FormateurController();
                            $data->getFormateurByIdModule($url[2]);
                        }
                        /*} else {
                    header("location: http://localhost/AlyfPlaning");
                }*/
                        break;
                    case "createFormateur":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new FormateurController();
                        $data->createFormateur($drata);
                        break;
                    case "createCompetances":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new FormateurController();
                        $data->createFormateurCompetances($drata);
                        break;
                        //end formateur
                        //start organisme
                    case "organismes":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new OrganismeController();
                        $data->displayOrganismes();
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "supprimerOrganisme":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new OrganismeController();
                        $data->deleteOrganisme($url[2]);
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "modifierOrganisme":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new OrganismeController();
                            $data->editOrganisme($url[2]);
                        }
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "editOrganismeValidated":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new OrganismeController();
                        $data->editOrganismeDb($drata);
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "createOrganisme":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new OrganismeController();
                        $data->createOrganisme($drata);
                        break;
                        //end organisme
                        //start Promo
                    case "promotions":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new PromoController();
                        $data->displayPromos();
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "promosArchive":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new PromoController();
                        $data->displayArchive();
                        /*} else {
                header("location: http://localhost/AlyfPlaning");
            }*/
                        break;
                    case "promosEnCours":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new PromoController();
                        $data->displayEnCours();
                        /*} else {
                    header("location: http://localhost/AlyfPlaning");
                }*/
                        break;
                    case "promosTermine":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new PromoController();
                        $data->displayTermine();
                        /*} else {
                        header("location: http://localhost/AlyfPlaning");
                    }*/
                        break;
                    case "supprimerPromo":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new PromoController();
                        $data->deletePromo($url[2]);
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "archivePromo":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new PromoController();
                        $data->archivePromo($url[2]);
                        /*} else {
                header("location: http://localhost/AlyfPlaning");
            }*/
                        break;
                    case "modifierOrganisme":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new OrganismeController();
                            $data->editOrganisme($url[2]);
                        }
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "getDbFormation":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new PromoController();
                            $data->getDbFormation($url[2]);
                        }
                        /*} else {
                header("location: http://localhost/AlyfPlaning");
            }*/
                        break;
                    case "getNomPromo":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new PromoController();
                            $data->getNomPromo($url[2]);
                        }
                        /*} else {
                    header("location: http://localhost/AlyfPlaning");
                }*/
                        break;
                    case "modulesInPromo":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new PromoController();
                            $data->modulesInPromo($url[2]);
                        }
                        /*} else {
                        header("location: http://localhost/AlyfPlaning");
                    }*/
                        break;
                    case "getDbOrga":
                        //if ($_SESSION['function'] == "admin") {
                        if (!empty($url[2])) {
                            $data = new PromoController();
                            $data->getDbOrganisme($url[2]);
                        }
                        /*} else {
                    header("location: http://localhost/AlyfPlaning");
                }*/
                        break;
                    case "editOrganismeValidated":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new OrganismeController();
                        $data->editOrganismeDb($drata);
                        /*} else {
            header("location: http://localhost/AlyfPlaning");
        }*/
                        break;
                    case "createPromo":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new PromoController();
                        $data->createPromo($drata);
                        break;
                    case "updatePromo":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $id = $url[2];
                        $data = new PromoController();
                        $data->editPromo($drata, $id);
                        break;
                    case "createPlaning":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new PromoController();
                        $data->createModuleSessionFormateur($drata);
                        break;
                    case "updatePlaning":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $id = $url[2];
                        $data = new PromoController();
                        $data->updateModuleSessionFormateur($drata, $id);
                        break;
                    case "planing":
                        //if ($_SESSION['function'] == "admin") {
                        $id = $url[2];

                        $data = new PromoController();
                        $data->getPlaning($id);
                        break;
                        //end Promo
                        //start groupe
                    case "groupes":
                        //if ($_SESSION['function'] == "admin") {
                        $data = new GroupeController();
                        $data->displayGroups();
                        /*} else {
                header("location: http://localhost/AlyfPlaning");
            }*/
                        break;
                    case "createGroupe":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new GroupeController();
                        $data->newGroup($drata);
                        /*} else {
                    header("location: http://localhost/AlyfPlaning");
                }*/
                        break;
                    case "supprimerGroupe":
                        $data = new GroupeController();
                        $data->deleteGroup($url[2]);
                        /*} else {
                        header("location: http://localhost/AlyfPlaning");
                    }*/
                        break;
                    case "promoByIdg":
                        $data = new GroupeController();
                        $data->getGroup($url[2]);
                        /*} else {
                            header("location: http://localhost/AlyfPlaning");
                        }*/
                        break;
                    case "promoByIdg":
                        $data = new GroupeController();
                        $data->getGroup($url[2]);
                        /*} else {
                                header("location: http://localhost/AlyfPlaning");
                            }*/
                        break;
                    case "stagiairesInGroupe":
                        $data = new GroupeController();
                        $data->getStagiairesInGroup($url[2]);
                        /*} else {
                                    header("location: http://localhost/AlyfPlaning");
                                }*/
                        break;
                    case "createStagiaireInGroupeGroupe":
                        //if ($_SESSION['function'] == "admin") {
                        $drata = json_decode(file_get_contents("php://input"));
                        $data = new GroupeController();
                        $data->createStagiaireInGroupeGroupe($drata);
                        /*} else {
                                        header("location: http://localhost/AlyfPlaning");
                                    }*/
                        break;
                        case "editGroupe":
                            //if ($_SESSION['function'] == "admin") {
                            $drata = json_decode(file_get_contents("php://input"));
                            $data = new GroupeController();
                            $data->editPromoInGroupe($drata,$url[2]);
                            
                            /*} else {
                                header("location: http://localhost/AlyfPlaning");
                            }*/
                            break;
                            case "editSinGroupe":
                                //if ($_SESSION['function'] == "admin") {
                              
                                    $drata = json_decode(file_get_contents("php://input"));
                                    $data = new GroupeController();
                                    $data->editSinGroupe($drata, $url[2]);
                                
                                /*} else {
                                        header("location: http://localhost/AlyfPlaning");
                                    }*/
                                break;
                }
                break;
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    echo $msg;
}
