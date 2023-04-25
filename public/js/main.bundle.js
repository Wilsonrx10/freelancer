webpackJsonp(["main"],{

/***/ "./src/$$_lazy_route_resource lazy recursive":
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = "./src/$$_lazy_route_resource lazy recursive";

/***/ }),

/***/ "./src/app/app-routing.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppRoutingModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__components_login_login_component__ = __webpack_require__("./src/app/components/login/login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__components_signup_signup_component__ = __webpack_require__("./src/app/components/signup/signup.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__components_profile_profile_component__ = __webpack_require__("./src/app/components/profile/profile.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__components_password_request_reset_request_reset_component__ = __webpack_require__("./src/app/components/password/request-reset/request-reset.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__components_password_response_reset_response_reset_component__ = __webpack_require__("./src/app/components/password/response-reset/response-reset.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__services_before_login_service__ = __webpack_require__("./src/app/services/before-login.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__services_after_login_service__ = __webpack_require__("./src/app/services/after-login.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};









var appRoutes = [
    {
        path: 'login',
        component: __WEBPACK_IMPORTED_MODULE_2__components_login_login_component__["a" /* LoginComponent */],
        canActivate: [__WEBPACK_IMPORTED_MODULE_7__services_before_login_service__["a" /* BeforeLoginService */]]
    },
    {
        path: 'signup',
        component: __WEBPACK_IMPORTED_MODULE_3__components_signup_signup_component__["a" /* SignupComponent */],
        canActivate: [__WEBPACK_IMPORTED_MODULE_7__services_before_login_service__["a" /* BeforeLoginService */]]
    },
    {
        path: 'profile',
        component: __WEBPACK_IMPORTED_MODULE_4__components_profile_profile_component__["a" /* ProfileComponent */],
        canActivate: [__WEBPACK_IMPORTED_MODULE_8__services_after_login_service__["a" /* AfterLoginService */]]
    },
    {
        path: 'request-password-reset',
        component: __WEBPACK_IMPORTED_MODULE_5__components_password_request_reset_request_reset_component__["a" /* RequestResetComponent */],
        canActivate: [__WEBPACK_IMPORTED_MODULE_7__services_before_login_service__["a" /* BeforeLoginService */]]
    },
    {
        path: 'response-password-reset',
        component: __WEBPACK_IMPORTED_MODULE_6__components_password_response_reset_response_reset_component__["a" /* ResponseResetComponent */],
        canActivate: [__WEBPACK_IMPORTED_MODULE_7__services_before_login_service__["a" /* BeforeLoginService */]]
    },
];
var AppRoutingModule = /** @class */ (function () {
    function AppRoutingModule() {
    }
    AppRoutingModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["I" /* NgModule */])({
            imports: [
                __WEBPACK_IMPORTED_MODULE_1__angular_router__["c" /* RouterModule */].forRoot(appRoutes)
            ],
            exports: [__WEBPACK_IMPORTED_MODULE_1__angular_router__["c" /* RouterModule */]]
        })
    ], AppRoutingModule);
    return AppRoutingModule;
}());



/***/ }),

/***/ "./src/app/app.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/app.component.html":
/***/ (function(module, exports) {

module.exports = "<app-navbar></app-navbar>\n<ng-snotify></ng-snotify>\n<div class=\"container\">\n    <router-outlet></router-outlet>\n</div>"

/***/ }),

/***/ "./src/app/app.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

var AppComponent = /** @class */ (function () {
    function AppComponent() {
        this.title = 'app';
    }
    AppComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-root',
            template: __webpack_require__("./src/app/app.component.html"),
            styles: [__webpack_require__("./src/app/app.component.css")]
        })
    ], AppComponent);
    return AppComponent;
}());



/***/ }),

