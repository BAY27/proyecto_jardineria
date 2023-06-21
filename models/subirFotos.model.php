<?php
class SubirFoto{
    public function guardar($imagen){
        $destino = '../public/img/gama_productos/'. $_FILES["imagen"]["name"];
        copy($_FILES["imagen"]["tmp_name"],$destino);
        return '../'.$destino;
    }
    public function cambiarnombre(){

    }
}