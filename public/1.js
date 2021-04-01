(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pages/PageItem.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/pages/PageItem.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
!(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-1/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
!(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-2/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
!(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-6/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
!(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-7/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
!(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-9/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      settings: {},
      page: {}
    };
  },
  created: function created() {
    var _this = this;

    fetch("http://localhost/api/front/settings/").then(function (response) {
      return response.json();
    }).then(function (json) {
      _this.settings = json;
    });
    fetch("http://localhost/api/front/page/".concat(this.$route.params.id)).then(function (response) {
      return response.json();
    }).then(function (json) {
      _this.page = json;
    });
  },
  components: {
    MedPageType1Horizontal: !(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-1/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    MedPageType2Horizontal: !(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-2/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    MedPageType6Horizontal: !(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-6/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    MedPageType7Horizontal: !(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-7/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
    MedPageType9Horizontal: !(function webpackMissingModule() { var e = new Error("Cannot find module '@/components/pages/med/type-9/horizontal'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pages/PageItem.vue?vue&type=template&id=b880f650&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/pages/PageItem.vue?vue&type=template&id=b880f650& ***!
  \*****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _vm.settings.theme === "med"
      ? _c(
          "div",
          _vm._l(_vm.page.types, function(type) {
            return _c("div", { staticClass: "container" }, [
              _c(
                "div",
                { staticClass: "page-item" },
                [
                  type.id == "1"
                    ? _c("MedPageType1Horizontal")
                    : type.id == "2"
                    ? _c("MedPageType2Horizontal")
                    : type.id == "6"
                    ? _c("MedPageType6Horizontal")
                    : type.id == "7"
                    ? _c("MedPageType7Horizontal")
                    : type.id == "9"
                    ? _c("MedPageType9Horizontal")
                    : _vm._e()
                ],
                1
              )
            ])
          }),
          0
        )
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/pages/PageItem.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/pages/PageItem.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PageItem_vue_vue_type_template_id_b880f650___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PageItem.vue?vue&type=template&id=b880f650& */ "./resources/js/components/pages/PageItem.vue?vue&type=template&id=b880f650&");
/* harmony import */ var _PageItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PageItem.vue?vue&type=script&lang=js& */ "./resources/js/components/pages/PageItem.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PageItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PageItem_vue_vue_type_template_id_b880f650___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PageItem_vue_vue_type_template_id_b880f650___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/pages/PageItem.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/pages/PageItem.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/pages/PageItem.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PageItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./PageItem.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pages/PageItem.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PageItem_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/pages/PageItem.vue?vue&type=template&id=b880f650&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/pages/PageItem.vue?vue&type=template&id=b880f650& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PageItem_vue_vue_type_template_id_b880f650___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./PageItem.vue?vue&type=template&id=b880f650& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pages/PageItem.vue?vue&type=template&id=b880f650&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PageItem_vue_vue_type_template_id_b880f650___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PageItem_vue_vue_type_template_id_b880f650___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);