/***/ "./src/app/app.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__ = __webpack_require__("./node_modules/@angular/platform-browser/esm5/platform-browser.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__app_component__ = __webpack_require__("./src/app/app.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__components_navbar_navbar_component__ = __webpack_require__("./src/app/components/navbar/navbar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__components_login_login_component__ = __webpack_require__("./src/app/components/login/login.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__components_signup_signup_component__ = __webpack_require__("./src/app/components/signup/signup.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__components_profile_profile_component__ = __webpack_require__("./src/app/components/profile/profile.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__components_password_request_reset_request_reset_component__ = __webpack_require__("./src/app/components/password/request-reset/request-reset.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__components_password_response_reset_response_reset_component__ = __webpack_require__("./src/app/components/password/response-reset/response-reset.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__app_routing_module__ = __webpack_require__("./src/app/app-routing.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__angular_forms__ = __webpack_require__("./node_modules/@angular/forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__angular_common_http__ = __webpack_require__("./node_modules/@angular/common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12__services_jarwis_service__ = __webpack_require__("./src/app/services/jarwis.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__services_token_service__ = __webpack_require__("./src/app/services/token.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__services_auth_service__ = __webpack_require__("./src/app/services/auth.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__services_after_login_service__ = __webpack_require__("./src/app/services/after-login.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__services_before_login_service__ = __webpack_require__("./src/app/services/before-login.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_17_ng_snotify__ = __webpack_require__("./node_modules/ng-snotify/index.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};


















var AppModule = /** @class */ (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["I" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_2__app_component__["a" /* AppComponent */],
                __WEBPACK_IMPORTED_MODULE_3__components_navbar_navbar_component__["a" /* NavbarComponent */],
                __WEBPACK_IMPORTED_MODULE_4__components_login_login_component__["a" /* LoginComponent */],
                __WEBPACK_IMPORTED_MODULE_5__components_signup_signup_component__["a" /* SignupComponent */],
                __WEBPACK_IMPORTED_MODULE_6__components_profile_profile_component__["a" /* ProfileComponent */],
                __WEBPACK_IMPORTED_MODULE_7__components_password_request_reset_request_reset_component__["a" /* RequestResetComponent */],
                __WEBPACK_IMPORTED_MODULE_8__components_password_response_reset_response_reset_component__["a" /* ResponseResetComponent */]
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__["a" /* BrowserModule */],
                __WEBPACK_IMPORTED_MODULE_9__app_routing_module__["a" /* AppRoutingModule */],
                __WEBPACK_IMPORTED_MODULE_10__angular_forms__["a" /* FormsModule */],
                __WEBPACK_IMPORTED_MODULE_11__angular_common_http__["b" /* HttpClientModule */],
                __WEBPACK_IMPORTED_MODULE_17_ng_snotify__["a" /* SnotifyModule */]
            ],
            providers: [__WEBPACK_IMPORTED_MODULE_12__services_jarwis_service__["a" /* JarwisService */], __WEBPACK_IMPORTED_MODULE_13__services_token_service__["a" /* TokenService */], __WEBPACK_IMPORTED_MODULE_14__services_auth_service__["a" /* AuthService */], __WEBPACK_IMPORTED_MODULE_15__services_after_login_service__["a" /* AfterLoginService */], __WEBPACK_IMPORTED_MODULE_16__services_before_login_service__["a" /* BeforeLoginService */],
                { provide: 'SnotifyToastConfig', useValue: __WEBPACK_IMPORTED_MODULE_17_ng_snotify__["c" /* ToastDefaults */] },
                __WEBPACK_IMPORTED_MODULE_17_ng_snotify__["b" /* SnotifyService */]],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_2__app_component__["a" /* AppComponent */]]
        })
    ], AppModule);
    return AppModule;
}());



/***/ }),

/***/ "./src/app/components/login/login.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/components/login/login.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"mt-4 col-8 offset-2\">\n  <div class=\"card\">\n    <div class=\"card-header\">Login Here</div>\n    <div class=\"card-body\">\n      <form #loginForm=ngForm (ngSubmit)=\"onSubmit()\">\n\n        <div class=\"alert alert-danger\" [hidden]=\"!error\">\n          {{error}}\n        </div>\n        <div class=\"form-group row\">\n          <label for=\"inputEmail3\" class=\"col-sm-2 col-form-label\">Email</label>\n          <div class=\"col-sm-10\">\n            <input type=\"email\" name=\"email\" class=\"form-control\" id=\"inputEmail3\" placeholder=\"Email\" [(ngModel)]=\"form.email\" required>\n          </div>\n        </div>\n\n        <div class=\"form-group row\">\n          <label for=\"inputPassword3\" class=\"col-sm-2 col-form-label\">Password</label>\n          <div class=\"col-sm-10\">\n            <input type=\"password\" name=\"password\" class=\"form-control\" id=\"inputPassword3\" placeholder=\"Password\" [(ngModel)]=\"form.password\"\n              required>\n          </div>\n        </div>\n\n        <div class=\"form-group row\">\n          <div class=\"col-sm-10 offset-2\">\n\n            <button type=\"submit\" class=\"btn btn-primary\" [disabled]=\"!loginForm.valid\">Sign in</button>\n\n            <a routerLink=\"/signup\" class=\"btn btn-info float-right\">Sign Up</a>\n\n          </div>\n        </div>\n        <small class=float-right>\n          <a routerLink=\"/request-password-reset\">Reset Password</a>\n        </small>\n      </form>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/components/login/login.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return LoginComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_jarwis_service__ = __webpack_require__("./src/app/services/jarwis.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_token_service__ = __webpack_require__("./src/app/services/token.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__services_auth_service__ = __webpack_require__("./src/app/services/auth.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};





