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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/lightgallery/src/css/lightgallery.css":
/*!**********************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--16-1!./node_modules/postcss-loader/src??ref--16-2!./node_modules/lightgallery/src/css/lightgallery.css ***!
  \**********************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var escape = __webpack_require__(/*! ../../../css-loader/lib/url/escape.js */ "./node_modules/css-loader/lib/url/escape.js");
exports = module.exports = __webpack_require__(/*! ../../../css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "@font-face {\n  font-family: 'lg';\n\n  src: url(" + escape(__webpack_require__(/*! ../fonts/lg.ttf?22t19m */ "./node_modules/lightgallery/src/fonts/lg.ttf?22t19m")) + ") format(\"truetype\"), url(" + escape(__webpack_require__(/*! ../fonts/lg.woff?22t19m */ "./node_modules/lightgallery/src/fonts/lg.woff?22t19m")) + ") format(\"woff\"), url(" + escape(__webpack_require__(/*! ../fonts/lg.svg?22t19m */ "./node_modules/lightgallery/src/fonts/lg.svg?22t19m")) + "#lg) format(\"svg\");\n\n  font-weight: normal;\n\n  font-style: normal;\n\n  font-display: block;\n}\n\n.lg-icon {\n  /* use !important to prevent issues with browser extensions that change fonts */\n  font-family: 'lg' !important;\n  speak: never;\n  font-style: normal;\n  font-weight: normal;\n  font-variant: normal;\n  text-transform: none;\n  line-height: 1;\n  /* Better Font Rendering =========== */\n  -webkit-font-smoothing: antialiased;\n  -moz-osx-font-smoothing: grayscale;\n}\n\n.lg-actions .lg-next, .lg-actions .lg-prev {\n  background-color: rgba(0, 0, 0, 0.45);\n  border-radius: 2px;\n  color: #999;\n  cursor: pointer;\n  display: block;\n  font-size: 22px;\n  margin-top: -10px;\n  padding: 8px 10px 9px;\n  position: absolute;\n  top: 50%;\n  z-index: 1080;\n  border: none;\n  outline: none;\n}\n\n.lg-actions .lg-next.disabled, .lg-actions .lg-prev.disabled {\n  pointer-events: none;\n  opacity: 0.5;\n}\n\n.lg-actions .lg-next:hover, .lg-actions .lg-prev:hover {\n  color: #FFF;\n}\n\n.lg-actions .lg-next {\n  right: 20px;\n}\n\n.lg-actions .lg-next:before {\n  content: \"\\E095\";\n}\n\n.lg-actions .lg-prev {\n  left: 20px;\n}\n\n.lg-actions .lg-prev:after {\n  content: \"\\E094\";\n}\n\n@-webkit-keyframes lg-right-end {\n  0% {\n    left: 0;\n  }\n\n  50% {\n    left: -30px;\n  }\n\n  100% {\n    left: 0;\n  }\n}\n\n@keyframes lg-right-end {\n  0% {\n    left: 0;\n  }\n\n  50% {\n    left: -30px;\n  }\n\n  100% {\n    left: 0;\n  }\n}\n\n@-webkit-keyframes lg-left-end {\n  0% {\n    left: 0;\n  }\n\n  50% {\n    left: 30px;\n  }\n\n  100% {\n    left: 0;\n  }\n}\n\n@keyframes lg-left-end {\n  0% {\n    left: 0;\n  }\n\n  50% {\n    left: 30px;\n  }\n\n  100% {\n    left: 0;\n  }\n}\n\n.lg-outer.lg-right-end .lg-object {\n  -webkit-animation: lg-right-end 0.3s;\n  animation: lg-right-end 0.3s;\n  position: relative;\n}\n\n.lg-outer.lg-left-end .lg-object {\n  -webkit-animation: lg-left-end 0.3s;\n  animation: lg-left-end 0.3s;\n  position: relative;\n}\n\n.lg-toolbar {\n  z-index: 1082;\n  left: 0;\n  position: absolute;\n  top: 0;\n  width: 100%;\n  background-color: rgba(0, 0, 0, 0.45);\n}\n\n.lg-toolbar .lg-icon {\n  color: #999;\n  cursor: pointer;\n  float: right;\n  font-size: 24px;\n  height: 47px;\n  line-height: 27px;\n  padding: 10px 0;\n  text-align: center;\n  width: 50px;\n  text-decoration: none !important;\n  outline: medium none;\n  background: none;\n  border: none;\n  box-shadow: none;\n  transition: color 0.2s linear;\n}\n\n.lg-toolbar .lg-icon:hover {\n  color: #FFF;\n}\n\n.lg-toolbar .lg-close:after {\n  content: \"\\E070\";\n}\n\n.lg-toolbar .lg-download:after {\n  content: \"\\E0F2\";\n}\n\n.lg-sub-html {\n  background-color: rgba(0, 0, 0, 0.45);\n  bottom: 0;\n  color: #EEE;\n  font-size: 16px;\n  left: 0;\n  padding: 10px 40px;\n  position: fixed;\n  right: 0;\n  text-align: center;\n  z-index: 1080;\n}\n\n.lg-sub-html h4 {\n  margin: 0;\n  font-size: 13px;\n  font-weight: bold;\n}\n\n.lg-sub-html p {\n  font-size: 12px;\n  margin: 5px 0 0;\n}\n\n#lg-counter {\n  color: #999;\n  display: inline-block;\n  font-size: 16px;\n  padding-left: 20px;\n  padding-top: 12px;\n  vertical-align: middle;\n}\n\n.lg-toolbar, .lg-prev, .lg-next {\n  opacity: 1;\n  transition: transform 0.35s cubic-bezier(0, 0, 0.25, 1) 0s, opacity 0.35s cubic-bezier(0, 0, 0.25, 1) 0s, color 0.2s linear;\n}\n\n.lg-hide-items .lg-prev {\n  opacity: 0;\n  transform: translate3d(-10px, 0, 0);\n}\n\n.lg-hide-items .lg-next {\n  opacity: 0;\n  transform: translate3d(10px, 0, 0);\n}\n\n.lg-hide-items .lg-toolbar {\n  opacity: 0;\n  transform: translate3d(0, -10px, 0);\n}\n\nbody:not(.lg-from-hash) .lg-outer.lg-start-zoom .lg-object {\n  transform: scale3d(0.5, 0.5, 0.5);\n  opacity: 0;\n  transition: transform 250ms cubic-bezier(0, 0, 0.25, 1) 0s, opacity 250ms cubic-bezier(0, 0, 0.25, 1) !important;\n  transform-origin: 50% 50%;\n}\n\nbody:not(.lg-from-hash) .lg-outer.lg-start-zoom .lg-item.lg-complete .lg-object {\n  transform: scale3d(1, 1, 1);\n  opacity: 1;\n}\n\n.lg-outer .lg-thumb-outer {\n  background-color: #0D0A0A;\n  bottom: 0;\n  position: absolute;\n  width: 100%;\n  z-index: 1080;\n  max-height: 350px;\n  transform: translate3d(0, 100%, 0);\n  transition: transform 0.25s cubic-bezier(0, 0, 0.25, 1) 0s;\n}\n\n.lg-outer .lg-thumb-outer.lg-grab .lg-thumb-item {\n  cursor: -webkit-grab;\n  cursor: -o-grab;\n  cursor: -ms-grab;\n  cursor: grab;\n}\n\n.lg-outer .lg-thumb-outer.lg-grabbing .lg-thumb-item {\n  cursor: move;\n  cursor: -webkit-grabbing;\n  cursor: -o-grabbing;\n  cursor: -ms-grabbing;\n  cursor: grabbing;\n}\n\n.lg-outer .lg-thumb-outer.lg-dragging .lg-thumb {\n  transition-duration: 0s !important;\n}\n\n.lg-outer.lg-thumb-open .lg-thumb-outer {\n  transform: translate3d(0, 0%, 0);\n}\n\n.lg-outer .lg-thumb {\n  padding: 10px 0;\n  height: 100%;\n  margin-bottom: -5px;\n}\n\n.lg-outer .lg-thumb-item {\n  border-radius: 5px;\n  cursor: pointer;\n  float: left;\n  overflow: hidden;\n  height: 100%;\n  border: 2px solid #FFF;\n  border-radius: 4px;\n  margin-bottom: 5px;\n}\n\n@media (min-width: 1025px) {\n  .lg-outer .lg-thumb-item {\n    transition: border-color 0.25s ease;\n  }\n}\n\n.lg-outer .lg-thumb-item.active, .lg-outer .lg-thumb-item:hover {\n  border-color: #a90707;\n}\n\n.lg-outer .lg-thumb-item img {\n  width: 100%;\n  height: 100%;\n  -o-object-fit: cover;\n     object-fit: cover;\n}\n\n.lg-outer.lg-has-thumb .lg-item {\n  padding-bottom: 120px;\n}\n\n.lg-outer.lg-can-toggle .lg-item {\n  padding-bottom: 0;\n}\n\n.lg-outer.lg-pull-caption-up .lg-sub-html {\n  transition: bottom 0.25s ease;\n}\n\n.lg-outer.lg-pull-caption-up.lg-thumb-open .lg-sub-html {\n  bottom: 100px;\n}\n\n.lg-outer .lg-toogle-thumb {\n  background-color: #0D0A0A;\n  border-radius: 2px 2px 0 0;\n  color: #999;\n  cursor: pointer;\n  font-size: 24px;\n  height: 39px;\n  line-height: 27px;\n  padding: 5px 0;\n  position: absolute;\n  right: 20px;\n  text-align: center;\n  top: -39px;\n  width: 50px;\n  outline: medium none;\n  border: none;\n}\n\n.lg-outer .lg-toogle-thumb:after {\n  content: \"\\E1FF\";\n}\n\n.lg-outer .lg-toogle-thumb:hover {\n  color: #FFF;\n}\n\n.lg-outer .lg-video-cont {\n  display: inline-block;\n  vertical-align: middle;\n  max-width: 1140px;\n  max-height: 100%;\n  width: 100%;\n  padding: 0 5px;\n}\n\n.lg-outer .lg-video {\n  width: 100%;\n  height: 0;\n  padding-bottom: 56.25%;\n  overflow: hidden;\n  position: relative;\n}\n\n.lg-outer .lg-video .lg-object {\n  display: inline-block;\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 100% !important;\n  height: 100% !important;\n}\n\n.lg-outer .lg-video .lg-video-play {\n  width: 84px;\n  height: 59px;\n  position: absolute;\n  left: 50%;\n  top: 50%;\n  margin-left: -42px;\n  margin-top: -30px;\n  z-index: 1080;\n  cursor: pointer;\n}\n\n.lg-outer .lg-has-iframe .lg-video {\n  -webkit-overflow-scrolling: touch;\n  overflow: auto;\n}\n\n.lg-outer .lg-has-vimeo .lg-video-play {\n  background: url(" + escape(__webpack_require__(/*! ../img/vimeo-play.png */ "./node_modules/lightgallery/src/img/vimeo-play.png")) + ") no-repeat scroll 0 0 transparent;\n}\n\n.lg-outer .lg-has-vimeo:hover .lg-video-play {\n  background: url(" + escape(__webpack_require__(/*! ../img/vimeo-play.png */ "./node_modules/lightgallery/src/img/vimeo-play.png")) + ") no-repeat scroll 0 -58px transparent;\n}\n\n.lg-outer .lg-has-html5 .lg-video-play {\n  background: transparent url(" + escape(__webpack_require__(/*! ../img/video-play.png */ "./node_modules/lightgallery/src/img/video-play.png")) + ") no-repeat scroll 0 0;\n  height: 64px;\n  margin-left: -32px;\n  margin-top: -32px;\n  width: 64px;\n  opacity: 0.8;\n}\n\n.lg-outer .lg-has-html5:hover .lg-video-play {\n  opacity: 1;\n}\n\n.lg-outer .lg-has-youtube .lg-video-play {\n  background: url(" + escape(__webpack_require__(/*! ../img/youtube-play.png */ "./node_modules/lightgallery/src/img/youtube-play.png")) + ") no-repeat scroll 0 0 transparent;\n}\n\n.lg-outer .lg-has-youtube:hover .lg-video-play {\n  background: url(" + escape(__webpack_require__(/*! ../img/youtube-play.png */ "./node_modules/lightgallery/src/img/youtube-play.png")) + ") no-repeat scroll 0 -60px transparent;\n}\n\n.lg-outer .lg-video-object {\n  width: 100% !important;\n  height: 100% !important;\n  position: absolute;\n  top: 0;\n  left: 0;\n}\n\n.lg-outer .lg-has-video .lg-video-object {\n  visibility: hidden;\n}\n\n.lg-outer .lg-has-video.lg-video-playing .lg-object, .lg-outer .lg-has-video.lg-video-playing .lg-video-play {\n  display: none;\n}\n\n.lg-outer .lg-has-video.lg-video-playing .lg-video-object {\n  visibility: visible;\n}\n\n.lg-progress-bar {\n  background-color: #333;\n  height: 5px;\n  left: 0;\n  position: absolute;\n  top: 0;\n  width: 100%;\n  z-index: 1083;\n  opacity: 0;\n  transition: opacity 0.08s ease 0s;\n}\n\n.lg-progress-bar .lg-progress {\n  background-color: #a90707;\n  height: 5px;\n  width: 0;\n}\n\n.lg-progress-bar.lg-start .lg-progress {\n  width: 100%;\n}\n\n.lg-show-autoplay .lg-progress-bar {\n  opacity: 1;\n}\n\n.lg-autoplay-button:after {\n  content: \"\\E01D\";\n}\n\n.lg-show-autoplay .lg-autoplay-button:after {\n  content: \"\\E01A\";\n}\n\n.lg-outer.lg-css3.lg-zoom-dragging .lg-item.lg-complete.lg-zoomable .lg-img-wrap, .lg-outer.lg-css3.lg-zoom-dragging .lg-item.lg-complete.lg-zoomable .lg-image {\n  transition-duration: 0s;\n}\n\n.lg-outer.lg-use-transition-for-zoom .lg-item.lg-complete.lg-zoomable .lg-img-wrap {\n  transition: transform 0.3s cubic-bezier(0, 0, 0.25, 1) 0s;\n}\n\n.lg-outer.lg-use-left-for-zoom .lg-item.lg-complete.lg-zoomable .lg-img-wrap {\n  transition: left 0.3s cubic-bezier(0, 0, 0.25, 1) 0s, top 0.3s cubic-bezier(0, 0, 0.25, 1) 0s;\n}\n\n.lg-outer .lg-item.lg-complete.lg-zoomable .lg-img-wrap {\n  transform: translate3d(0, 0, 0);\n  -webkit-backface-visibility: hidden;\n  backface-visibility: hidden;\n}\n\n.lg-outer .lg-item.lg-complete.lg-zoomable .lg-image {\n  transform: scale3d(1, 1, 1);\n  transition: transform 0.3s cubic-bezier(0, 0, 0.25, 1) 0s, opacity 0.15s !important;\n  transform-origin: 0 0;\n  -webkit-backface-visibility: hidden;\n  backface-visibility: hidden;\n}\n\n#lg-zoom-in:after {\n  content: \"\\E311\";\n}\n\n#lg-actual-size {\n  font-size: 20px;\n}\n\n#lg-actual-size:after {\n  content: \"\\E033\";\n}\n\n#lg-zoom-out {\n  opacity: 0.5;\n  pointer-events: none;\n}\n\n#lg-zoom-out:after {\n  content: \"\\E312\";\n}\n\n.lg-zoomed #lg-zoom-out {\n  opacity: 1;\n  pointer-events: auto;\n}\n\n.lg-outer .lg-pager-outer {\n  bottom: 60px;\n  left: 0;\n  position: absolute;\n  right: 0;\n  text-align: center;\n  z-index: 1080;\n  height: 10px;\n}\n\n.lg-outer .lg-pager-outer.lg-pager-hover .lg-pager-cont {\n  overflow: visible;\n}\n\n.lg-outer .lg-pager-cont {\n  cursor: pointer;\n  display: inline-block;\n  overflow: hidden;\n  position: relative;\n  vertical-align: top;\n  margin: 0 5px;\n}\n\n.lg-outer .lg-pager-cont:hover .lg-pager-thumb-cont {\n  opacity: 1;\n  transform: translate3d(0, 0, 0);\n}\n\n.lg-outer .lg-pager-cont.lg-pager-active .lg-pager {\n  box-shadow: 0 0 0 2px white inset;\n}\n\n.lg-outer .lg-pager-thumb-cont {\n  background-color: #fff;\n  color: #FFF;\n  bottom: 100%;\n  height: 83px;\n  left: 0;\n  margin-bottom: 20px;\n  margin-left: -60px;\n  opacity: 0;\n  padding: 5px;\n  position: absolute;\n  width: 120px;\n  border-radius: 3px;\n  transition: opacity 0.15s ease 0s, transform 0.15s ease 0s;\n  transform: translate3d(0, 5px, 0);\n}\n\n.lg-outer .lg-pager-thumb-cont img {\n  width: 100%;\n  height: 100%;\n}\n\n.lg-outer .lg-pager {\n  background-color: rgba(255, 255, 255, 0.5);\n  border-radius: 50%;\n  box-shadow: 0 0 0 8px rgba(255, 255, 255, 0.7) inset;\n  display: block;\n  height: 12px;\n  transition: box-shadow 0.3s ease 0s;\n  width: 12px;\n}\n\n.lg-outer .lg-pager:hover, .lg-outer .lg-pager:focus {\n  box-shadow: 0 0 0 8px white inset;\n}\n\n.lg-outer .lg-caret {\n  border-left: 10px solid transparent;\n  border-right: 10px solid transparent;\n  border-top: 10px dashed;\n  bottom: -10px;\n  display: inline-block;\n  height: 0;\n  left: 50%;\n  margin-left: -5px;\n  position: absolute;\n  vertical-align: middle;\n  width: 0;\n}\n\n.lg-fullscreen:after {\n  content: \"\\E20C\";\n}\n\n.lg-fullscreen-on .lg-fullscreen:after {\n  content: \"\\E20D\";\n}\n\n.lg-outer #lg-dropdown-overlay {\n  background-color: rgba(0, 0, 0, 0.25);\n  bottom: 0;\n  cursor: default;\n  left: 0;\n  position: fixed;\n  right: 0;\n  top: 0;\n  z-index: 1081;\n  opacity: 0;\n  visibility: hidden;\n  transition: visibility 0s linear 0.18s, opacity 0.18s linear 0s;\n}\n\n.lg-outer.lg-dropdown-active .lg-dropdown, .lg-outer.lg-dropdown-active #lg-dropdown-overlay {\n  transition-delay: 0s;\n  transform: translate3d(0, 0px, 0);\n  opacity: 1;\n  visibility: visible;\n}\n\n.lg-outer.lg-dropdown-active #lg-share {\n  color: #FFF;\n}\n\n.lg-outer .lg-dropdown {\n  background-color: #fff;\n  border-radius: 2px;\n  font-size: 14px;\n  list-style-type: none;\n  margin: 0;\n  padding: 10px 0;\n  position: absolute;\n  right: 0;\n  text-align: left;\n  top: 50px;\n  opacity: 0;\n  visibility: hidden;\n  transform: translate3d(0, 5px, 0);\n  transition: transform 0.18s linear 0s, visibility 0s linear 0.5s, opacity 0.18s linear 0s;\n}\n\n.lg-outer .lg-dropdown:after {\n  content: \"\";\n  display: block;\n  height: 0;\n  width: 0;\n  position: absolute;\n  border: 8px solid transparent;\n  border-bottom-color: #FFF;\n  right: 16px;\n  top: -16px;\n}\n\n.lg-outer .lg-dropdown > li:last-child {\n  margin-bottom: 0px;\n}\n\n.lg-outer .lg-dropdown > li:hover a, .lg-outer .lg-dropdown > li:hover .lg-icon {\n  color: #333;\n}\n\n.lg-outer .lg-dropdown a {\n  color: #333;\n  display: block;\n  white-space: pre;\n  padding: 4px 12px;\n  font-family: \"Open Sans\",\"Helvetica Neue\",Helvetica,Arial,sans-serif;\n  font-size: 12px;\n}\n\n.lg-outer .lg-dropdown a:hover {\n  background-color: rgba(0, 0, 0, 0.07);\n}\n\n.lg-outer .lg-dropdown .lg-dropdown-text {\n  display: inline-block;\n  line-height: 1;\n  margin-top: -3px;\n  vertical-align: middle;\n}\n\n.lg-outer .lg-dropdown .lg-icon {\n  color: #333;\n  display: inline-block;\n  float: none;\n  font-size: 20px;\n  height: auto;\n  line-height: 1;\n  margin-right: 8px;\n  padding: 0;\n  vertical-align: middle;\n  width: auto;\n}\n\n.lg-outer #lg-share {\n  position: relative;\n}\n\n.lg-outer #lg-share:after {\n  content: \"\\E80D\";\n}\n\n.lg-outer #lg-share-facebook .lg-icon {\n  color: #3b5998;\n}\n\n.lg-outer #lg-share-facebook .lg-icon:after {\n  content: \"\\E904\";\n}\n\n.lg-outer #lg-share-twitter .lg-icon {\n  color: #00aced;\n}\n\n.lg-outer #lg-share-twitter .lg-icon:after {\n  content: \"\\E907\";\n}\n\n.lg-outer #lg-share-googleplus .lg-icon {\n  color: #dd4b39;\n}\n\n.lg-outer #lg-share-googleplus .lg-icon:after {\n  content: \"\\E905\";\n}\n\n.lg-outer #lg-share-pinterest .lg-icon {\n  color: #cb2027;\n}\n\n.lg-outer #lg-share-pinterest .lg-icon:after {\n  content: \"\\E906\";\n}\n\n.lg-outer .lg-img-rotate {\n  position: absolute;\n  padding: 0 5px;\n  left: 0;\n  right: 0;\n  top: 0;\n  bottom: 0;\n  transition: transform 0.3s cubic-bezier(0.32, 0, 0.67, 0) 0s;\n}\n\n.lg-rotate-left:after {\n  content: \"\\E900\";\n}\n\n.lg-rotate-right:after {\n  content: \"\\E901\";\n}\n\n.lg-icon.lg-flip-hor, .lg-icon.lg-flip-ver {\n  font-size: 26px;\n}\n\n.lg-flip-ver:after {\n  content: \"\\E903\";\n}\n\n.lg-flip-hor:after {\n  content: \"\\E902\";\n}\n\n.lg-group:after {\n  content: \"\";\n  display: table;\n  clear: both;\n}\n\n.lg-outer {\n  width: 100%;\n  height: 100%;\n  position: fixed;\n  top: 0;\n  left: 0;\n  z-index: 1050;\n  text-align: left;\n  opacity: 0;\n  outline: none;\n  transition: opacity 0.15s ease 0s;\n}\n\n.lg-outer * {\n  box-sizing: border-box;\n}\n\n.lg-outer.lg-visible {\n  opacity: 1;\n}\n\n.lg-outer.lg-css3 .lg-item.lg-prev-slide, .lg-outer.lg-css3 .lg-item.lg-next-slide, .lg-outer.lg-css3 .lg-item.lg-current {\n  transition-duration: inherit !important;\n  transition-timing-function: inherit !important;\n}\n\n.lg-outer.lg-css3.lg-dragging .lg-item.lg-prev-slide, .lg-outer.lg-css3.lg-dragging .lg-item.lg-next-slide, .lg-outer.lg-css3.lg-dragging .lg-item.lg-current {\n  transition-duration: 0s !important;\n  opacity: 1;\n}\n\n.lg-outer.lg-grab img.lg-object {\n  cursor: -webkit-grab;\n  cursor: -o-grab;\n  cursor: -ms-grab;\n  cursor: grab;\n}\n\n.lg-outer.lg-grabbing img.lg-object {\n  cursor: move;\n  cursor: -webkit-grabbing;\n  cursor: -o-grabbing;\n  cursor: -ms-grabbing;\n  cursor: grabbing;\n}\n\n.lg-outer .lg {\n  height: 100%;\n  width: 100%;\n  position: relative;\n  overflow: hidden;\n  margin-left: auto;\n  margin-right: auto;\n  max-width: 100%;\n  max-height: 100%;\n}\n\n.lg-outer .lg-inner {\n  width: 100%;\n  height: 100%;\n  position: absolute;\n  left: 0;\n  top: 0;\n  white-space: nowrap;\n}\n\n.lg-outer .lg-item {\n  background: url(" + escape(__webpack_require__(/*! ../img/loading.gif */ "./node_modules/lightgallery/src/img/loading.gif")) + ") no-repeat scroll center center transparent;\n  display: none !important;\n}\n\n.lg-outer.lg-css3 .lg-prev-slide, .lg-outer.lg-css3 .lg-current, .lg-outer.lg-css3 .lg-next-slide {\n  display: inline-block !important;\n}\n\n.lg-outer.lg-css .lg-current {\n  display: inline-block !important;\n}\n\n.lg-outer .lg-item, .lg-outer .lg-img-wrap {\n  display: inline-block;\n  text-align: center;\n  position: absolute;\n  width: 100%;\n  height: 100%;\n}\n\n.lg-outer .lg-item:before, .lg-outer .lg-img-wrap:before {\n  content: \"\";\n  display: inline-block;\n  height: 50%;\n  width: 1px;\n  margin-right: -1px;\n}\n\n.lg-outer .lg-img-wrap {\n  position: absolute;\n  padding: 0 5px;\n  left: 0;\n  right: 0;\n  top: 0;\n  bottom: 0;\n}\n\n.lg-outer .lg-item.lg-complete {\n  background-image: none;\n}\n\n.lg-outer .lg-item.lg-current {\n  z-index: 1060;\n}\n\n.lg-outer .lg-image {\n  display: inline-block;\n  vertical-align: middle;\n  max-width: 100%;\n  max-height: 100%;\n  width: auto !important;\n  height: auto !important;\n}\n\n.lg-outer.lg-show-after-load .lg-item .lg-object, .lg-outer.lg-show-after-load .lg-item .lg-video-play {\n  opacity: 0;\n  transition: opacity 0.15s ease 0s;\n}\n\n.lg-outer.lg-show-after-load .lg-item.lg-complete .lg-object, .lg-outer.lg-show-after-load .lg-item.lg-complete .lg-video-play {\n  opacity: 1;\n}\n\n.lg-outer .lg-empty-html {\n  display: none;\n}\n\n.lg-outer.lg-hide-download #lg-download {\n  display: none;\n}\n\n.lg-backdrop {\n  position: fixed;\n  top: 0;\n  left: 0;\n  right: 0;\n  bottom: 0;\n  z-index: 1040;\n  background-color: #000;\n  opacity: 0;\n  transition: opacity 0.15s ease 0s;\n}\n\n.lg-backdrop.in {\n  opacity: 1;\n}\n\n.lg-css3.lg-no-trans .lg-prev-slide, .lg-css3.lg-no-trans .lg-next-slide, .lg-css3.lg-no-trans .lg-current {\n  transition: none 0s ease 0s !important;\n}\n\n.lg-css3.lg-use-css3 .lg-item {\n  -webkit-backface-visibility: hidden;\n  backface-visibility: hidden;\n}\n\n.lg-css3.lg-use-left .lg-item {\n  -webkit-backface-visibility: hidden;\n  backface-visibility: hidden;\n}\n\n.lg-css3.lg-fade .lg-item {\n  opacity: 0;\n}\n\n.lg-css3.lg-fade .lg-item.lg-current {\n  opacity: 1;\n}\n\n.lg-css3.lg-fade .lg-item.lg-prev-slide, .lg-css3.lg-fade .lg-item.lg-next-slide, .lg-css3.lg-fade .lg-item.lg-current {\n  transition: opacity 0.1s ease 0s;\n}\n\n.lg-css3.lg-slide.lg-use-css3 .lg-item {\n  opacity: 0;\n}\n\n.lg-css3.lg-slide.lg-use-css3 .lg-item.lg-prev-slide {\n  transform: translate3d(-100%, 0, 0);\n}\n\n.lg-css3.lg-slide.lg-use-css3 .lg-item.lg-next-slide {\n  transform: translate3d(100%, 0, 0);\n}\n\n.lg-css3.lg-slide.lg-use-css3 .lg-item.lg-current {\n  transform: translate3d(0, 0, 0);\n  opacity: 1;\n}\n\n.lg-css3.lg-slide.lg-use-css3 .lg-item.lg-prev-slide, .lg-css3.lg-slide.lg-use-css3 .lg-item.lg-next-slide, .lg-css3.lg-slide.lg-use-css3 .lg-item.lg-current {\n  transition: transform 1s cubic-bezier(0, 0, 0.25, 1) 0s, opacity 0.1s ease 0s;\n}\n\n.lg-css3.lg-slide.lg-use-left .lg-item {\n  opacity: 0;\n  position: absolute;\n  left: 0;\n}\n\n.lg-css3.lg-slide.lg-use-left .lg-item.lg-prev-slide {\n  left: -100%;\n}\n\n.lg-css3.lg-slide.lg-use-left .lg-item.lg-next-slide {\n  left: 100%;\n}\n\n.lg-css3.lg-slide.lg-use-left .lg-item.lg-current {\n  left: 0;\n  opacity: 1;\n}\n\n.lg-css3.lg-slide.lg-use-left .lg-item.lg-prev-slide, .lg-css3.lg-slide.lg-use-left .lg-item.lg-next-slide, .lg-css3.lg-slide.lg-use-left .lg-item.lg-current {\n  transition: left 1s cubic-bezier(0, 0, 0.25, 1) 0s, opacity 0.1s ease 0s;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/lib/css-base.js":
/*!*************************************************!*\
  !*** ./node_modules/css-loader/lib/css-base.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ "./node_modules/css-loader/lib/url/escape.js":
/*!***************************************************!*\
  !*** ./node_modules/css-loader/lib/url/escape.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function escape(url) {
    if (typeof url !== 'string') {
        return url
    }
    // If url is already wrapped in quotes, remove them
    if (/^['"].*['"]$/.test(url)) {
        url = url.slice(1, -1);
    }
    // Should url be wrapped?
    // See https://drafts.csswg.org/css-values-3/#urls
    if (/["'() \t\n]/.test(url)) {
        return '"' + url.replace(/"/g, '\\"').replace(/\n/g, '\\n') + '"'
    }

    return url
}


/***/ }),

