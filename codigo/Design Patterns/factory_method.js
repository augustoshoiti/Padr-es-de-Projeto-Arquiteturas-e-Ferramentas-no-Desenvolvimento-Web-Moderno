class Transporte {
  entregar() {
    throw new Error("Método 'entregar()' deve ser implementado.");
  }
}
class Caminhao extends Transporte {
  entregar() {
    return "Entrega realizada por caminhão.";
  }
}
class Navio extends Transporte {
  entregar() {
    return "Entrega realizada por navio.";
  }
}
class TransporteFactory {
  static criarTransporte(tipo) {
    switch (tipo) {
      case "caminhao":
        return new Caminhao();
      case "navio":
        return new Navio();
      default:
        throw new Error("Tipo de transporte desconhecido.");
    }
  }
}
// Uso
const transporte = TransporteFactory.criarTransporte('navio');
console.log(transporte.entregar());
// Saída: Entrega realizada por navio.