var LoginComponent = /** @class */ (function () {
    function LoginComponent(Jarwis, Token, router, Auth) {
        this.Jarwis = Jarwis;
        this.Token = Token;
        this.router = router;
        this.Auth = Auth;
        this.form = {
            email: null,
            password: null
        };
        this.error = null;
    }
    LoginComponent.prototype.onSubmit = function () {
        var _this = this;
        this.Jarwis.login(this.form).subscribe(function (data) { return _this.handleResponse(data); }, function (error) { return _this.handleError(error); });
    };
    LoginComponent.prototype.handleResponse = function (data) {
        this.Token.handle(data.access_token);
        this.Auth.changeAuthStatus(true);
        this.router.navigateByUrl('/profile');
    };
    LoginComponent.prototype.handleError = function (error) {
        this.error = error.error.error;
    };
    LoginComponent.prototype.ngOnInit = function () {
    };
    LoginComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-login',
            template: __webpack_require__("./src/app/components/login/login.component.html"),
            styles: [__webpack_require__("./src/app/components/login/login.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_jarwis_service__["a" /* JarwisService */],
            __WEBPACK_IMPORTED_MODULE_2__services_token_service__["a" /* TokenService */],
            __WEBPACK_IMPORTED_MODULE_3__angular_router__["b" /* Router */],
            __WEBPACK_IMPORTED_MODULE_4__services_auth_service__["a" /* AuthService */]])
    ], LoginComponent);
    return LoginComponent;
}());



/***/ }),

/***/ "./src/app/components/navbar/navbar.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/components/navbar/navbar.component.html":
/***/ (function(module, exports) {

module.exports = "<nav class=\"navbar navbar-light bg-light justify-content-between\">\n  <a class=\"navbar-brand\">Navbar</a>\n  <div>\n    <a class=\"navbar-brand\" routerLink=\"login\" *ngIf=\"!loggedIn\">Login</a>\n    <a class=\"navbar-brand\" href=\"#\" (click)=\"logout($event)\" *ngIf=\"loggedIn\">Logout</a>\n    <a class=\"navbar-brand\" routerLink=\"profile\" *ngIf=\"loggedIn\">Profile</a>\n  </div>\n\n</nav>"

/***/ }),

/***/ "./src/app/components/navbar/navbar.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return NavbarComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_auth_service__ = __webpack_require__("./src/app/services/auth.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__services_token_service__ = __webpack_require__("./src/app/services/token.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var NavbarComponent = /** @class */ (function () {
    function NavbarComponent(Auth, router, Token) {
        this.Auth = Auth;
        this.router = router;
        this.Token = Token;
    }
    NavbarComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.Auth.authStatus.subscribe(function (value) { return _this.loggedIn = value; });
    };
    NavbarComponent.prototype.logout = function (event) {
        event.preventDefault();
        this.Token.remove();
        this.Auth.changeAuthStatus(false);
        this.router.navigateByUrl('/login');
    };
    NavbarComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-navbar',
            template: __webpack_require__("./src/app/components/navbar/navbar.component.html"),
            styles: [__webpack_require__("./src/app/components/navbar/navbar.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_auth_service__["a" /* AuthService */],
            __WEBPACK_IMPORTED_MODULE_2__angular_router__["b" /* Router */],
            __WEBPACK_IMPORTED_MODULE_3__services_token_service__["a" /* TokenService */]])
    ], NavbarComponent);
    return NavbarComponent;
}());



