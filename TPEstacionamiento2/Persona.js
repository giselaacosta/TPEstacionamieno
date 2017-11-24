var personas;
(function (personas) {
    var Persona = /** @class */ (function () {
        function Persona(tipo) {
            this.tipo = tipo;
        }
        Persona.prototype.toString = function () {
            return this.tipo;
        };
        return Persona;
    }());
    personas.Persona = Persona;
})(personas || (personas = {}));
