<?php

include 'Viaje.php' ;

echo "¡¡¡Bienvenidos/as a Viaje Feliz!!! \n " ;
echo "Ingrese el codigo de viaje: " ;
$codigo = trim(fgets(STDIN)) ;
echo "Ingrese el destino del viaje: " ;
$destino = trim(fgets(STDIN)) ;
echo "Ingrese la capacidad maxima de pasajeros: " ;
$capacidadPasajeros = trim(fgets(STDIN)) ;
echo "Ingrese la cantidad de pasajeros que estaran en el viaje: " ;
$cantPasajeros = trim(fgets(STDIN)) ;

if ($cantPasajeros <= $capacidadPasajeros) {
    $personas = informacionPasajeros($cantPasajeros) ;
    //Creo una nueva instancia de la clase Viaje
    $objViaje = new Viaje($codigo, $destino, $capacidadPasajeros, $personas) ;
    
    if ($cantPasajeros < $capacidadPasajeros) {
        
        do {
            $agregarPasajero = false;
           
            echo "Desea agregar un nuevo pasajero? (s/n): " ;
            $seguir = trim(fgets(STDIN)) ;
           
            if($seguir == "s") {
                $capacidadLimite = $objViaje->capacidadViaje() ;
                if ($cantPasajeros <= $capacidadLimite) {
                    $personas = informacionPasajeros($cantPasajeros) ;
                    $objViaje->agregarPasajero($personas)  ;
                    $agregarPasajero = true ;
                    echo "Dato guardado Exitosamente. \n" ;
                }else {
                    echo "No se puede agregar mas personas. Ya no hay mas lugar disponible \n ";
                }
            }
        } while ($agregarPasajero);
    }
    echo "Su viaje ha sido creado. \n" ;
}else {
    echo "No se ha podido crear el viaje. La cantidad de pasajeros supera el maximo. \n" ;
}


/**
 * Esta funcion es del menu de opciones
 * @param vacio
 * @return INT
 */
function menu () {
    //Int $opcion
    echo" \n Menu de opciones: \n
    1) Ver Viaje \n
    2) Ver Codigo de viaje. \n
    3) Cambiar el codigo de viaje \n
    4) Ver el destino del viaje \n
    5) Cambiar el destino del viaje \n
    6) Cambiar Capacidad Maxima de pasajeros \n
    7) Modificar datos de una pasajero \n
    8) Salir \n " ;
    
    echo "Ingrese una opcion entre 1 y 8: " ;
    $opcion = trim(fgets(STDIN)) ;
   
    return $opcion;
}


/**
 * Esta funcion contiene informacion sobre los pasajeros del viaje
 * @param Int $cant
 * @return Array 
 */
function informacionPasajeros($cant) {
    //Array $arrayPersonas (clave: "nombre, apellido, DNI")
    $arrayPersonas = [] ; //Inicializo el arreglo en vacio y una vez q pido los datos los almaceno
    
    //Pongo un for para ir contando y guardando la inf de la cant de pasajeros que vayan a viajar
    for ($i=0; $i < $cant ; $i++) { 
        echo "Ingrese el nombre del pasajero: " ;
        $nombre = trim(fgets(STDIN)) ;
        echo "Ingrese el apellido del pasajero: " ;
        $apellido = trim(fgets(STDIN)) ;
        echo "Ingrese el DNI del pasajero: " ;
        $dni = trim(fgets(STDIN)) ;
    
    //Almaceno los datos del array
    $arrayPersonas [$i]= ["nombre"=>$nombre, "apellido"=>$apellido, "DNI"=>$dni] ;
    }
    
    return $arrayPersonas ;
}


/**
 * Esta funcion me va a servir para buscar un pasajero, asi luego lo puedo modificar
 * @return array
 */