/***/ }),

/***/ "./src/app/components/password/request-reset/request-reset.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/components/password/request-reset/request-reset.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"mt-4 col-8 offset-2\">\n  <div class=\"card\">\n    <div class=\"card-header\">Send Email for Reset password</div>\n    <div class=\"card-body\">\n      <form #RequestResetForm=ngForm (ngSubmit)=\"onSubmit()\">\n        <div class=\"form-group row\">\n          <label for=\"inputEmail3\" class=\"col-sm-2 col-form-label\">Email</label>\n          <div class=\"col-sm-10\">\n            <input type=\"email\" name=\"email\" class=\"form-control\" id=\"inputEmail3\" placeholder=\"Email\" [(ngModel)]=\"form.email\" required>\n          </div>\n        </div>\n\n        <div class=\"form-group row\">\n          <div class=\"col-sm-10 offset-2\">\n\n            <button type=\"submit\" class=\"btn btn-primary\" [disabled]=\"!RequestResetForm.valid\">Send Password Reset Email</button>\n\n          </div>\n        </div>\n      </form>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/components/password/request-reset/request-reset.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return RequestResetComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_jarwis_service__ = __webpack_require__("./src/app/services/jarwis.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_ng_snotify__ = __webpack_require__("./node_modules/ng-snotify/index.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var RequestResetComponent = /** @class */ (function () {
    function RequestResetComponent(Jarvis, notify, Notfiy) {
        this.Jarvis = Jarvis;
        this.notify = notify;
        this.Notfiy = Notfiy;
        this.form = {
            email: null
        };
    }
    RequestResetComponent.prototype.ngOnInit = function () {
    };
    RequestResetComponent.prototype.onSubmit = function () {
        var _this = this;
        this.Notfiy.info('Wait...', { timeout: 5000 });
        this.Jarvis.sendPasswordResetLink(this.form).subscribe(function (data) { return _this.handleResponse(data); }, function (error) { return _this.notify.error(error.error.error); });
    };
    RequestResetComponent.prototype.handleResponse = function (res) {
        this.Notfiy.success(res.data, { timeout: 0 });
        this.form.email = null;
    };
    RequestResetComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-request-reset',
            template: __webpack_require__("./src/app/components/password/request-reset/request-reset.component.html"),
            styles: [__webpack_require__("./src/app/components/password/request-reset/request-reset.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_jarwis_service__["a" /* JarwisService */],
            __WEBPACK_IMPORTED_MODULE_2_ng_snotify__["b" /* SnotifyService */],
            __WEBPACK_IMPORTED_MODULE_2_ng_snotify__["b" /* SnotifyService */]])
    ], RequestResetComponent);
    return RequestResetComponent;
}());



/***/ }),

