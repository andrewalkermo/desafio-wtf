<?php
    require_once(__DIR__ .'/../helpers/Connection.php');

    class Atendimento extends Connection {
        public $id_atendimento;
        public $data_execucao;
        public $cliente;
        public $observacao;
        public $id_tipo_atendimento;
        public $id_tecnicos;

        function __construct($attributes = array()) {
            if (!empty($attributes)) {
                $this->id_atendimento = array_key_exists('id_atendimento', $attributes) ? $attributes['id_atendimento'] : '';
                $this->data_execucao = array_key_exists('data_execucao', $attributes) ? $attributes['data_execucao'] : '';
                $this->cliente = array_key_exists('cliente', $attributes) ? $attributes['cliente'] : '';
                $this->observacao = array_key_exists('observacao', $attributes) ? $attributes['observacao'] : '';
                $this->id_tipo_atendimento = array_key_exists('id_tipo_atendimento', $attributes) ? $attributes['id_tipo_atendimento'] : '';
                $this->id_tecnicos = array_key_exists('id_tecnicos', $attributes) ? $attributes['id_tecnicos'] : '';
            }
        }

        public function create() {
            $connect = Connection::connect();
            $stm = $connect->prepare('INSERT INTO `atendimento`(`data_execucao`, `cliente`, `observacao`, `id_tipo_atendimento`, `id_tecnicos`)VALUES(:data_execucao, :cliente, :observacao, :id_tipo_atendimento, :id_tecnicos)');
            $stm->bindValue(':data_execucao', $this->data_execucao, PDO::PARAM_STR);
            $stm->bindValue(':cliente', $this->cliente, PDO::PARAM_STR);
            $stm->bindValue(':observacao', $this->observacao, PDO::PARAM_STR);
            $stm->bindValue(':id_tipo_atendimento', $this->id_tipo_atendimento, PDO::PARAM_INT);
            $stm->bindValue(':id_tecnicos', $this->id_tecnicos, PDO::PARAM_INT);
            // var_dump($stm);die;
            return $stm->execute();
        }

        public function update() {
            $connect = Connection::connect();
            $stm = $connect->prepare('UPDATE `atendimento` SET id_atendimento=:id_atendimento, data_execucao=:data_execucao, cliente=:cliente, observacao=:observacao, id_tipo_atendimento=:id_tipo_atendimento, id_tecnicos=:id_tecnicos WHERE id_atendimento=:id_atendimento');
            $stm->bindValue(':id_atendimento', $this->id_atendimento, PDO::PARAM_STR);
            $stm->bindValue(':data_execucao', $this->data_execucao, PDO::PARAM_STR);
            $stm->bindValue(':cliente', $this->cliente, PDO::PARAM_STR);
            $stm->bindValue(':observacao', $this->observacao, PDO::PARAM_STR);
            $stm->bindValue(':id_tipo_atendimento', $this->id_tipo_atendimento, PDO::PARAM_INT);
            $stm->bindValue(':id_tecnicos', $this->id_tecnicos, PDO::PARAM_INT);
            return $stm->execute();

        }

        public function delete($id_atendimento) {
            $connect = Connection::connect();
            $stm = $connect->prepare('DELETE FROM `atendimento` WHERE id_atendimento = :id_atendimento');
            $stm->bindValue(':id_atendimento', $id_atendimento, PDO::PARAM_INT);
            return $stm->execute();
        }

        public static function readOne($id_atendimento) {
            $connect = Connection::connect();
            $stm = $connect->prepare('SELECT * FROM atendimento WHERE id_atendimento=:id_atendimento');
            $stm->bindValue(':id_atendimento', $id_atendimento, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        }

        public static function readAll() {
            $connect = Connection::connect();
            $stm = $connect->prepare('SELECT * FROM atendimento ORDER BY id_atendimento');
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }
