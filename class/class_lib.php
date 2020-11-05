<?php

require __DIR__.'/../database/conect.php';

class Preguntas extends credencialesDB{
    public function __construct()
    {
        parent::__construct();
    }

    public function guardarPreguntas($titulo,$fecha,$option)
    {

        $instruccion = "CALL insertEncuesta('".$titulo ."','".$fecha."','".$option."')";
        $actualizar = $this->_db->query($instruccion);

        if ($actualizar) {
            return $actualizar;
            $actualizar->close();
            $this->_db->close();
        }
    }

    public function insertarRespuesta($texto,$votos,$idenc)
    {
        $instruccion = "CALL insertRespuesta('".$texto."','".$votos."','".$idenc."')";
        $actualizar = $this->_db->query($instruccion);

        if ($actualizar) {
            return $actualizar;
            $actualizar->close();
            $this->_db->close();
        }
    }

    public function consultID()
    {
        $instruccion = "CALL consultID()";
        $resultado = $this->_db->query($instruccion)->fetch_all(MYSQLI_ASSOC);

        if ($resultado) {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}

class Consulta extends credencialesDB{

    public function __construct()
    {
        parent::__construct();
    }

    public function listarRespuesta()
    {
        $instruccion = "CALL listarRespuesta()";
        $respuesta = $this->_db->query($instruccion)->fetch_all(MYSQLI_ASSOC);

        if ($respuesta) {
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }
    }

    public function listarEncuesta()
    {
        $instruccion = "CALL listarEncuesta()";
        $encuesta = $this->_db->query($instruccion)->fetch_all(MYSQLI_ASSOC);

        if ($encuesta) {
            return $encuesta;
            $encuesta->close();
            $this->_db->close();
        }
    }

    public function listarHacerEncuesta()
    {
        $instruccion = "CALL encuesta()";
        $encuesta = $this->_db->query($instruccion)->fetch_all(MYSQLI_ASSOC);

        if ($encuesta) {
            return $encuesta;
            $encuesta->close();
            $this->_db->close();
        }
    }

    public function listarReporte()
    {
        $instruccion = "CALL reporte()";
        $encuesta = $this->_db->query($instruccion)->fetch_all(MYSQLI_ASSOC);

        if ($encuesta) {
            return $encuesta;
            $encuesta->close();
            $this->_db->close();
        }
    }

    public function consultarVoto($id){
        $instruccion = "CALL consultarVoto('".$id."')";
        $voto = $this->_db->query($instruccion)->fetch_all(MYSQLI_ASSOC);

        if ($voto) {
            return $voto;
            $voto->close();
            $this->_db->close();
        }
    }

    public function guardarVoto($voto,$id){
        $instruccion = "CALL guardarVoto('" . $voto . "','" . $id . "')";
        $voto = $this->_db->query($instruccion);

        if ($voto) {
            return $voto;
            $voto->close();
            $this->_db->close();
        }
    }

}

class Mantenimiento extends credencialesDB{
    public function __construct()
    {
        parent::__construct();
    }

    public function borrarPreguntas($id){
        $instruccion = "CALL borrarPreguntas('" . $id . "')";
        $respuesta = $this->_db->query($instruccion);

        if ($respuesta) {
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }
    }

    public function borrarRespuestas($id){
        $instruccion = "CALL borrarRespuestas('".$id. "')";
        $respuesta = $this->_db->query($instruccion);

        if ($respuesta) {
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }
    }

    public function editarPreguntas($id)
    {
        $instruccion = "CALL editarPregunta('" . $id . "')";
        $respuesta = $this->_db->query($instruccion)->fetch_array(MYSQLI_BOTH);

        if ($respuesta) {
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }
    }

    public function editarRespuestas($id)
    {
        $instruccion = "CALL editarRespuesta('" . $id . "')";
        $respuesta = $this->_db->query($instruccion)->fetch_all(MYSQLI_ASSOC);

        if ($respuesta) {
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }
    }

    public function guardarPreguntaEditada($preguntaNueva, $preguntaVieja){
        $instruccion = "CALL guardarPreguntaEditada('" . $preguntaNueva . "','" . $preguntaVieja . "')";
        $respuesta = $this->_db->query($instruccion);

        if ($respuesta) {
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }
    }

    public function guardarRespuestaEditada($valor, $id)
    {
        $instruccion = "CALL guardarRespuestaEditada('" . $valor . "','" . $id . "')";
        $respuesta = $this->_db->query($instruccion);

        if ($respuesta) {
            return $respuesta;
            $respuesta->close();
            $this->_db->close();
        }
    }
}