(function(e){function t(t){for(var r,n,c=t[0],i=t[1],u=t[2],l=0,d=[];l<c.length;l++)n=c[l],Object.prototype.hasOwnProperty.call(o,n)&&o[n]&&d.push(o[n][0]),o[n]=0;for(r in i)Object.prototype.hasOwnProperty.call(i,r)&&(e[r]=i[r]);p&&p(t);while(d.length)d.shift()();return s.push.apply(s,u||[]),a()}function a(){for(var e,t=0;t<s.length;t++){for(var a=s[t],r=!0,n=1;n<a.length;n++){var c=a[n];0!==o[c]&&(r=!1)}r&&(s.splice(t--,1),e=i(i.s=a[0]))}return e}var r={},n={1:0},o={1:0},s=[];function c(e){return i.p+"js/"+({}[e]||e)+"."+{2:"aa5123e4",3:"1f760db9",4:"efd95bd9"}[e]+".js"}function i(t){if(r[t])return r[t].exports;var a=r[t]={i:t,l:!1,exports:{}};return e[t].call(a.exports,a,a.exports,i),a.l=!0,a.exports}i.e=function(e){var t=[],a={2:1};n[e]?t.push(n[e]):0!==n[e]&&a[e]&&t.push(n[e]=new Promise((function(t,a){for(var r="css/"+({}[e]||e)+"."+{2:"913dea2b",3:"31d6cfe0",4:"31d6cfe0"}[e]+".css",o=i.p+r,s=document.getElementsByTagName("link"),c=0;c<s.length;c++){var u=s[c],l=u.getAttribute("data-href")||u.getAttribute("href");if("stylesheet"===u.rel&&(l===r||l===o))return t()}var d=document.getElementsByTagName("style");for(c=0;c<d.length;c++){u=d[c],l=u.getAttribute("data-href");if(l===r||l===o)return t()}var p=document.createElement("link");p.rel="stylesheet",p.type="text/css",p.onload=t,p.onerror=function(t){var r=t&&t.target&&t.target.src||o,s=new Error("Loading CSS chunk "+e+" failed.\n("+r+")");s.code="CSS_CHUNK_LOAD_FAILED",s.request=r,delete n[e],p.parentNode.removeChild(p),a(s)},p.href=o;var f=document.getElementsByTagName("head")[0];f.appendChild(p)})).then((function(){n[e]=0})));var r=o[e];if(0!==r)if(r)t.push(r[2]);else{var s=new Promise((function(t,a){r=o[e]=[t,a]}));t.push(r[2]=s);var u,l=document.createElement("script");l.charset="utf-8",l.timeout=120,i.nc&&l.setAttribute("nonce",i.nc),l.src=c(e);var d=new Error;u=function(t){l.onerror=l.onload=null,clearTimeout(p);var a=o[e];if(0!==a){if(a){var r=t&&("load"===t.type?"missing":t.type),n=t&&t.target&&t.target.src;d.message="Loading chunk "+e+" failed.\n("+r+": "+n+")",d.name="ChunkLoadError",d.type=r,d.request=n,a[1](d)}o[e]=void 0}};var p=setTimeout((function(){u({type:"timeout",target:l})}),12e4);l.onerror=l.onload=u,document.head.appendChild(l)}return Promise.all(t)},i.m=e,i.c=r,i.d=function(e,t,a){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},i.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(i.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)i.d(a,r,function(t){return e[t]}.bind(null,r));return a},i.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="",i.oe=function(e){throw console.error(e),e};var u=window["webpackJsonp"]=window["webpackJsonp"]||[],l=u.push.bind(u);u.push=t,u=u.slice();for(var d=0;d<u.length;d++)t(u[d]);var p=l;s.push([0,0]),a()})({0:function(e,t,a){e.exports=a("2f39")},"2f39":function(e,t,a){"use strict";a.r(t);a("ac1f"),a("5319"),a("7d6e"),a("e54f"),a("a4b7"),a("985d"),a("31cd");var r=a("a026"),n=a("1f91"),o=a("42d2"),s=a("b05d"),c=a("18d6"),i=a("f508"),u=a("1b3f"),l=a("2a19");r["a"].use(s["a"],{config:{loadingBar:{color:"secondary",size:"7px",position:"bottom"}},lang:n["a"],iconSet:o["a"],plugins:{LocalStorage:c["a"],Loading:i["a"],LoadingBar:u["a"],Notify:l["a"]}});var d=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{attrs:{id:"q-app"}},[a("router-view")],1)},p=[],f={name:"App"},h=f,m=a("2877"),g=Object(m["a"])(h,d,p,!1,null,null,null),v=g.exports,b=a("2f62"),w=a("0e44"),y=a("758b");const k={user:{id:null,username:null,name:null,email:null},token:null},S={SET_USER(e,t){e.user=t},SET_TOKEN(e,t){e.token=t,y["a"].defaults.headers.common.Authorization=`Bearer ${t}`},SET_AXIOS(){const e=JSON.parse(c["a"].getItem("vuex"));y["a"].defaults.headers.common.Authorization=`Bearer ${e.Auth.token}`},LOGOUT(e){e.user.id=null,e.user.username=null,e.user.name=null,e.user.email=null,e.token=null}},_={login({commit:e},t){return new Promise(((a,r)=>{y["a"].get("/api/csrf-cookie").then((n=>{y["a"].post("/api/v1/login",t).then((t=>{e("SET_USER",t.data.user),e("SET_TOKEN",t.data.token),a(t.data)})).catch((e=>{console.error(e),r(e)}))})).catch((e=>{console.error(e),r(e)}))}))},logout({commit:e}){return new Promise(((t,a)=>{y["a"].post("/api/v1/logout").then((a=>{e("LOGOUT"),t(a.data)})).catch((e=>{console.error(e)}))}))},storeUser({commit:e},t){return new Promise(((a,r)=>{y["a"].post("/api/v1/users",t).then((t=>{e("SET_USER",t.data.user),e("SET_TOKEN",t.data.token),a(t.data)})).catch((e=>{console.error(e)}))}))},updateUser({state:e,commit:t},a){return new Promise(((r,n)=>{y["a"].patch("/api/v1/users/"+e.user.id,a).then((e=>{t("SET_USER",e.data.data),r(e.data)})).catch((e=>{console.error(e)}))}))},showUser({state:e,commit:t}){return new Promise(((a,r)=>{y["a"].get("/api/v1/users/"+e.user.id).then((e=>{t("SET_USER",e.data.user),t("SET_TOKEN",e.data.token),a(e.data)})).catch((e=>{console.error(e)}))}))},forgotPassword({commit:e},t){return new Promise(((e,a)=>{y["a"].post("/api/v1/users/forgot-password",{email:t}).then((t=>{e(t.data)})).catch((e=>{console.error(e),a(e)}))}))},resetPassword({commit:e},t){return new Promise(((a,r)=>{y["a"].post("/api/v1/users/reset-password",t).then((t=>{e("SET_USER",t.data.user),e("SET_TOKEN",t.data.token),a(t.data)})).catch((e=>{console.error(e),r(e)}))}))}},E={isUserAuthenticated:e=>null!==e.token};var P={namespaced:!0,state:k,mutations:S,actions:_,getters:E};const O={},A={},T={install({commit:e},t){return new Promise(((e,t)=>{y["a"].post("/api/v1/packages/install").then((t=>{console.log(t),e(t)})).catch((e=>{console.error(e),t(e)}))}))}},C={};var j={namespaced:!0,state:O,mutations:A,actions:T,getters:C};r["a"].use(b["a"]);let q=null;var U=function(){return q=new b["a"].Store({modules:{Auth:P,PackageCentre:j},plugins:[Object(w["a"])({paths:["Auth"]})],strict:!1}),q},x=a("8c4f");a("ddb0");const N=[{path:"/",component:()=>Promise.all([a.e(0),a.e(3)]).then(a.bind(null,"713b")),children:[{path:"",component:()=>Promise.all([a.e(0),a.e(2)]).then(a.bind(null,"8b24"))}]},{path:"*",component:()=>a.e(4).then(a.bind(null,"e51e"))}];var B=N;r["a"].use(x["a"]);var L=function(){const e=new x["a"]({scrollBehavior:()=>({x:0,y:0}),routes:B,mode:"hash",base:""});return e},Q=async function(){const e="function"===typeof U?await U({Vue:r["a"]}):U,t="function"===typeof L?await L({Vue:r["a"],store:e}):L;e.$router=t;const a={router:t,store:e,render:e=>e(v),el:"#q-app"};return{app:a,store:e,router:t}},I=({router:e,Vue:t})=>{q.getters["Auth/isUserAuthenticated"]&&(q.commit("Auth/SET_AXIOS"),q.dispatch("Auth/showUser")),e.beforeEach(((e,t,a)=>{e.matched.some((e=>e.meta.requiresAuth))?q.getters["Auth/isUserAuthenticated"]?a():(q.dispatch("Auth/logout"),a({path:"/auth/login"})):a()}))},R=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("q-card",{staticStyle:{"min-width":"1000px"}},[a("q-bar",{staticClass:"primary"},[a("q-icon",{attrs:{name:"o_settings"}}),a("div",[e._v("Package Centre")]),a("q-space"),a("q-btn",{attrs:{dense:"",flat:"",icon:"help_outline"}}),a("q-btn",{attrs:{dense:"",flat:"",icon:"close"}})],1),a("q-card-section",[a("div",{staticClass:"row"},[a("package-card",{attrs:{"package-name":"Apache","package-date":"23/06/2021","package-status":"Beta","package-action":"Open"}}),a("package-card",{attrs:{"package-name":"MariaDB","package-date":"23/06/2021","package-status":"","package-action":"Open"},on:{click:e.install}})],1)])],1)},$=[],D={name:"PackageCentre",data:function(){return{}}},K=D,M=a("9989"),V=a("f09f"),z=a("d847"),J=a("0016"),G=a("2c91"),X=a("9c40"),F=a("a370"),H=a("eebe"),W=a.n(H),Y=Object(m["a"])(K,R,$,!1,null,null,null),Z=Y.exports;W()(Y,"components",{QPage:M["a"],QCard:V["a"],QBar:z["a"],QIcon:J["a"],QSpace:G["a"],QBtn:X["a"],QCardSection:F["a"]});var ee=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"col-3"},[a("div",{staticClass:"row"},[e._v("Name: "+e._s(e.packageName))]),a("div",{staticClass:"row"},[e._v("Date: "+e._s(e.packageDate))]),a("div",{staticClass:"row"},[e._v("Status: "+e._s(e.packageStatus))]),a("div",{staticClass:"row"},[e._v(e._s(e.packageAction))]),a("q-btn",{attrs:{unelevated:"",rounded:"",label:"Install",color:"primary"},on:{click:e.install}})],1)},te=[],ae=a("ded3"),re=a.n(ae),ne={name:"PackageCard",data:function(){return{}},methods:re()({},Object(b["b"])("PackageCentre",["install"])),props:{packageName:{type:String,required:!0},packageDate:{type:String,required:!0},packageStatus:{type:String,required:!0},packageAction:{type:String,required:!0}}},oe=ne,se=Object(m["a"])(oe,ee,te,!1,null,null,null),ce=se.exports;W()(se,"components",{QBtn:X["a"]});var ie=async({Vue:e})=>{e.component("PackageCentre",Z),e.component("PackageCard",ce)};const ue="";async function le(){const{app:e,store:t,router:a}=await Q();let n=!1;const o=e=>{n=!0;const t=Object(e)===e?a.resolve(e).route.fullPath:e;window.location.href=t},s=window.location.href.replace(window.location.origin,""),c=[y["default"],I,ie];for(let u=0;!1===n&&u<c.length;u++)if("function"===typeof c[u])try{await c[u]({app:e,router:a,store:t,Vue:r["a"],ssrContext:null,redirect:o,urlPath:s,publicPath:ue})}catch(i){return i&&i.url?void(window.location.href=i.url):void console.error("[Quasar] boot error:",i)}!0!==n&&new r["a"](e)}le()},"31cd":function(e,t,a){},"758b":function(e,t,a){"use strict";(function(e){a.d(t,"a",(function(){return s}));var r=a("a026"),n=a("bc3a"),o=a.n(n);let s=o.a;s=o.a.create({withCredentials:!0,baseURL:e.env.API}),r["a"].prototype.$axios=s}).call(this,a("4362"))}});