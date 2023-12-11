namespace Entidades{

    export class NeumaticoBD extends Neumatico{

        private id : number;

        private pathFoto : string;

        public constructor(marca:string, medidas:string, precio:number, id:number, pathFoto:string) {

            super(marca, medidas, precio);
            this.id = id;
            this.pathFoto = pathFoto;

        }


    }

}