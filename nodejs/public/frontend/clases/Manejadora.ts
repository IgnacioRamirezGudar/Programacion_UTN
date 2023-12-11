import { IParte2 } from "./IParte2";

namespace PrimerParcial{

    export class Manejadora implements IParte2{

        public AgregarNeumaticoJSON(){

            let marca : any = (<HTMLInputElement>document.getElementById("marca")).value;
            let medidas : any = (<HTMLInputElement>document.getElementById("medidas")).value;
            let precio : any = (<HTMLInputElement>document.getElementById("precio")).value;
    
            let neumatico = {"marca" : marca, "medidas" : medidas, "precio" : precio};
    
            let pagina = "./altaNeumaticoJSON.php";
            
            let ajax : Ajax = new Ajax();
    
            let params : string = "neumatico=" + JSON.stringify(neumatico);
    
            ajax.Post(pagina, 
                (resultado:string)=> {
    
                    console.clear();
    
                    console.log(resultado);
     
                }
                , params, this.Fail);
    
        }
    
        public VerificarNeumaticoJSON(){
    
            let marca : any = (<HTMLInputElement>document.getElementById("marca")).value;
            let medidas : any = (<HTMLInputElement>document.getElementById("medidas")).value;
            let precio : any = (<HTMLInputElement>document.getElementById("precio")).value;
    
            let neumatico = {"marca" : marca, "medidas" : medidas, "precio" : precio};
    
            let pagina = "./verificarNeumaticoJSON.php";
            
            let ajax : Ajax = new Ajax();
    
            let params : string = "neumatico=" + JSON.stringify(neumatico);
    
            ajax.Post(pagina, 
                (resultado:string)=> {
    
                    console.clear();
    
                    console.log(resultado);
     
                }
                , params, this.Fail);
    
        }
    
        public AgregarNeumaticoSinFoto(){
    
            let marca : any = (<HTMLInputElement>document.getElementById("marca")).value;
            let medidas : any = (<HTMLInputElement>document.getElementById("medidas")).value;
            let precio : any = (<HTMLInputElement>document.getElementById("precio")).value;
    
            let neumatico = {"marca" : marca, "medidas" : medidas, "precio" : precio};
    
            let pagina = "./agregarNeumaticoSinFoto.php";
            
            let ajax : Ajax = new Ajax();
    
            let params : string = "neumatico_json=" + JSON.stringify(neumatico);
    
            ajax.Post(pagina, 
                (resultado:string)=> {
    
                    console.clear();
    
                    console.log(resultado);
     
                }
                , params, this.Fail);
    
        }
    
        public Fail(retorno:string):void {
            console.clear();
            console.log("ERROR!!!");
            console.log(retorno);
        }

    }

    

}