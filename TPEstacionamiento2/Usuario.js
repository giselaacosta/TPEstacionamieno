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
    var Usuario = /** @class */ (function (_super) {
        __extends(Usuario, _super);
        function Usuario(tipo, correo, password) {
            var _this = _super.call(this, tipo) || this;
            _this.correo = correo;
            _this.password = password;
            return _this;
        }
        Usuario.prototype.toString = function () {
            _super.prototype.toString.call(this);
            return this.correo + this.password;
        };
        return Usuario;
    }(personas.Persona));
    personas.Usuario = Usuario;
})(personas || (personas = {}));