function pasajeros () {
    echo "Nombre del pasajero: \n";
    $nombrePasajero = trim(fgets(STDIN)) ;
    echo "Apellido: \n" ;
    $apellidoPasajero = trim(fgets(STDIN)) ;
    echo "DNI: \n" ;
    $dniPasajero = trim(fgets(STDIN)) ;
    $arrayPasaj= [] ;
    $arrayPasaj= ["nombre"=>$nombrePasajero, "apellido"=>$apellidoPasajero, "DNI"=>$dniPasajero] ;
    return $arrayPasaj ;
}


//Programa Principal


do {
    //Invoco a la funcion que me muestra el menu de opciones
    $opcionSeleccionada = menu() ;
    //Uso el switch para desarrollar las distintas opciones del menu.
    switch ($opcionSeleccionada) {
        
        case '1':
            //Ver los datos del viaje.
            echo "--------------------------------------------- \n" ;
            echo "LOS DATOS DEL VIAJE SON: \n";
            echo $objViaje;
            echo "---------------------------------------------\n" ;
            break;
    
       
        case '2':
             //Ver el codigo del viaje
            echo "--------------------------------------------- \n" ;
            echo "EL CODIGO DE VIAJE ES: " ;
            echo $objViaje->getCodigo();
            echo "\n ---------------------------------------------" ;
            break;
        
        
        case '3':
            //Cambiar el codigo del viaje.
            echo "\n Ingrese un nuevo codigo de viaje: " ;
            $codigoNuevo = trim(fgets(STDIN)) ;
            $objViaje->setCodigo($codigoNuevo) ;
            echo "--------------------------------------------- \n" ;
            echo "PERFECTO. EL NUEVO CODIGO AHORA ES: " . $codigoNuevo . "\n";
            echo "---------------------------------------------" ;
            break;
    
    
        
        case '4':
            //Ver el destino del viaje
            echo "--------------------------------------------- \n" ;
            echo "EL DESTINO DEL VIAJE ES: " ;
            echo $objViaje->getDestino() ;
            echo "\n---------------------------------------------" ;
            break;
    
    
        
        case '5':
            //Cambiar el destino del viaje.
            echo "Ingrese el nuevo destino del viaje: " ;
            $destinoNuevo = trim(fgets(STDIN)) ;
            $objViaje->setDestino($destinoNuevo) ;
            echo "---------------------------------------------------------------\n" ;
            echo "PERFECTO. AHORA EL NUEVO DESTINO DEL VIAJE ES: " . $destinoNuevo ."\n" ;
            echo "\n ---------------------------------------------------------------" ;
            break;
        
    
        
        case '6':
            //Cambiar Capacidad Maxima de pasajeros
            echo "Ingrese la nueva capacidad Maxima de Pasajeros: " ;
            $capacidadNueva = trim(fgets(STDIN)) ;
            $objViaje->setCanMaxPasajeros($capacidadNueva) ;
            echo "----------------------------------------------------------------- \n" ;
            echo "PERFECTO. AHORA LA NUEVA CAPACIDAD MAXIMA DE PASAJEROS ES: ". $capacidadNueva;
            echo "\n -----------------------------------------------------------------" ;
            break;
    
            
        
        case '7':
            //Modificar datos de una pasajero
            echo "Ingrese los datos del pasajero que quiere modificar: \n";
            $pasajeroModificar = pasajeros() ;
            echo "Ingrese los nuevos datos del pasajero: \n" ;
            $datosModificados = pasajeros() ;
            $objViaje->modificarDatoPasajero($pasajeroModificar, $datosModificados);
            echo "-----------------------------------------------------------\n " ;
            echo "LOS DATOS HAN SIDO MODIFICADOS CON EXITO. \n";
            echo "-----------------------------------------------------------" ;
            break;
    }
} while ($opcionSeleccionada <> 8);
echo "---------------------------------------------\n" ;
echo "Gracias elegir  'Viaje Feliz' " ;
echo "---------------------------------------------\n" ;

?>