/***/ "./node_modules/lightgallery/src/css/lightgallery.css":
/*!************************************************************!*\
  !*** ./node_modules/lightgallery/src/css/lightgallery.css ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../css-loader??ref--16-1!../../../postcss-loader/src??ref--16-2!./lightgallery.css */ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/lightgallery/src/css/lightgallery.css");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/lightgallery/src/fonts/lg.svg?22t19m":
/*!***********************************************************!*\
  !*** ./node_modules/lightgallery/src/fonts/lg.svg?22t19m ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/fonts/vendor/lightgallery/src/lg.svg?2ec2cb2199d4d881e6a6ad86690f6add";

/***/ }),

/***/ "./node_modules/lightgallery/src/fonts/lg.ttf?22t19m":
/*!***********************************************************!*\
  !*** ./node_modules/lightgallery/src/fonts/lg.ttf?22t19m ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/fonts/vendor/lightgallery/src/lg.ttf?f4292655f93dd12d9b8e4fc067ef2489";

/***/ }),

/***/ "./node_modules/lightgallery/src/fonts/lg.woff?22t19m":
/*!************************************************************!*\
  !*** ./node_modules/lightgallery/src/fonts/lg.woff?22t19m ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/fonts/vendor/lightgallery/src/lg.woff?1fbfd4bcffccb94e8e8a5ea70616b296";

/***/ }),

