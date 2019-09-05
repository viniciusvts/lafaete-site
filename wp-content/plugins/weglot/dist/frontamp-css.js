/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/dist/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./app/styles/amp.scss");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./app/styles/index-amp.scss":
/*!***********************************!*\
  !*** ./app/styles/amp.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("throw new Error(\"Module build failed (from ./node_modules/css-loader/index.js):\\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/lib/loader.js):\\nError: Missing binding /Users/remy/DEV/wordpress2/wp-content/plugins/weglot/node_modules/node-sass/vendor/darwin-x64-64/binding.node\\nNode Sass could not find a binding for your current environment: OS X 64-bit with Node.js 10.x\\n\\nFound bindings for the following environments:\\n  - OS X 64-bit with Node.js 9.x\\n\\nThis usually happens because your environment has changed since running `npm install`.\\nRun `npm rebuild node-sass` to download the binding for your current environment.\\n    at module.exports (/Users/remy/DEV/wordpress2/wp-content/plugins/weglot/node_modules/node-sass/lib/binding.js:15:13)\\n    at Object.<anonymous> (/Users/remy/DEV/wordpress2/wp-content/plugins/weglot/node_modules/node-sass/lib/index.js:14:35)\\n    at Module._compile (/usr/local/lib/node_modules/webpack-cli/node_modules/v8-compile-cache/v8-compile-cache.js:178:30)\\n    at Object.Module._extensions..js (internal/modules/cjs/loader.js:700:10)\\n    at Module.load (internal/modules/cjs/loader.js:599:32)\\n    at tryModuleLoad (internal/modules/cjs/loader.js:538:12)\\n    at Function.Module._load (internal/modules/cjs/loader.js:530:3)\\n    at Module.require (internal/modules/cjs/loader.js:637:17)\\n    at require (/usr/local/lib/node_modules/webpack-cli/node_modules/v8-compile-cache/v8-compile-cache.js:159:20)\\n    at Object.sassLoader (/Users/remy/DEV/wordpress2/wp-content/plugins/weglot/node_modules/sass-loader/lib/loader.js:24:22)\\n    at runLoaders (/usr/local/lib/node_modules/webpack/lib/NormalModule.js:303:20)\\n    at /usr/local/lib/node_modules/webpack/node_modules/loader-runner/lib/LoaderRunner.js:364:11\\n    at /usr/local/lib/node_modules/webpack/node_modules/loader-runner/lib/LoaderRunner.js:230:18\\n    at runSyncOrAsync (/usr/local/lib/node_modules/webpack/node_modules/loader-runner/lib/LoaderRunner.js:143:3)\\n    at iterateNormalLoaders (/usr/local/lib/node_modules/webpack/node_modules/loader-runner/lib/LoaderRunner.js:229:2)\\n    at iterateNormalLoaders (/usr/local/lib/node_modules/webpack/node_modules/loader-runner/lib/LoaderRunner.js:218:10)\\n    at /usr/local/lib/node_modules/webpack/node_modules/loader-runner/lib/LoaderRunner.js:233:3\\n    at context.callback (/usr/local/lib/node_modules/webpack/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\\n    at postcss.process.then (/Users/remy/DEV/wordpress2/wp-content/plugins/weglot/node_modules/postcss-loader/lib/index.js:187:9)\");\n\n//# sourceURL=webpack:///./app/styles/amp.scss?");

/***/ })

/******/ });