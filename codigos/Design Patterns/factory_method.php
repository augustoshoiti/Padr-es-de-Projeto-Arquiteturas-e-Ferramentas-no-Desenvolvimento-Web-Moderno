<?php
interface Transporte {
    public function entregar(): string;
}

class Caminhao implements Transporte {
    public function entregar(): string {        
      return "Entrega realizada por caminhão.";
}}

class Navio implements Transporte {   
    public function entregar(): string {        
      return "Entrega realizada por navio.";  
}}

class TransporteFactory {   
  public static function criarTransporte(string $tipo): Transporte {       
    switch ($tipo) { 
       case 'caminhao':                
         return new Caminhao();           
       case 'navio':  
         return new Navio();           
       default:           
         throw new Exception("Tipo de transporte desconhecido.");       
      }    
    }
  }
// Uso
$transporte = TransporteFactory::criarTransporte('caminhao');
echo $transporte->entregar(); 
// Saída: Entrega realizada por caminhão.
?>