/***/ "./node_modules/lightgallery/src/img/loading.gif":
/*!*******************************************************!*\
  !*** ./node_modules/lightgallery/src/img/loading.gif ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/vendor/lightgallery/src/loading.gif?bbdac9cda255c54bfd809110aff87898";

/***/ }),

/***/ "./node_modules/lightgallery/src/img/video-play.png":
/*!**********************************************************!*\
  !*** ./node_modules/lightgallery/src/img/video-play.png ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/vendor/lightgallery/src/video-play.png?dc34cc9c99e935cd9c88c036e34103f5";

/***/ }),

/***/ "./node_modules/lightgallery/src/img/vimeo-play.png":
/*!**********************************************************!*\
  !*** ./node_modules/lightgallery/src/img/vimeo-play.png ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/vendor/lightgallery/src/vimeo-play.png?dfe7764b4fe444c3880736ac6131f5b4";

/***/ }),

/***/ "./node_modules/lightgallery/src/img/youtube-play.png":
/*!************************************************************!*\
  !*** ./node_modules/lightgallery/src/img/youtube-play.png ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/vendor/lightgallery/src/youtube-play.png?e6f0c233c87ddefab049c991c61e2d69";

/***/ }),

/***/ "./node_modules/lightgallery/src/js/lightgallery.js":
/*!**********************************************************!*\
  !*** ./node_modules/lightgallery/src/js/lightgallery.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() {
    'use strict';

    var defaults = {

        mode: 'lg-slide',

        // Ex : 'ease'
        cssEasing: 'ease',

        //'for jquery animation'
        easing: 'linear',
        speed: 600,
        height: '100%',
        width: '100%',
        addClass: '',
        startClass: 'lg-start-zoom',
        backdropDuration: 150,

        // Set 0, if u don't want to hide the controls 
        hideBarsDelay: 6000,

        useLeft: false,

        // aria-labelledby attribute fot gallery
        ariaLabelledby: '',
        
        //aria-describedby attribute for gallery
        ariaDescribedby: '',

        closable: true,
        loop: true,
        escKey: true,
        keyPress: true,
        controls: true,
        slideEndAnimatoin: true,
        hideControlOnEnd: false,
        mousewheel: true,

        getCaptionFromTitleOrAlt: true,

        // .lg-item || '.lg-sub-html'
        appendSubHtmlTo: '.lg-sub-html',

        subHtmlSelectorRelative: false,

        /**
         * @desc number of preload slides
         * will execute only after the current slide is fully loaded.
         *
         * @ex you clicked on 4th image and if preload = 1 then 3rd slide and 5th
         * slide will be loaded in the background after the 4th slide is fully loaded..
         * if preload is 2 then 2nd 3rd 5th 6th slides will be preloaded.. ... ...
         *
         */
        preload: 1,
        showAfterLoad: true,
        selector: '',
        selectWithin: '',
        nextHtml: '',
        prevHtml: '',

        // 0, 1
        index: false,

        iframeMaxWidth: '100%',

        download: true,
        counter: true,
        appendCounterTo: '.lg-toolbar',

        swipeThreshold: 50,
        enableSwipe: true,
        enableDrag: true,

        dynamic: false,
        dynamicEl: [],
        galleryId: 1,
        supportLegacyBrowser: true
    };

    function Plugin(element, options) {

        // Current lightGallery element
        this.el = element;

        // Current jquery element
        this.$el = $(element);

        // lightGallery settings
        this.s = $.extend({}, defaults, options);

        // When using dynamic mode, ensure dynamicEl is an array
        if (this.s.dynamic && this.s.dynamicEl !== 'undefined' && this.s.dynamicEl.constructor === Array && !this.s.dynamicEl.length) {
            throw ('When using dynamic mode, you must also define dynamicEl as an Array.');
        }

        // lightGallery modules
        this.modules = {};

        // false when lightgallery complete first slide;
        this.lGalleryOn = false;

        this.lgBusy = false;

        // Timeout function for hiding controls;
        this.hideBarTimeout = false;

        // To determine browser supports for touch events;
        this.isTouch = ('ontouchstart' in document.documentElement);

        // Disable hideControlOnEnd if sildeEndAnimation is true
        if (this.s.slideEndAnimatoin) {
            this.s.hideControlOnEnd = false;
        }

        // Gallery items
        if (this.s.dynamic) {
            this.$items = this.s.dynamicEl;
        } else {
            if (this.s.selector === 'this') {
                this.$items = this.$el;
            } else if (this.s.selector !== '') {
                if (this.s.selectWithin) {
                    this.$items = $(this.s.selectWithin).find(this.s.selector);
                } else {
                    this.$items = this.$el.find($(this.s.selector));
                }
            } else {
                this.$items = this.$el.children();
            }
        }

        // .lg-item
        this.$slide = '';

        // .lg-outer
        this.$outer = '';

        this.init();

        return this;
    }

    Plugin.prototype.init = function() {

        var _this = this;

        // s.preload should not be more than $item.length
        if (_this.s.preload > _this.$items.length) {
            _this.s.preload = _this.$items.length;
        }

        // if dynamic option is enabled execute immediately
        var _hash = window.location.hash;
        if (_hash.indexOf('lg=' + this.s.galleryId) > 0) {

            _this.index = parseInt(_hash.split('&slide=')[1], 10);

            $('body').addClass('lg-from-hash');
            if (!$('body').hasClass('lg-on')) {
                setTimeout(function() {
                    _this.build(_this.index);
                });

                $('body').addClass('lg-on');
            }
        }

        if (_this.s.dynamic) {

            _this.$el.trigger('onBeforeOpen.lg');

            _this.index = _this.s.index || 0;

            // prevent accidental double execution
            if (!$('body').hasClass('lg-on')) {
                setTimeout(function() {
                    _this.build(_this.index);
                    $('body').addClass('lg-on');
                });
            }
        } else {

            // Using different namespace for click because click event should not unbind if selector is same object('this')
            _this.$items.on('click.lgcustom', function(event) {

                // For IE8
                try {
                    event.preventDefault();
                    event.preventDefault();
                } catch (er) {
                    event.returnValue = false;
                }

                _this.$el.trigger('onBeforeOpen.lg');

                _this.index = _this.s.index || _this.$items.index(this);

                // prevent accidental double execution
                if (!$('body').hasClass('lg-on')) {
                    _this.build(_this.index);
                    $('body').addClass('lg-on');
                }
            });
        }

    };

    Plugin.prototype.build = function(index) {

        var _this = this;

        _this.structure();

        // module constructor
        $.each($.fn.lightGallery.modules, function(key) {
            _this.modules[key] = new $.fn.lightGallery.modules[key](_this.el);
        });

        // initiate slide function
        _this.slide(index, false, false, false);

        if (_this.s.keyPress) {
            _this.keyPress();
        }

        if (_this.$items.length > 1) {

            _this.arrow();

            setTimeout(function() {
                _this.enableDrag();
                _this.enableSwipe();
            }, 50);

            if (_this.s.mousewheel) {
                _this.mousewheel();
            }
        } else {
            _this.$slide.on('click.lg', function() {
                _this.$el.trigger('onSlideClick.lg');
            });
        }

        _this.counter();

        _this.closeGallery();

        _this.$el.trigger('onAfterOpen.lg');

        // Hide controllers if mouse doesn't move for some period
        if (_this.s.hideBarsDelay > 0) {

            // Hide controllers if mouse doesn't move for some period
            _this.$outer.on('mousemove.lg click.lg touchstart.lg', function () {
                _this.$outer.removeClass('lg-hide-items');

                clearTimeout(_this.hideBarTimeout);

                // Timeout will be cleared on each slide movement also
                _this.hideBarTimeout = setTimeout(function () {
                    _this.$outer.addClass('lg-hide-items');
                }, _this.s.hideBarsDelay);

            });
        }

        _this.$outer.trigger('mousemove.lg');

    };

    Plugin.prototype.structure = function() {
        var list = '';
        var controls = '';
        var i = 0;
        var subHtmlCont = '';
        var template;
        var _this = this;

        $('body').append('<div class="lg-backdrop"></div>');
        $('.lg-backdrop').css('transition-duration', this.s.backdropDuration + 'ms');

        // Create gallery items
        for (i = 0; i < this.$items.length; i++) {
            list += '<div class="lg-item"></div>';
        }

        // Create controlls
        if (this.s.controls && this.$items.length > 1) {
            controls = '<div class="lg-actions">' +
                '<button type="button" aria-label="Previous slide" class="lg-prev lg-icon">' + this.s.prevHtml + '</button>' +
                '<button type="button" aria-label="Next slide" class="lg-next lg-icon">' + this.s.nextHtml + '</button>' +
                '</div>';
        }

        if (this.s.appendSubHtmlTo === '.lg-sub-html') {
            subHtmlCont = '<div role="status" aria-live="polite" class="lg-sub-html"></div>';
        }

        var ariaLabelledby = this.s.ariaLabelledby ?
            'aria-labelledby="' + this.s.ariaLabelledby + '"' : '';
        var ariaDescribedby = this.s.ariaDescribedby ?
            'aria-describedby="' + this.s.ariaDescribedby + '"' : '';

        template = '<div tabindex="-1" aria-modal="true" ' + ariaLabelledby + ' ' + ariaDescribedby + ' role="dialog" class="lg-outer ' + this.s.addClass + ' ' + this.s.startClass + '">' +
            '<div class="lg" style="width:' + this.s.width + '; height:' + this.s.height + '">' +
            '<div class="lg-inner">' + list + '</div>' +
            '<div class="lg-toolbar lg-group">' +
            '<button type="button" aria-label="Close gallery" class="lg-close lg-icon"></button>' +
            '</div>' +
            controls +
            subHtmlCont +
            '</div>' +
            '</div>';

        $('body').append(template);
        this.$outer = $('.lg-outer');
        this.$outer.focus();
        this.$slide = this.$outer.find('.lg-item');

        if (this.s.useLeft) {
            this.$outer.addClass('lg-use-left');

            // Set mode lg-slide if use left is true;
            this.s.mode = 'lg-slide';
        } else {
            this.$outer.addClass('lg-use-css3');
        }

        // For fixed height gallery
        _this.setTop();
        $(window).on('resize.lg orientationchange.lg', function() {
            setTimeout(function() {
                _this.setTop();
            }, 100);
        });

        // add class lg-current to remove initial transition
        this.$slide.eq(this.index).addClass('lg-current');

        // add Class for css support and transition mode
        if (this.doCss()) {
            this.$outer.addClass('lg-css3');
        } else {
            this.$outer.addClass('lg-css');

            // Set speed 0 because no animation will happen if browser doesn't support css3
            this.s.speed = 0;
        }

        this.$outer.addClass(this.s.mode);

        if (this.s.enableDrag && this.$items.length > 1) {
            this.$outer.addClass('lg-grab');
        }

        if (this.s.showAfterLoad) {
            this.$outer.addClass('lg-show-after-load');
        }

        if (this.doCss()) {
            var $inner = this.$outer.find('.lg-inner');
            $inner.css('transition-timing-function', this.s.cssEasing);
            $inner.css('transition-duration', this.s.speed + 'ms');
        }

        setTimeout(function() {
            $('.lg-backdrop').addClass('in');
        });

        setTimeout(function() {
            _this.$outer.addClass('lg-visible');
        }, this.s.backdropDuration);

        if (this.s.download) {
            this.$outer.find('.lg-toolbar').append('<a id="lg-download" aria-label="Download" target="_blank" download class="lg-download lg-icon"></a>');
        }

        // Store the current scroll top value to scroll back after closing the gallery..
        this.prevScrollTop = $(window).scrollTop();

    };

    // For fixed height gallery
    Plugin.prototype.setTop = function() {
        if (this.s.height !== '100%') {
            var wH = $(window).height();
            var top = (wH - parseInt(this.s.height, 10)) / 2;
            var $lGallery = this.$outer.find('.lg');
            if (wH >= parseInt(this.s.height, 10)) {
                $lGallery.css('top', top + 'px');
            } else {
                $lGallery.css('top', '0px');
            }
        }
    };

    // Find css3 support
    Plugin.prototype.doCss = function() {
        // check for css animation support
        var support = function() {
            var transition = ['transition', 'MozTransition', 'WebkitTransition', 'OTransition', 'msTransition', 'KhtmlTransition'];
            var root = document.documentElement;
            var i = 0;
            for (i = 0; i < transition.length; i++) {
                if (transition[i] in root.style) {
                    return true;
                }
            }
        };

        if (support()) {
            return true;
        }

        return false;
    };

    /**
     *  @desc Check the given src is video
     *  @param {String} src
     *  @return {Object} video type
     *  Ex:{ youtube  :  ["//www.youtube.com/watch?v=c0asJgSyxcY", "c0asJgSyxcY"] }
     */
    Plugin.prototype.isVideo = function(src, index) {

        var html;
        if (this.s.dynamic) {
            html = this.s.dynamicEl[index].html;
        } else {
            html = this.$items.eq(index).attr('data-html');
        }

        if (!src) {
            if (html) {
                return {
                    html5: true
                };
            } else {
                console.error('lightGallery :- data-src is not provided on slide item ' + (index + 1) + '. Please make sure the selector property is properly configured. More info - http://sachinchoolur.github.io/lightGallery/demos/html-markup.html');
                return false;
            }
        }

        var youtube = src.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com|be-nocookie\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)/i);
        var vimeo = src.match(/\/\/(?:www\.)?(?:player\.)?vimeo.com\/(?:video\/)?([0-9a-z\-_]+)/i);
        var dailymotion = src.match(/\/\/(?:www\.)?dai.ly\/([0-9a-z\-_]+)/i);
        var vk = src.match(/\/\/(?:www\.)?(?:vk\.com|vkontakte\.ru)\/(?:video_ext\.php\?)(.*)/i);

        if (youtube) {
            return {
                youtube: youtube
            };
        } else if (vimeo) {
            return {
                vimeo: vimeo
            };
        } else if (dailymotion) {
            return {
                dailymotion: dailymotion
            };
        } else if (vk) {
            return {
                vk: vk
            };
        }
    };

    /**
     *  @desc Create image counter
     *  Ex: 1/10
     */
    Plugin.prototype.counter = function() {
        if (this.s.counter) {
            $(this.s.appendCounterTo).append('<div id="lg-counter" role="status" aria-live="polite"><span id="lg-counter-current">' + (parseInt(this.index, 10) + 1) + '</span> / <span id="lg-counter-all">' + this.$items.length + '</span></div>');
        }
    };

    /**
     *  @desc add sub-html into the slide
     *  @param {Number} index - index of the slide
     */
    Plugin.prototype.addHtml = function(index) {
        var subHtml = null;
        var subHtmlUrl;
        var $currentEle;
        if (this.s.dynamic) {
            if (this.s.dynamicEl[index].subHtmlUrl) {
                subHtmlUrl = this.s.dynamicEl[index].subHtmlUrl;
            } else {
                subHtml = this.s.dynamicEl[index].subHtml;
            }
        } else {
            $currentEle = this.$items.eq(index);
            if ($currentEle.attr('data-sub-html-url')) {
                subHtmlUrl = $currentEle.attr('data-sub-html-url');
            } else {
                subHtml = $currentEle.attr('data-sub-html');
                if (this.s.getCaptionFromTitleOrAlt && !subHtml) {
                    subHtml = $currentEle.attr('title') || $currentEle.find('img').first().attr('alt');
                }
            }
        }

        if (!subHtmlUrl) {
            if (typeof subHtml !== 'undefined' && subHtml !== null) {

                // get first letter of subhtml
                // if first letter starts with . or # get the html form the jQuery object
                var fL = subHtml.substring(0, 1);
                if (fL === '.' || fL === '#') {
                    if (this.s.subHtmlSelectorRelative && !this.s.dynamic) {
                        subHtml = $currentEle.find(subHtml).html();
                    } else {
                        subHtml = $(subHtml).html();
                    }
                }
            } else {
                subHtml = '';
            }
        }

        if (this.s.appendSubHtmlTo === '.lg-sub-html') {

            if (subHtmlUrl) {
                this.$outer.find(this.s.appendSubHtmlTo).load(subHtmlUrl);
            } else {
                this.$outer.find(this.s.appendSubHtmlTo).html(subHtml);
            }

        } else {

            if (subHtmlUrl) {
                this.$slide.eq(index).load(subHtmlUrl);
            } else {
                this.$slide.eq(index).append(subHtml);
            }
        }

        // Add lg-empty-html class if title doesn't exist
        if (typeof subHtml !== 'undefined' && subHtml !== null) {
            if (subHtml === '') {
                this.$outer.find(this.s.appendSubHtmlTo).addClass('lg-empty-html');
            } else {
                this.$outer.find(this.s.appendSubHtmlTo).removeClass('lg-empty-html');
            }
        }

        this.$el.trigger('onAfterAppendSubHtml.lg', [index]);
    };

    /**
     *  @desc Preload slides
     *  @param {Number} index - index of the slide
     */
    Plugin.prototype.preload = function(index) {
        var i = 1;
        var j = 1;
        for (i = 1; i <= this.s.preload; i++) {
            if (i >= this.$items.length - index) {
                break;
            }

            this.loadContent(index + i, false, 0);
        }

        for (j = 1; j <= this.s.preload; j++) {
            if (index - j < 0) {
                break;
            }

            this.loadContent(index - j, false, 0);
        }
    };

    /**
     *  @desc Load slide content into slide.
     *  @param {Number} index - index of the slide.
     *  @param {Boolean} rec - if true call loadcontent() function again.
     *  @param {Boolean} delay - delay for adding complete class. it is 0 except first time.
     */
    Plugin.prototype.loadContent = function(index, rec, delay) {

        var _this = this;
        var _hasPoster = false;
        var _$img;
        var _src;
        var _poster;
        var _srcset;
        var _sizes;
        var _html;
        var _alt;
        var getResponsiveSrc = function(srcItms) {
            var rsWidth = [];
            var rsSrc = [];
            for (var i = 0; i < srcItms.length; i++) {
                var __src = srcItms[i].split(' ');

                // Manage empty space
                if (__src[0] === '') {
                    __src.splice(0, 1);
                }

                rsSrc.push(__src[0]);
                rsWidth.push(__src[1]);
            }

            var wWidth = $(window).width();
            for (var j = 0; j < rsWidth.length; j++) {
                if (parseInt(rsWidth[j], 10) > wWidth) {
                    _src = rsSrc[j];
                    break;
                }
            }
        };

        if (_this.s.dynamic) {

            if (_this.s.dynamicEl[index].poster) {
                _hasPoster = true;
                _poster = _this.s.dynamicEl[index].poster;
            }

            _html = _this.s.dynamicEl[index].html;
            _src = _this.s.dynamicEl[index].src;
            _alt = _this.s.dynamicEl[index].alt;

            if (_this.s.dynamicEl[index].responsive) {
                var srcDyItms = _this.s.dynamicEl[index].responsive.split(',');
                getResponsiveSrc(srcDyItms);
            }

            _srcset = _this.s.dynamicEl[index].srcset;
            _sizes = _this.s.dynamicEl[index].sizes;

        } else {
            var $currentEle = _this.$items.eq(index);
            if ($currentEle.attr('data-poster')) {
                _hasPoster = true;
                _poster = $currentEle.attr('data-poster');
            }

            _html = $currentEle.attr('data-html');
            _src = $currentEle.attr('href') || $currentEle.attr('data-src');
            _alt = $currentEle.attr('title') || $currentEle.find('img').first().attr('alt');

            if ($currentEle.attr('data-responsive')) {
                var srcItms = $currentEle.attr('data-responsive').split(',');
                getResponsiveSrc(srcItms);
            }

            _srcset = $currentEle.attr('data-srcset');
            _sizes = $currentEle.attr('data-sizes');

        }

        //if (_src || _srcset || _sizes || _poster) {

        var iframe = false;
        if (_this.s.dynamic) {
            if (_this.s.dynamicEl[index].iframe) {
                iframe = true;
            }
        } else {
            if (_this.$items.eq(index).attr('data-iframe') === 'true') {
                iframe = true;
            }
        }

        var _isVideo = _this.isVideo(_src, index);
        if (!_this.$slide.eq(index).hasClass('lg-loaded')) {
            if (iframe) {
                _this.$slide.eq(index).prepend('<div class="lg-video-cont lg-has-iframe" style="max-width:' + _this.s.iframeMaxWidth + '"><div class="lg-video"><iframe class="lg-object" frameborder="0" src="' + _src + '"  allowfullscreen="true"></iframe></div></div>');
            } else if (_hasPoster) {
                var videoClass = '';
                if (_isVideo && _isVideo.youtube) {
                    videoClass = 'lg-has-youtube';
                } else if (_isVideo && _isVideo.vimeo) {
                    videoClass = 'lg-has-vimeo';
                } else {
                    videoClass = 'lg-has-html5';
                }

                _this.$slide.eq(index).prepend('<div class="lg-video-cont ' + videoClass + ' "><div class="lg-video"><span class="lg-video-play"></span><img class="lg-object lg-has-poster" src="' + _poster + '" /></div></div>');

            } else if (_isVideo) {
                _this.$slide.eq(index).prepend('<div class="lg-video-cont "><div class="lg-video"></div></div>');
                _this.$el.trigger('hasVideo.lg', [index, _src, _html]);
            } else {
                _alt = _alt ? 'alt="' + _alt + '"' : '';
                _this.$slide.eq(index).prepend('<div class="lg-img-wrap"><img class="lg-object lg-image" ' + _alt + ' src="' + _src + '" /></div>');
            }

            _this.$el.trigger('onAferAppendSlide.lg', [index]);

            _$img = _this.$slide.eq(index).find('.lg-object');
            if (_sizes) {
                _$img.attr('sizes', _sizes);
            }

            if (_srcset) {
                _$img.attr('srcset', _srcset);
                if (this.s.supportLegacyBrowser) {
                    try {
                        picturefill({
                            elements: [_$img[0]]
                        });
                    } catch (e) {
                        console.warn('lightGallery :- If you want srcset to be supported for older browser please include picturefil version 2 javascript library in your document.');
                    }
                }
            }

            if (this.s.appendSubHtmlTo !== '.lg-sub-html') {
                _this.addHtml(index);
            }

            _this.$slide.eq(index).addClass('lg-loaded');
        }

        _this.$slide.eq(index).find('.lg-object').on('load.lg error.lg', function() {

            // For first time add some delay for displaying the start animation.
            var _speed = 0;

            // Do not change the delay value because it is required for zoom plugin.
            // If gallery opened from direct url (hash) speed value should be 0
            if (delay && !$('body').hasClass('lg-from-hash')) {
                _speed = delay;
            }

            setTimeout(function() {
                _this.$slide.eq(index).addClass('lg-complete');
                _this.$el.trigger('onSlideItemLoad.lg', [index, delay || 0]);
            }, _speed);

        });

        // @todo check load state for html5 videos
        if (_isVideo && _isVideo.html5 && !_hasPoster) {
            _this.$slide.eq(index).addClass('lg-complete');
        }

        if (rec === true) {
            if (!_this.$slide.eq(index).hasClass('lg-complete')) {
                _this.$slide.eq(index).find('.lg-object').on('load.lg error.lg', function() {
                    _this.preload(index);
                });
            } else {
                _this.preload(index);
            }
        }

        //}
    };

    /**
    *   @desc slide function for lightgallery
        ** Slide() gets call on start
        ** ** Set lg.on true once slide() function gets called.
        ** Call loadContent() on slide() function inside setTimeout
        ** ** On first slide we do not want any animation like slide of fade
        ** ** So on first slide( if lg.on if false that is first slide) loadContent() should start loading immediately
        ** ** Else loadContent() should wait for the transition to complete.
        ** ** So set timeout s.speed + 50
    <=> ** loadContent() will load slide content in to the particular slide
        ** ** It has recursion (rec) parameter. if rec === true loadContent() will call preload() function.
        ** ** preload will execute only when the previous slide is fully loaded (images iframe)
        ** ** avoid simultaneous image load
    <=> ** Preload() will check for s.preload value and call loadContent() again accoring to preload value
        ** loadContent()  <====> Preload();

    *   @param {Number} index - index of the slide
    *   @param {Boolean} fromTouch - true if slide function called via touch event or mouse drag
    *   @param {Boolean} fromThumb - true if slide function called via thumbnail click
    *   @param {String} direction - Direction of the slide(next/prev)
    */
    Plugin.prototype.slide = function(index, fromTouch, fromThumb, direction) {

        var _prevIndex = this.$outer.find('.lg-current').index();
        var _this = this;

        // Prevent if multiple call
        // Required for hsh plugin
        if (_this.lGalleryOn && (_prevIndex === index)) {
            return;
        }

        var _length = this.$slide.length;
        var _time = _this.lGalleryOn ? this.s.speed : 0;

        if (!_this.lgBusy) {

            if (this.s.download) {
                var _src;
                if (_this.s.dynamic) {
                    _src = _this.s.dynamicEl[index].downloadUrl !== false && (_this.s.dynamicEl[index].downloadUrl || _this.s.dynamicEl[index].src);
                } else {
                    _src = _this.$items.eq(index).attr('data-download-url') !== 'false' && (_this.$items.eq(index).attr('data-download-url') || _this.$items.eq(index).attr('href') || _this.$items.eq(index).attr('data-src'));

                }

                if (_src) {
                    $('#lg-download').attr('href', _src);
                    _this.$outer.removeClass('lg-hide-download');
                } else {
                    _this.$outer.addClass('lg-hide-download');
                }
            }

            this.$el.trigger('onBeforeSlide.lg', [_prevIndex, index, fromTouch, fromThumb]);

            _this.lgBusy = true;

            clearTimeout(_this.hideBarTimeout);

            // Add title if this.s.appendSubHtmlTo === lg-sub-html
            if (this.s.appendSubHtmlTo === '.lg-sub-html') {

                // wait for slide animation to complete
                setTimeout(function() {
                    _this.addHtml(index);
                }, _time);
            }

            this.arrowDisable(index);

            if (!direction) {
                if (index < _prevIndex) {
                    direction = 'prev';
                } else if (index > _prevIndex) {
                    direction = 'next';
                }
            }

            if (!fromTouch) {

                // remove all transitions
                _this.$outer.addClass('lg-no-trans');

                this.$slide.removeClass('lg-prev-slide lg-next-slide');

                if (direction === 'prev') {

                    //prevslide
                    this.$slide.eq(index).addClass('lg-prev-slide');
                    this.$slide.eq(_prevIndex).addClass('lg-next-slide');
                } else {

                    // next slide
                    this.$slide.eq(index).addClass('lg-next-slide');
                    this.$slide.eq(_prevIndex).addClass('lg-prev-slide');
                }

                // give 50 ms for browser to add/remove class
                setTimeout(function() {
                    _this.$slide.removeClass('lg-current');

                    //_this.$slide.eq(_prevIndex).removeClass('lg-current');
                    _this.$slide.eq(index).addClass('lg-current');

                    // reset all transitions
                    _this.$outer.removeClass('lg-no-trans');
                }, 50);
            } else {

                this.$slide.removeClass('lg-prev-slide lg-current lg-next-slide');
                var touchPrev;
                var touchNext;
                if (_length > 2) {
                    touchPrev = index - 1;
                    touchNext = index + 1;

                    if ((index === 0) && (_prevIndex === _length - 1)) {

                        // next slide
                        touchNext = 0;
                        touchPrev = _length - 1;
                    } else if ((index === _length - 1) && (_prevIndex === 0)) {

                        // prev slide
                        touchNext = 0;
                        touchPrev = _length - 1;
                    }

                } else {
                    touchPrev = 0;
                    touchNext = 1;
                }

                if (direction === 'prev') {
                    _this.$slide.eq(touchNext).addClass('lg-next-slide');
                } else {
                    _this.$slide.eq(touchPrev).addClass('lg-prev-slide');
                }

                _this.$slide.eq(index).addClass('lg-current');
            }

            if (_this.lGalleryOn) {
                setTimeout(function() {
                    _this.loadContent(index, true, 0);
                }, this.s.speed + 50);

                setTimeout(function() {
                    _this.lgBusy = false;
                    _this.$el.trigger('onAfterSlide.lg', [_prevIndex, index, fromTouch, fromThumb]);
                }, this.s.speed);

            } else {
                _this.loadContent(index, true, _this.s.backdropDuration);

                _this.lgBusy = false;
                _this.$el.trigger('onAfterSlide.lg', [_prevIndex, index, fromTouch, fromThumb]);
            }

            _this.lGalleryOn = true;

            if (this.s.counter) {
                $('#lg-counter-current').text(index + 1);
            }

        }
        _this.index = index;

    };

    /**
     *  @desc Go to next slide
     *  @param {Boolean} fromTouch - true if slide function called via touch event
     */
    Plugin.prototype.goToNextSlide = function(fromTouch) {
        var _this = this;
        var _loop = _this.s.loop;
        if (fromTouch && _this.$slide.length < 3) {
            _loop = false;
        }

        if (!_this.lgBusy) {
            if ((_this.index + 1) < _this.$slide.length) {
                _this.index++;
                _this.$el.trigger('onBeforeNextSlide.lg', [_this.index]);
                _this.slide(_this.index, fromTouch, false, 'next');
            } else {
                if (_loop) {
                    _this.index = 0;
                    _this.$el.trigger('onBeforeNextSlide.lg', [_this.index]);
                    _this.slide(_this.index, fromTouch, false, 'next');
                } else if (_this.s.slideEndAnimatoin && !fromTouch) {
                    _this.$outer.addClass('lg-right-end');
                    setTimeout(function() {
                        _this.$outer.removeClass('lg-right-end');
                    }, 400);
                }
            }
        }
    };

    /**
     *  @desc Go to previous slide
     *  @param {Boolean} fromTouch - true if slide function called via touch event
     */
    Plugin.prototype.goToPrevSlide = function(fromTouch) {
        var _this = this;
        var _loop = _this.s.loop;
        if (fromTouch && _this.$slide.length < 3) {
            _loop = false;
        }

        if (!_this.lgBusy) {
            if (_this.index > 0) {
                _this.index--;
                _this.$el.trigger('onBeforePrevSlide.lg', [_this.index, fromTouch]);
                _this.slide(_this.index, fromTouch, false, 'prev');
            } else {
                if (_loop) {
                    _this.index = _this.$items.length - 1;
                    _this.$el.trigger('onBeforePrevSlide.lg', [_this.index, fromTouch]);
                    _this.slide(_this.index, fromTouch, false, 'prev');
                } else if (_this.s.slideEndAnimatoin && !fromTouch) {
                    _this.$outer.addClass('lg-left-end');
                    setTimeout(function() {
                        _this.$outer.removeClass('lg-left-end');
                    }, 400);
                }
            }
        }
    };

    Plugin.prototype.keyPress = function() {
        var _this = this;
        if (this.$items.length > 1) {
            $(window).on('keyup.lg', function(e) {
                if (_this.$items.length > 1) {
                    if (e.keyCode === 37) {
                        e.preventDefault();
                        _this.goToPrevSlide();
                    }

                    if (e.keyCode === 39) {
                        e.preventDefault();
                        _this.goToNextSlide();
                    }
                }
            });
        }

        $(window).on('keydown.lg', function(e) {
            if (_this.s.escKey === true && e.keyCode === 27) {
                e.preventDefault();
                if (!_this.$outer.hasClass('lg-thumb-open')) {
                    _this.destroy();
                } else {
                    _this.$outer.removeClass('lg-thumb-open');
                }
            }
        });
    };

    Plugin.prototype.arrow = function() {
        var _this = this;
        this.$outer.find('.lg-prev').on('click.lg', function() {
            _this.goToPrevSlide();
        });

        this.$outer.find('.lg-next').on('click.lg', function() {
            _this.goToNextSlide();
        });
    };

    Plugin.prototype.arrowDisable = function(index) {

        // Disable arrows if s.hideControlOnEnd is true
        if (!this.s.loop && this.s.hideControlOnEnd) {
            if ((index + 1) < this.$slide.length) {
                this.$outer.find('.lg-next').removeAttr('disabled').removeClass('disabled');
            } else {
                this.$outer.find('.lg-next').attr('disabled', 'disabled').addClass('disabled');
            }

            if (index > 0) {
                this.$outer.find('.lg-prev').removeAttr('disabled').removeClass('disabled');
            } else {
                this.$outer.find('.lg-prev').attr('disabled', 'disabled').addClass('disabled');
            }
        }
    };

    Plugin.prototype.setTranslate = function($el, xValue, yValue) {
        // jQuery supports Automatic CSS prefixing since jQuery 1.8.0
        if (this.s.useLeft) {
            $el.css('left', xValue);
        } else {
            $el.css({
                transform: 'translate3d(' + (xValue) + 'px, ' + yValue + 'px, 0px)'
            });
        }
    };

    Plugin.prototype.touchMove = function(startCoords, endCoords) {

        var distance = endCoords - startCoords;

        if (Math.abs(distance) > 15) {
            // reset opacity and transition duration
            this.$outer.addClass('lg-dragging');

            // move current slide
            this.setTranslate(this.$slide.eq(this.index), distance, 0);

            // move next and prev slide with current slide
            this.setTranslate($('.lg-prev-slide'), -this.$slide.eq(this.index).width() + distance, 0);
            this.setTranslate($('.lg-next-slide'), this.$slide.eq(this.index).width() + distance, 0);
        }
    };

    Plugin.prototype.touchEnd = function(distance) {
        var _this = this;

        // keep slide animation for any mode while dragg/swipe
        if (_this.s.mode !== 'lg-slide') {
            _this.$outer.addClass('lg-slide');
        }

        this.$slide.not('.lg-current, .lg-prev-slide, .lg-next-slide').css('opacity', '0');

        // set transition duration
        setTimeout(function() {
            _this.$outer.removeClass('lg-dragging');
            if ((distance < 0) && (Math.abs(distance) > _this.s.swipeThreshold)) {
                _this.goToNextSlide(true);
            } else if ((distance > 0) && (Math.abs(distance) > _this.s.swipeThreshold)) {
                _this.goToPrevSlide(true);
            } else if (Math.abs(distance) < 5) {

                // Trigger click if distance is less than 5 pix
                _this.$el.trigger('onSlideClick.lg');
            }

            _this.$slide.removeAttr('style');
        });

        // remove slide class once drag/swipe is completed if mode is not slide
        setTimeout(function() {
            if (!_this.$outer.hasClass('lg-dragging') && _this.s.mode !== 'lg-slide') {
                _this.$outer.removeClass('lg-slide');
            }
        }, _this.s.speed + 100);

    };

    Plugin.prototype.enableSwipe = function() {
        var _this = this;
        var startCoords = 0;
        var endCoords = 0;
        var isMoved = false;

        if (_this.s.enableSwipe && _this.doCss()) {

            _this.$slide.on('touchstart.lg', function(e) {
                if (!_this.$outer.hasClass('lg-zoomed') && !_this.lgBusy) {
                    e.preventDefault();
                    _this.manageSwipeClass();
                    startCoords = e.originalEvent.targetTouches[0].pageX;
                }
            });

            _this.$slide.on('touchmove.lg', function(e) {
                if (!_this.$outer.hasClass('lg-zoomed')) {
                    e.preventDefault();
                    endCoords = e.originalEvent.targetTouches[0].pageX;
                    _this.touchMove(startCoords, endCoords);
                    isMoved = true;
                }
            });

            _this.$slide.on('touchend.lg', function() {
                if (!_this.$outer.hasClass('lg-zoomed')) {
                    if (isMoved) {
                        isMoved = false;
                        _this.touchEnd(endCoords - startCoords);
                    } else {
                        _this.$el.trigger('onSlideClick.lg');
                    }
                }
            });
        }

    };

    Plugin.prototype.enableDrag = function() {
        var _this = this;
        var startCoords = 0;
        var endCoords = 0;
        var isDraging = false;
        var isMoved = false;
        if (_this.s.enableDrag && _this.doCss()) {
            _this.$slide.on('mousedown.lg', function(e) {
                if (!_this.$outer.hasClass('lg-zoomed') && !_this.lgBusy && !$(e.target).text().trim()) {
                    e.preventDefault();
                    _this.manageSwipeClass();
                    startCoords = e.pageX;
                    isDraging = true;

                    // ** Fix for webkit cursor issue https://code.google.com/p/chromium/issues/detail?id=26723
                    _this.$outer.scrollLeft += 1;
                    _this.$outer.scrollLeft -= 1;

                    // *

                    _this.$outer.removeClass('lg-grab').addClass('lg-grabbing');

                    _this.$el.trigger('onDragstart.lg');
                }
            });

            $(window).on('mousemove.lg', function(e) {
                if (isDraging) {
                    isMoved = true;
                    endCoords = e.pageX;
                    _this.touchMove(startCoords, endCoords);
                    _this.$el.trigger('onDragmove.lg');
                }
            });

            $(window).on('mouseup.lg', function(e) {
                if (isMoved) {
                    isMoved = false;
                    _this.touchEnd(endCoords - startCoords);
                    _this.$el.trigger('onDragend.lg');
                } else if ($(e.target).hasClass('lg-object') || $(e.target).hasClass('lg-video-play')) {
                    _this.$el.trigger('onSlideClick.lg');
                }

                // Prevent execution on click
                if (isDraging) {
                    isDraging = false;
                    _this.$outer.removeClass('lg-grabbing').addClass('lg-grab');
                }
            });

        }
    };

    Plugin.prototype.manageSwipeClass = function() {
        var _touchNext = this.index + 1;
        var _touchPrev = this.index - 1;
        if (this.s.loop && this.$slide.length > 2) {
            if (this.index === 0) {
                _touchPrev = this.$slide.length - 1;
            } else if (this.index === this.$slide.length - 1) {
                _touchNext = 0;
            }
        }

        this.$slide.removeClass('lg-next-slide lg-prev-slide');
        if (_touchPrev > -1) {
            this.$slide.eq(_touchPrev).addClass('lg-prev-slide');
        }

        this.$slide.eq(_touchNext).addClass('lg-next-slide');
    };

    Plugin.prototype.mousewheel = function() {
        var _this = this;
        _this.$outer.on('mousewheel.lg', function(e) {

            if (!e.deltaY) {
                return;
            }

            if (e.deltaY > 0) {
                _this.goToPrevSlide();
            } else {
                _this.goToNextSlide();
            }

            e.preventDefault();
        });

    };

    Plugin.prototype.closeGallery = function() {

        var _this = this;
        var mousedown = false;
        this.$outer.find('.lg-close').on('click.lg', function() {
            _this.destroy();
        });

        if (_this.s.closable) {

            // If you drag the slide and release outside gallery gets close on chrome
            // for preventing this check mousedown and mouseup happened on .lg-item or lg-outer
            _this.$outer.on('mousedown.lg', function(e) {

                if ($(e.target).is('.lg-outer') || $(e.target).is('.lg-item ') || $(e.target).is('.lg-img-wrap')) {
                    mousedown = true;
                } else {
                    mousedown = false;
                }

            });

            _this.$outer.on('mousemove.lg', function() {
                mousedown = false;
            });

            _this.$outer.on('mouseup.lg', function(e) {

                if ($(e.target).is('.lg-outer') || $(e.target).is('.lg-item ') || $(e.target).is('.lg-img-wrap') && mousedown) {
                    if (!_this.$outer.hasClass('lg-dragging')) {
                        _this.destroy();
                    }
                }

            });

        }

    };

    Plugin.prototype.destroy = function(d) {

        var _this = this;

        if (!d) {
            _this.$el.trigger('onBeforeClose.lg');
            $(window).scrollTop(_this.prevScrollTop);
        }


        /**
         * if d is false or undefined destroy will only close the gallery
         * plugins instance remains with the element
         *
         * if d is true destroy will completely remove the plugin
         */

        if (d) {
            if (!_this.s.dynamic) {
                // only when not using dynamic mode is $items a jquery collection
                this.$items.off('click.lg click.lgcustom');
            }

            $.removeData(_this.el, 'lightGallery');
        }

        // Unbind all events added by lightGallery
        this.$el.off('.lg.tm');

        // destroy all lightGallery modules
        $.each($.fn.lightGallery.modules, function(key) {
            if (_this.modules[key]) {
                _this.modules[key].destroy();
            }
        });

        this.lGalleryOn = false;

        clearTimeout(_this.hideBarTimeout);
        this.hideBarTimeout = false;
        $(window).off('.lg');
        $('body').removeClass('lg-on lg-from-hash');

        if (_this.$outer) {
            _this.$outer.removeClass('lg-visible');
        }

        $('.lg-backdrop').removeClass('in');

        setTimeout(function() {
            if (_this.$outer) {
                _this.$outer.remove();
            }

            $('.lg-backdrop').remove();

            if (!d) {
                _this.$el.trigger('onCloseAfter.lg');
            }
            _this.$el.focus();

        }, _this.s.backdropDuration + 50);
    };

    $.fn.lightGallery = function(options) {
        return this.each(function() {
            if (!$.data(this, 'lightGallery')) {
                $.data(this, 'lightGallery', new Plugin(this, options));
            } else {
                try {
                    $(this).data('lightGallery').init();
                } catch (err) {
                    console.error('lightGallery has not initiated properly', err);
                }
            }
        });
    };

    $.fn.lightGallery.modules = {};

})();


