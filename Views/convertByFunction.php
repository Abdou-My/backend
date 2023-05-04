// conn = adminController / formateurController ...
//Page = Organisme / Promotion ...
case "formations":
                if ($_SESSION['function'] == "admin") {
                            $data = new formationController();
                            $data->displayFormation();
                        } else {
                            header("location: http://localhost/AlyfPlaning");
                        }
                        break;
                    case "supprimerFormation":
                        if ($_SESSION['function'] == "admin") {
                            $data = new formationController();
                            $data->deleteFormation();
                        } else {
                            header("location: http://localhost/AlyfPlaning");
                        }
                        break;
                    case "modifierFormation":
                        if ($_SESSION['function'] == "admin") {
                            if (!empty($url[2])) {
                                $data = new formationController();
                                $data->editFormation($url[2]);
                            }
                        } else {
                            header("location: http://localhost/AlyfPlaning");
                        }
                        break;
                    case "editFormationValidated":
                        if ($_SESSION['function'] == "admin") {
                            $data = new formationController();
                            $data->editFormationDb();
                        } else {
                            header("location: http://localhost/AlyfPlaning");
                        }
                        break;
                    case "creerFormation":
                        if ($_SESSION['function'] == "admin") {
                            $data = new formationController();
                            $data->newFormation();
                        } else {
                            header("location: http://localhost/AlyfPlaning");
                        }
                        break;
                    case "createFormation":
                        if ($_SESSION['function'] == "admin") {
                            $data = new formationController();
                            $data->createFormation();
                        } else {
                            header("location: http://localhost/AlyfPlaning");
                        }
                        break;