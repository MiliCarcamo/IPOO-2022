<?php 
class Viaje {
      
    /**ENUNCIADO: La empresa de Transporte de Pasajeros "Viaje Feliz" quiere registrar inf referente a sus viajes. De cada viaje se precisa almacenar el codigo, destino, cant max de pasajeros y los pasajeros del viaje.
     * Realice la imprementacion de la clase Viaje e implemente los metodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajero).
     * Utilice un array que almacene la inf correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves "nombre", "apellido" y "dni". 
     * Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menu que permita cargar la inf del viaje, modificar y ver sus datos.
     */

    //Atributos
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros;  //Es un array


    //Metodo constructor: 
    public function __construct($codigo, $destino, $cantMaxPasajeros, $pasajeros) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->pasajeros = $pasajeros;
    }


    //Metodos de acceso - GET 
    public function getCodigo() {
        return $this->codigo;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getCantMaxPasajeros() {
        return $this->cantMaxPasajeros;
    }

    public function getPasajeros(){
        return $this->pasajeros;
    }


    //Metodos de acceso - SET
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function setCanMaxPasajeros($cantMaxPasajeros) {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function setPasajeros($pasajeros) {
        $this->pasajeros = $pasajeros;
    }

    //************FUNCIONES************

    /**
     * Esta funcion es para agregar pasajeros
     * array $arrayPasajero
     */
    public function agregarPasajero($pasajeroNuevo) {
        $arrayPasajero = [] ;
        $arrayPasajero = $this->getPasajeros() ; // a esta nueva variable le asigno lo q contiene el atributo pasajeros
        //array_push: Inserta uno o más elementos al final de un array
        array_push($arrayPasajero, $pasajeroNuevo) ;
        $this->setPasajeros($arrayPasajero) ;
    }


    /**
     * Esta funcion es para modificar datos de los pasajeros
     */
    public function modificarDatoPasajero($pasajeroViejo, $pasajeroNuevo) {
        $array= $this-> getPasajeros() ;
        //array_search — Busca un valor determinado en un array y devuelve la primera clave en caso de éxito
        $buscar = array_search($pasajeroViejo, $pasajeroNuevo)  ;
        //Una vez que encontro el pasajero, lo cambio por el pasajeroNuevo
        $array[$buscar] = $pasajeroNuevo ;
        //Serteo el pasajero viejo y lo cambio por el nuevo
        $this->setPasajeros($array); 
        
    }
    


    /**
     * Esta funcion determina si la capacidad del viaje esta llena o no
     */
    public function capacidadViaje() {
        $capacidad = count($this->getPasajeros()) ;
        if ($capacidad < $this->getCantMaxPasajeros()) {
            $hayLugar = true;
        }else {
            $hayLugar = false;
        }
        return $hayLugar;
    }


    public function __toString()
    {
        $cadena = "El codigo de viaje es: ". $this->getCodigo() . "\n" . 
        "El destino del viaje es: " . $this->getDestino() . "\n" . 
        "La cantidad Maxima de pasajeros es: " . $this->getCantMaxPasajeros() . "\n" . 
        "La cantidad de pasajeros es: " . count($this->getPasajeros()) . "\n" ;

        return $cadena;
    }
}

?>