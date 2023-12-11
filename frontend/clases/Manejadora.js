var Ajax = /** @class */ (function () {
    function Ajax() {
        var _this = this;
        this.Get = function (ruta, success, params, error) {
            if (params === void 0) { params = ""; }
            var parametros = params.length > 0 ? params : "";
            ruta = params.length > 0 ? ruta + "?" + parametros : ruta;
            _this._xhr.open('GET', ruta);
            _this._xhr.send();
            _this._xhr.onreadystatechange = function () {
                if (_this._xhr.readyState === Ajax.DONE) {
                    if (_this._xhr.status === Ajax.OK) {
                        success(_this._xhr.responseText);
                    }
                    else {
                        if (error !== undefined) {
                            error(_this._xhr.status);
                        }
                    }
                }
            };
        };
        this.Post = function (ruta, success, params, error) {
            if (params === void 0) { params = ""; }
            var parametros = params.length > 0 ? params : "";
            _this._xhr.open('POST', ruta, true);
            _this._xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            _this._xhr.send(parametros);
            _this._xhr.onreadystatechange = function () {
                if (_this._xhr.readyState === Ajax.DONE) {
                    if (_this._xhr.status === Ajax.OK) {
                        success(_this._xhr.responseText);
                    }
                    else {
                        if (error !== undefined) {
                            error(_this._xhr.status);
                        }
                    }
                }
            };
        };
        this._xhr = new XMLHttpRequest();
        Ajax.DONE = 4;
        Ajax.OK = 200;
    }
    return Ajax;
}());



var PrimerParcial;
(function (PrimerParcial) {
    function AgregarNeumaticoJSON() {
        var marca = document.getElementById("marca").value;
        var medidas = document.getElementById("medidas").value;
        var precio = document.getElementById("precio").value;
        var neumatico = { "marca": marca, "medidas": medidas, "precio": precio };
        var pagina = "./altaNeumaticoJSON.php";
        var ajax = new Ajax();
        var params = "neumatico=" + JSON.stringify(neumatico);
        ajax.Post(pagina, function (resultado) {
            console.clear();
            console.log(resultado);
        }, params, Fail);
    }
    PrimerParcial.AgregarNeumaticoJSON = AgregarNeumaticoJSON;
    function VerificarNeumaticoJSON() {
        var marca = document.getElementById("marca").value;
        var medidas = document.getElementById("medidas").value;
        var precio = document.getElementById("precio").value;
        var neumatico = { "marca": marca, "medidas": medidas, "precio": precio };
        var pagina = "./verificarNeumaticoJSON.php";
        var ajax = new Ajax();
        var params = "neumatico=" + JSON.stringify(neumatico);
        ajax.Post(pagina, function (resultado) {
            console.clear();
            console.log(resultado);
        }, params, Fail);
    }
    PrimerParcial.VerificarNeumaticoJSON = VerificarNeumaticoJSON;
    function AgregarNeumaticoSinFoto() {
        var marca = document.getElementById("marca").value;
        var medidas = document.getElementById("medidas").value;
        var precio = document.getElementById("precio").value;
        var neumatico = { "marca": marca, "medidas": medidas, "precio": precio };
        var pagina = "./agregarNeumaticoSinFoto.php";
        var ajax = new Ajax();
        var params = "neumatico_json=" + JSON.stringify(neumatico);
        ajax.Post(pagina, function (resultado) {
            console.clear();
            console.log(resultado);
        }, params, Fail);
    }
    PrimerParcial.AgregarNeumaticoSinFoto = AgregarNeumaticoSinFoto;
    function Fail(retorno) {
        console.clear();
        console.log("ERROR!!!");
        console.log(retorno);
    }
})(PrimerParcial || (PrimerParcial = {}));
