/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/blocks/form-selection-block.js":
/*!***********************************************!*\
  !*** ./src/js/blocks/form-selection-block.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_1__);


(function (blocks, i18n, element, blockEditor, components, compose, editor_block_data, wp) {
  console.log(element);
  if (element === undefined) {
    return;
  }
  var el = element.createElement,
    __ = i18n.__,
    AlignmentToolbar = blockEditor.AlignmentToolbar,
    ToggleControl = components.ToggleControl,
    Dropdown = components.Dropdown,
    Button = components.Button,
    BlockControls = blockEditor.BlockControls,
    Disabled = blockEditor.Disabled,
    InputControl = components.__experimentalInputControl,
    SelectControl = components.SelectControl,
    withState = compose.withState,
    translations = editor_block_data.translations,
    editor_pro_settings = editor_block_data.editor_pro_settings;

  /**
   * Message in post
   */
  if (editor_block_data.fe_show_warning_message) {
    wp.data.dispatch('core/notices').createNotice('error',
    // Can be one of: success, info, warning, error.
    translations.fe_edit_message,
    // Text string to display.
    {
      isDismissible: false,
      // Whether the user can dismiss the notice.
      // Any actions the user can perform.
      actions: [{
        url: editor_block_data.fe_edit_link,
        label: translations.fe_edit_link_text
      }]
    });
  }
  blocks.registerBlockType('bfe/bfe-block', {
    title: __('Front Editor', 'front-editor'),
    icon: 'edit',
    category: 'common',
    multiple: false,
    html: false,
    attributes: {
      id: {
        type: 'string',
        default: 'false'
      }
    },
    edit: function (props) {
      console.log(props.attributes.id);
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "editor-block-settings"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", {
        className: "title"
      }, translations.title), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "setting-wrap header-settings"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
        label: translations.form_builder_id,
        value: props.attributes.id,
        onChange: value => {
          props.setAttributes({
            id: value
          });
        },
        options: editor_block_data.post_form_list
      }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Button, {
        isSecondary: true,
        href: editor_block_data.create_new_post_form_link,
        target: "_blank"
      }, translations.create_new_form)));
    },
    save: function (props) {
      return null;
    }
  });
})(window.wp.blocks, window.wp.i18n, window.wp.element, wp.blockEditor, window.wp.components, window.wp.compose, window.editor_block_data, window.wp);

/***/ }),

/***/ "@wordpress/compose":
/*!*********************************!*\
  !*** external ["wp","compose"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["compose"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**************************!*\
  !*** ./src/gutenberg.js ***!
  \**************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_blocks_form_selection_block_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js/blocks/form-selection-block.js */ "./src/js/blocks/form-selection-block.js");

})();

/******/ })()
;
//# sourceMappingURL=gutenberg.js.map