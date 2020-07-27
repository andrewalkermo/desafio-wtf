<?php
require_once(__DIR__.'/../models/Atendimento.php');
class AtendimentoController{

    public static function index() {
        $_SESSION['atendimentos'] = Atendimento::readAll();
        header('Location:../atendimento');
    }

    public static function create() {
        // var_dump($_POST);die;

            $atendimento = new Atendimento($_POST['atendimento']);
            try {
                $atendimento->create();
            }
            catch(PDOException $e) {
            var_dump($e);die;
            }
        header('Location:../views/atendimento/index.php');
    }

    public static function update() {
        if(isset($_POST['atendimento']) && !empty($_POST['atendimento']) && $_POST['atendimento'] != null){

            $atendimento = new Atendimento($_POST['atendimento']);
            try {
                $atendimento->update();
                }
            catch(PDOException $e) {
                    // var_dump($e); die;
            }
        }
        header('Location:../atendimento');
    }


    public static function delete() {
        if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] != null){
            try {
                Atendimento::delete($_GET['delete']);
                }
            catch(PDOException $e) {
                }
        }
        header('Location:../atendimento');
    }

    public static function select($id) {
        if (!empty($column) && !empty($value)) {
            try {
                $atendimento = Atendimento::readOne($id);
                return $atendimento;
            }
            catch (PDOException $e) {

                    var_dump($e);

            }
        }
    }

    public static function selectAll() {
        try {
            $Atendimento = Atendimento::readAll();
            $Atendimento = $Atendimento;
            return $Atendimento;
        }
        catch (pdoexception $e) {
            return $e;
        }
    }
}

$postActions = array('create', 'update', 'changePassword', 'recoverPassword');

if (isset($_POST['action']) && in_array($_POST['action'], $postActions)) {
    $action = $_POST['action'];
    atendimentoController::$action();
} elseif (!empty($_GET) &&  key($_GET) == "delete") {
    atendimentoController::delete();
}