/***/ }),

/***/ "./node_modules/style-loader/lib/addStyles.js":
/*!****************************************************!*\
  !*** ./node_modules/style-loader/lib/addStyles.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/

var stylesInDom = {};

var	memoize = function (fn) {
	var memo;

	return function () {
		if (typeof memo === "undefined") memo = fn.apply(this, arguments);
		return memo;
	};
};

var isOldIE = memoize(function () {
	// Test for IE <= 9 as proposed by Browserhacks
	// @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
	// Tests for existence of standard globals is to allow style-loader
	// to operate correctly into non-standard environments
	// @see https://github.com/webpack-contrib/style-loader/issues/177
	return window && document && document.all && !window.atob;
});

var getTarget = function (target, parent) {
  if (parent){
    return parent.querySelector(target);
  }
  return document.querySelector(target);
};

var getElement = (function (fn) {
	var memo = {};

	return function(target, parent) {
                // If passing function in options, then use it for resolve "head" element.
                // Useful for Shadow Root style i.e
                // {
                //   insertInto: function () { return document.querySelector("#foo").shadowRoot }
                // }
                if (typeof target === 'function') {
                        return target();
                }
                if (typeof memo[target] === "undefined") {
			var styleTarget = getTarget.call(this, target, parent);
			// Special case to return head of iframe instead of iframe itself
			if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
				try {
					// This will throw an exception if access to iframe is blocked
					// due to cross-origin restrictions
					styleTarget = styleTarget.contentDocument.head;
				} catch(e) {
					styleTarget = null;
				}
			}
			memo[target] = styleTarget;
		}
		return memo[target]
	};
})();

var singleton = null;
var	singletonCounter = 0;
var	stylesInsertedAtTop = [];

var	fixUrls = __webpack_require__(/*! ./urls */ "./node_modules/style-loader/lib/urls.js");