/***/ "./src/app/components/password/response-reset/response-reset.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/components/password/response-reset/response-reset.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"mt-4 col-8 offset-2\">\n  <div class=\"card\">\n    <div class=\"card-header\">Reset Password</div>\n    <div class=\"card-body\">\n      <form #ResetPasswordForm=ngForm (ngSubmit)=\"onSubmit()\">\n\n        <div class=\"form-group row\">\n          <label for=\"inputEmail3\" class=\"col-sm-2 col-form-label\">Email</label>\n          <div class=\"col-sm-10\">\n            <input type=\"email\" name=\"email\" class=\"form-control\" id=\"inputEmail3\" placeholder=\"Email\" [(ngModel)]=\"form.email\" required>\n            <span class=\"text-danger\" [hidden]=\"!error.email\">{{error.email}}</span>\n          </div>\n        </div>\n\n        <div class=\"form-group row\">\n          <label for=\"inputPassword3\" class=\"col-sm-2 col-form-label\">Password</label>\n          <div class=\"col-sm-10\">\n            <input type=\"password\" name=\"password\" class=\"form-control\" id=\"inputPassword3\" placeholder=\"Password\" [(ngModel)]=\"form.password\"\n              required>\n              <span class=\"text-danger\" [hidden]=\"!error.password\">{{error.password}}</span>\n          </div>\n        </div>\n        \n        <div class=\"form-group row\">\n          <label for=\"inputPassword4\" class=\"col-sm-2 col-form-label\">Confirm Password</label>\n          <div class=\"col-sm-10\">\n            <input type=\"password\" name=\"password_confirmation\" class=\"form-control\" id=\"inputPassword4\" placeholder=\"Confirm Password\" [(ngModel)]=\"form.password_confirmation\"\n              required>\n              <span class=\"text-danger\" [hidden]=\"!error.password_confirmation\">{{error.password_confirmation}}</span>\n          </div>\n        </div>\n\n        <div class=\"form-group row\">\n          <div class=\"col-sm-10 offset-2\">\n\n            <button type=\"submit\" class=\"btn btn-primary\" [disabled]=\"!ResetPasswordForm.valid\">Change Password</button>\n          </div>\n        </div>\n      </form>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/components/password/response-reset/response-reset.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ResponseResetComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_jarwis_service__ = __webpack_require__("./src/app/services/jarwis.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_ng_snotify__ = __webpack_require__("./node_modules/ng-snotify/index.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var ResponseResetComponent = /** @class */ (function () {
    function ResponseResetComponent(route, Jarwis, router, Notify) {
        var _this = this;
        this.route = route;
        this.Jarwis = Jarwis;
        this.router = router;
        this.Notify = Notify;
        this.error = [];
        this.form = {
            email: null,
            password: null,
            password_confirmation: null,
            resetToken: null
        };
        route.queryParams.subscribe(function (params) {
            _this.form.resetToken = params['token'];
        });
    }
    ResponseResetComponent.prototype.onSubmit = function () {
        var _this = this;
        this.Jarwis.changePassword(this.form).subscribe(function (data) { return _this.handleResponse(data); }, function (error) { return _this.handleError(error); });
    };
    ResponseResetComponent.prototype.handleResponse = function (data) {
        var _this = this;
        var _router = this.router;
        this.Notify.confirm('Done!, Now login with new Password', {
            buttons: [
                { text: 'Okay',
                    action: function (toster) {
                        _router.navigateByUrl('/login'),
                            _this.Notify.remove(toster.id);
                    }
                },
            ]
        });
    };
    ResponseResetComponent.prototype.handleError = function (error) {
        this.error = error.error.errors;
    };
    ResponseResetComponent.prototype.ngOnInit = function () {
    };
    ResponseResetComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-response-reset',
            template: __webpack_require__("./src/app/components/password/response-reset/response-reset.component.html"),
            styles: [__webpack_require__("./src/app/components/password/response-reset/response-reset.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_router__["a" /* ActivatedRoute */],
            __WEBPACK_IMPORTED_MODULE_2__services_jarwis_service__["a" /* JarwisService */],
            __WEBPACK_IMPORTED_MODULE_1__angular_router__["b" /* Router */],
            __WEBPACK_IMPORTED_MODULE_3_ng_snotify__["b" /* SnotifyService */]])
    ], ResponseResetComponent);
    return ResponseResetComponent;
}());



/***/ }),

/***/ "./src/app/components/profile/profile.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/components/profile/profile.component.html":
/***/ (function(module, exports) {

module.exports = "<p>\n  profile works!\n</p>\n"

/***/ }),

/***/ "./src/app/components/profile/profile.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProfileComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var ProfileComponent = /** @class */ (function () {
    function ProfileComponent() {
    }
    ProfileComponent.prototype.ngOnInit = function () {
    };
    ProfileComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-profile',
            template: __webpack_require__("./src/app/components/profile/profile.component.html"),
            styles: [__webpack_require__("./src/app/components/profile/profile.component.css")]
        }),
        __metadata("design:paramtypes", [])
    ], ProfileComponent);
    return ProfileComponent;
}());



/***/ }),

/***/ "./src/app/components/signup/signup.component.css":
/***/ (function(module, exports) {

module.exports = ""

/***/ }),

