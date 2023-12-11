namespace Entidades{

    export class Neumatico{

        private marca : string;
        private medidas : string;
        private precio : number;

        public constructor(marca:string, medidas:string, precio:number) {

            this.marca = marca;
            this.medidas = medidas;
            this.precio = precio;

        }

        public ToString(){
            return JSON.stringify(this);
        }

        public ToJSON(){
            return JSON.parse(this.ToString());
        }


    }

}