module.exports = function(list, options) {
	if (typeof DEBUG !== "undefined" && DEBUG) {
		if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};

	options.attrs = typeof options.attrs === "object" ? options.attrs : {};

	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (!options.singleton && typeof options.singleton !== "boolean") options.singleton = isOldIE();

	// By default, add <style> tags to the <head> element
        if (!options.insertInto) options.insertInto = "head";

	// By default, add <style> tags to the bottom of the target
	if (!options.insertAt) options.insertAt = "bottom";

	var styles = listToStyles(list, options);

	addStylesToDom(styles, options);

	return function update (newList) {
		var mayRemove = [];

		for (var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];

			domStyle.refs--;
			mayRemove.push(domStyle);
		}

		if(newList) {
			var newStyles = listToStyles(newList, options);
			addStylesToDom(newStyles, options);
		}

		for (var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];

			if(domStyle.refs === 0) {
				for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

				delete stylesInDom[domStyle.id];
			}
		}
	};
};

function addStylesToDom (styles, options) {
	for (var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];

		if(domStyle) {
			domStyle.refs++;

			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}

			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];

			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}

			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles (list, options) {
	var styles = [];
	var newStyles = {};

	for (var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = options.base ? item[0] + options.base : item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};

		if(!newStyles[id]) styles.push(newStyles[id] = {id: id, parts: [part]});
		else newStyles[id].parts.push(part);
	}

	return styles;
}