/***/ "./src/app/components/signup/signup.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"mt-4 col-8 offset-2\">\n  <div class=\"card\">\n    <div class=\"card-header\">Register Here</div>\n    <div class=\"card-body\">\n      <form #signupForm=ngForm (ngSubmit)=\"onSubmit()\">\n        <div class=\"form-group row\">\n          <label for=\"inputName3\" class=\"col-sm-2 col-form-label\">Name</label>\n          <div class=\"col-sm-10\">\n            <input type=\"text\" name=\"name\" class=\"form-control\" id=\"inputname3\" placeholder=\"Name\" [(ngModel)]=\"form.name\" required>\n            <div class=\"alert alert-danger\" [hidden]=\"!error.name\">\n              {{error.name}}\n            </div>\n          </div>\n        </div>\n\n        <div class=\"form-group row\">\n          <label for=\"inputEmail3\" class=\"col-sm-2 col-form-label\">Email</label>\n          <div class=\"col-sm-10\">\n            <input type=\"email\" name=\"email\" class=\"form-control\" id=\"inputEmail3\" placeholder=\"Email\" [(ngModel)]=\"form.email\" required>\n            <div class=\"alert alert-danger\" [hidden]=\"!error.email\">\n              {{error.email}}\n            </div>\n          </div>\n        </div>\n\n        <div class=\"form-group row\">\n          <label for=\"inputPasswordConfirmation3\" class=\"col-sm-2 col-form-label\">Password</label>\n          <div class=\"col-sm-10\">\n            <input type=\"password\" name=\"password\" class=\"form-control\" id=\"inputPasswordConfirmation3\" placeholder=\"Confirm Password\"\n              [(ngModel)]=\"form.password\" required>\n            <div class=\"alert alert-danger\" [hidden]=\"!error.password\">\n              {{error.password}}\n            </div>\n          </div>\n        </div>\n\n        <div class=\"form-group row\">\n          <label for=\"inputPassword3\" class=\"col-sm-2 col-form-label\">Confirm Password</label>\n          <div class=\"col-sm-10\">\n            <input type=\"password\" name=\"password_confirmation\" class=\"form-control\" id=\"inputPassword3\" placeholder=\"Password\" [(ngModel)]=\"form.password_confirmation\"\n              required>\n          </div>\n        </div>\n\n        <div class=\"form-group row\">\n          <div class=\"col-sm-10 offset-2\">\n\n            <button type=\"submit\" class=\"btn btn-primary\" [disabled]=\"!signupForm.valid\">Sign Up</button>\n\n            <a routerLink=\"/login\" class=\"btn btn-info float-right\">Sign in</a>\n\n          </div>\n        </div>\n\n      </form>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "./src/app/components/signup/signup.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SignupComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_jarwis_service__ = __webpack_require__("./src/app/services/jarwis.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_token_service__ = __webpack_require__("./src/app/services/token.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_router__ = __webpack_require__("./node_modules/@angular/router/esm5/router.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var SignupComponent = /** @class */ (function () {
    function SignupComponent(Jarwis, Token, router) {
        this.Jarwis = Jarwis;
        this.Token = Token;
        this.router = router;
        this.form = {
            email: null,
            name: null,
            password: null,
            password_confirmation: null
        };
        this.error = [];
    }
    SignupComponent.prototype.onSubmit = function () {
        var _this = this;
        this.Jarwis.signup(this.form).subscribe(function (data) { return _this.handleResponse(data); }, function (error) { return _this.handleError(error); });
    };
    SignupComponent.prototype.handleResponse = function (data) {
        this.Token.handle(data.access_token);
        this.router.navigateByUrl('/profile');
    };
    SignupComponent.prototype.handleError = function (error) {
        this.error = error.error.errors;
    };
    SignupComponent.prototype.ngOnInit = function () {
    };
    SignupComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["n" /* Component */])({
            selector: 'app-signup',
            template: __webpack_require__("./src/app/components/signup/signup.component.html"),
            styles: [__webpack_require__("./src/app/components/signup/signup.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__services_jarwis_service__["a" /* JarwisService */],
            __WEBPACK_IMPORTED_MODULE_2__services_token_service__["a" /* TokenService */],
            __WEBPACK_IMPORTED_MODULE_3__angular_router__["b" /* Router */]])
    ], SignupComponent);
    return SignupComponent;
}());



/***/ }),

/***/ "./src/app/services/after-login.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AfterLoginService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__token_service__ = __webpack_require__("./src/app/services/token.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var AfterLoginService = /** @class */ (function () {
    function AfterLoginService(Token) {
        this.Token = Token;
    }
    AfterLoginService.prototype.canActivate = function (route, state) {
        return this.Token.loggedIn();
    };
    AfterLoginService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__token_service__["a" /* TokenService */]])
    ], AfterLoginService);
    return AfterLoginService;
}());



/***/ }),

