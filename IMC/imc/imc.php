<?php 
$altura = $_POST["altura"]; 
$peso = $_POST["peso"]; 
echo "Su indice de Masa Corporal es: "; 
$indice = $peso / ($altura * $altura); 
echo $indice; 
echo "<br>"; 

if($indice<0.0016){ 
echo "su indice es: Infrapeso: Delgadez Severa"; 
}
elseif(($indice>0.0016)and($indice<=0.001699)){ 
echo "su indice es: Infrapeso: Delgadez moderada"; 
}
elseif(($indice>0.0017)and($indice<=0.001849)){ 
echo "su indice es: Infrapeso: Delgadez moderada"; 
}
elseif(($indice>0.001850)and($indice<=0.002499)){ 
echo "su indice es:Peso Normal"; 
}
elseif(($indice>0.0025)and($indice<=0.002999)){ 
echo "su indice es: Sobrepeso"; 
}
elseif(($indice>0.0030)and($indice<=0.003499)){ 
echo "su indice es: Infrapeso: Obeso-Tipo I"; 
}
elseif(($indice>0.0035)and($indice<=0.0040)){ 
echo "su indice es: Infrapeso: Obeso-Tipo II"; 
}
 elseif($indice>0.0040){ 
  echo "su indice es: Obeso-Tipo III";  
  } 
 else { 
 echo "ERROR-repita la operacion"; 
 }


?>