function insertStyleElement (options, style) {
	var target = getElement(options.insertInto)

	if (!target) {
		throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
	}

	var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

	if (options.insertAt === "top") {
		if (!lastStyleElementInsertedAtTop) {
			target.insertBefore(style, target.firstChild);
		} else if (lastStyleElementInsertedAtTop.nextSibling) {
			target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			target.appendChild(style);
		}
		stylesInsertedAtTop.push(style);
	} else if (options.insertAt === "bottom") {
		target.appendChild(style);
	} else if (typeof options.insertAt === "object" && options.insertAt.before) {
		var nextSibling = getElement(options.insertAt.before, target);
		target.insertBefore(style, nextSibling);
	} else {
		throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
	}
}

function removeStyleElement (style) {
	if (style.parentNode === null) return false;
	style.parentNode.removeChild(style);

	var idx = stylesInsertedAtTop.indexOf(style);
	if(idx >= 0) {
		stylesInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement (options) {
	var style = document.createElement("style");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}

	if(options.attrs.nonce === undefined) {
		var nonce = getNonce();
		if (nonce) {
			options.attrs.nonce = nonce;
		}
	}

	addAttrs(style, options.attrs);
	insertStyleElement(options, style);

	return style;
}

function createLinkElement (options) {
	var link = document.createElement("link");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}
	options.attrs.rel = "stylesheet";

	addAttrs(link, options.attrs);
	insertStyleElement(options, link);

	return link;
}

