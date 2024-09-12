<?php
class Conversor {
    private $valor;
    private $unidad;

    public function __construct($valor, $unidad) {
        $this->valor = $valor;
        $this->unidad = $unidad;
    }

    public function convertir() {

        $unidades = [
            'km' => 1000,
            'hm' => 100,
            'dam' => 10,
            'm' => 1,
            'dm' => 0.1,
            'cm' => 0.01,
            'mm' => 0.001
        ];

        $valorEnMetros = $this->valor * $unidades[$this->unidad];
        $resultados = [];
        
        foreach ($unidades as $unidad => $factor) {
            $resultados[$unidad] = $valorEnMetros / $factor;
        }

        return $resultados;
    }
}
?>