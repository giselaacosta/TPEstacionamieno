var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
///<reference path="./Persona.ts"/>
var personas;
(function (personas) {
    var Empleado = /** @class */ (function (_super) {
        __extends(Empleado, _super);
        function Empleado(tipo, id, nombre, apellido, correo, password, perfil, turno, fechacreacion, foto) {
            var _this = _super.call(this, tipo) || this;
            _this.id = id;
            _this.nombre = nombre;
            _this.apellido = apellido;
            _this.correo = correo;
            _this.password = password;
            _this.perfil = perfil;
            _this.turno = turno;
            _this.fechacreacion = fechacreacion;
            _this.foto = foto;
            return _this;
        }
        return Empleado;
    }(personas.Persona));
    personas.Empleado = Empleado;
})(personas || (personas = {}));