function addAttrs (el, attrs) {
	Object.keys(attrs).forEach(function (key) {
		el.setAttribute(key, attrs[key]);
	});
}

function getNonce() {
	if (false) {}

	return __webpack_require__.nc;
}

function addStyle (obj, options) {
	var style, update, remove, result;

	// If a transform function was defined, run it on the css
	if (options.transform && obj.css) {
	    result = typeof options.transform === 'function'
		 ? options.transform(obj.css) 
		 : options.transform.default(obj.css);

	    if (result) {
	    	// If transform returns a value, use that instead of the original css.
	    	// This allows running runtime transformations on the css.
	    	obj.css = result;
	    } else {
	    	// If the transform function returns a falsy value, don't add this css.
	    	// This allows conditional loading of css
	    	return function() {
	    		// noop
	    	};
	    }
	}

	if (options.singleton) {
		var styleIndex = singletonCounter++;

		style = singleton || (singleton = createStyleElement(options));

		update = applyToSingletonTag.bind(null, style, styleIndex, false);
		remove = applyToSingletonTag.bind(null, style, styleIndex, true);

	} else if (
		obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function"
	) {
		style = createLinkElement(options);
		update = updateLink.bind(null, style, options);
		remove = function () {
			removeStyleElement(style);

			if(style.href) URL.revokeObjectURL(style.href);
		};
	} else {
		style = createStyleElement(options);
		update = applyToTag.bind(null, style);
		remove = function () {
			removeStyleElement(style);
		};
	}

	update(obj);

	return function updateStyle (newObj) {
		if (newObj) {
			if (
				newObj.css === obj.css &&
				newObj.media === obj.media &&
				newObj.sourceMap === obj.sourceMap
			) {
				return;
			}

			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;

		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag (style, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (style.styleSheet) {
		style.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = style.childNodes;

		if (childNodes[index]) style.removeChild(childNodes[index]);

		if (childNodes.length) {
			style.insertBefore(cssNode, childNodes[index]);
		} else {
			style.appendChild(cssNode);
		}
	}
}

function applyToTag (style, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		style.setAttribute("media", media)
	}

	if(style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		while(style.firstChild) {
			style.removeChild(style.firstChild);
		}

		style.appendChild(document.createTextNode(css));
	}
}

function updateLink (link, options, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	/*
		If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
		and there is no publicPath defined then lets turn convertToAbsoluteUrls
		on by default.  Otherwise default to the convertToAbsoluteUrls option
		directly
	*/
	var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

	if (options.convertToAbsoluteUrls || autoFixUrls) {
		css = fixUrls(css);
	}

	if (sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = link.href;

	link.href = URL.createObjectURL(blob);

	if(oldSrc) URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ "./node_modules/style-loader/lib/urls.js":
/*!***********************************************!*\
  !*** ./node_modules/style-loader/lib/urls.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {


/**
 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
 * embed the css on the page. This breaks all relative urls because now they are relative to a
 * bundle instead of the current page.
 *
 * One solution is to only use full urls, but that may be impossible.
 *
 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
 *
 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
 *
 */

module.exports = function (css) {
  // get current location
  var location = typeof window !== "undefined" && window.location;

  if (!location) {
    throw new Error("fixUrls requires window.location");
  }

	// blank or null?
	if (!css || typeof css !== "string") {
	  return css;
  }

  var baseUrl = location.protocol + "//" + location.host;
  var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

	// convert each url(...)
	/*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
	var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
		// strip quotes (if they exist)
		var unquotedOrigUrl = origUrl
			.trim()
			.replace(/^"(.*)"$/, function(o, $1){ return $1; })
			.replace(/^'(.*)'$/, function(o, $1){ return $1; });

		// already a full url? no change
		if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(unquotedOrigUrl)) {
		  return fullMatch;
		}

		// convert the url to a full url
		var newUrl;

		if (unquotedOrigUrl.indexOf("//") === 0) {
		  	//TODO: should we add protocol?
			newUrl = unquotedOrigUrl;
		} else if (unquotedOrigUrl.indexOf("/") === 0) {
			// path should be relative to the base url
			newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
		} else {
			// path should be relative to current directory
			newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
		}

		// send back the fixed url(...)
		return "url(" + JSON.stringify(newUrl) + ")";
	});

	// send back the fixed css
	return fixedCss;
};


/***/ }),

/***/ "./resources/js/info.js":
/*!******************************!*\
  !*** ./resources/js/info.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var lightgallery_src_css_lightgallery_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lightgallery/src/css/lightgallery.css */ "./node_modules/lightgallery/src/css/lightgallery.css");
/* harmony import */ var lightgallery_src_css_lightgallery_css__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lightgallery_src_css_lightgallery_css__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lightgallery_src_js_lightgallery_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lightgallery/src/js/lightgallery.js */ "./node_modules/lightgallery/src/js/lightgallery.js");
/* harmony import */ var lightgallery_src_js_lightgallery_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lightgallery_src_js_lightgallery_js__WEBPACK_IMPORTED_MODULE_1__);


$(document).ready(function () {
  $("#info-lightgallery").lightGallery({
    selector: '.item',
    thumbnail: true,
    pager: false
  });
  $("#about-lightgallery").lightGallery({
    selector: '.item',
    thumbnail: true,
    pager: false
  });
  $('.location-map').on('click', function () {
    var links = $(this).attr('data-src');
    $('iframe').attr('src', links);
  });
});

/***/ }),

/***/ 7:
/*!************************************!*\
  !*** multi ./resources/js/info.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\OpenServer\domains\admin.astudio.laravel\resources\js\info.js */"./resources/js/info.js");


/***/ })

/******/ });