/***/ "./src/app/services/auth.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AuthService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject__ = __webpack_require__("./node_modules/rxjs/_esm5/BehaviorSubject.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__token_service__ = __webpack_require__("./src/app/services/token.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};



var AuthService = /** @class */ (function () {
    function AuthService(Token) {
        this.Token = Token;
        this.loggedIn = new __WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject__["a" /* BehaviorSubject */](this.Token.loggedIn());
        this.authStatus = this.loggedIn.asObservable();
    }
    AuthService.prototype.changeAuthStatus = function (value) {
        this.loggedIn.next(value);
    };
    AuthService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__token_service__["a" /* TokenService */]])
    ], AuthService);
    return AuthService;
}());



/***/ }),

/***/ "./src/app/services/before-login.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return BeforeLoginService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__token_service__ = __webpack_require__("./src/app/services/token.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var BeforeLoginService = /** @class */ (function () {
    function BeforeLoginService(Token) {
        this.Token = Token;
    }
    BeforeLoginService.prototype.canActivate = function (route, state) {
        return !this.Token.loggedIn();
    };
    BeforeLoginService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__token_service__["a" /* TokenService */]])
    ], BeforeLoginService);
    return BeforeLoginService;
}());



/***/ }),

/***/ "./src/app/services/jarwis.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return JarwisService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common_http__ = __webpack_require__("./node_modules/@angular/common/esm5/http.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var JarwisService = /** @class */ (function () {
    function JarwisService(http) {
        this.http = http;
        this.baseUrl = 'http://localhost:8000/api';
    }
    JarwisService.prototype.signup = function (data) {
        return this.http.post(this.baseUrl + "/signup", data);
    };
    JarwisService.prototype.login = function (data) {
        return this.http.post(this.baseUrl + "/login", data);
    };
    JarwisService.prototype.sendPasswordResetLink = function (data) {
        return this.http.post(this.baseUrl + "/sendPasswordResetLink", data);
    };
    JarwisService.prototype.changePassword = function (data) {
        return this.http.post(this.baseUrl + "/resetPassword", data);
    };
    JarwisService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_common_http__["a" /* HttpClient */]])
    ], JarwisService);
    return JarwisService;
}());



/***/ }),

/***/ "./src/app/services/token.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TokenService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var TokenService = /** @class */ (function () {
    function TokenService() {
        this.iss = {
            login: 'http://localhost:8000/api/login',
            signup: 'http://localhost:8000/api/signup'
        };
    }
    TokenService.prototype.handle = function (token) {
        this.set(token);
    };
    TokenService.prototype.set = function (token) {
        localStorage.setItem('token', token);
    };
    TokenService.prototype.get = function () {
        return localStorage.getItem('token');
    };
    TokenService.prototype.remove = function () {
        localStorage.removeItem('token');
    };
    TokenService.prototype.isValid = function () {
        var token = this.get();
        if (token) {
            var payload = this.payload(token);
            if (payload) {
                return Object.values(this.iss).indexOf(payload.iss) > -1 ? true : false;
            }
        }
        return false;
    };
    TokenService.prototype.payload = function (token) {
        var payload = token.split('.')[1];
        return this.decode(payload);
    };
    TokenService.prototype.decode = function (payload) {
        return JSON.parse(atob(payload));
    };
    TokenService.prototype.loggedIn = function () {
        return this.isValid();
    };
    TokenService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["A" /* Injectable */])(),
        __metadata("design:paramtypes", [])
    ], TokenService);
    return TokenService;
}());



/***/ }),

/***/ "./src/environments/environment.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return environment; });
// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.
var environment = {
    production: false
};


/***/ }),

/***/ "./src/main.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("./node_modules/@angular/core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__ = __webpack_require__("./node_modules/@angular/platform-browser-dynamic/esm5/platform-browser-dynamic.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__app_app_module__ = __webpack_require__("./src/app/app.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__environments_environment__ = __webpack_require__("./src/environments/environment.ts");




if (__WEBPACK_IMPORTED_MODULE_3__environments_environment__["a" /* environment */].production) {
    Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_13" /* enableProdMode */])();
}
Object(__WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_2__app_app_module__["a" /* AppModule */])
    .catch(function (err) { return console.log(err); });


/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./src/main.ts");


/***/ })

},[0]);
//# sourceMappingURL=main.bundle.js.map