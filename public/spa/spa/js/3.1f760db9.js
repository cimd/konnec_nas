(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[3],{"713b":function(t,e,a){"use strict";a.r(e);var n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-layout",{attrs:{view:"hHh Lpr lff"}},[a("q-header",{attrs:{elevated:""}},[a("q-toolbar",[a("q-btn",{attrs:{flat:"",dense:"",round:"",icon:"menu","aria-label":"Menu"},on:{click:function(e){t.leftDrawerOpen=!t.leftDrawerOpen}}}),a("q-toolbar-title",[t._v("\n        Quasar App\n      ")]),a("div",[t._v("Quasar v"+t._s(t.$q.version))])],1)],1),a("q-drawer",{attrs:{"show-if-above":"",bordered:"",mini:t.miniState,"mini-to-overlay":"","content-class":"bg-grey-1"},on:{mouseover:function(e){t.miniState=!1},mouseout:function(e){t.miniState=!0}},model:{value:t.leftDrawerOpen,callback:function(e){t.leftDrawerOpen=e},expression:"leftDrawerOpen"}},[a("q-list",[a("q-item-label",{staticClass:"text-grey-8",attrs:{header:""}},[t._v("\n        Essential Links\n      ")]),t._l(t.essentialLinks,(function(e){return a("EssentialLink",t._b({key:e.title},"EssentialLink",e,!1))}))],2)],1),a("q-page-container",[a("router-view")],1)],1)},i=[],r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("q-item",{attrs:{clickable:"",tag:"a",target:"_blank",href:t.link}},[t.icon?a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:t.icon}})],1):t._e(),a("q-item-section",[a("q-item-label",[t._v(t._s(t.title))]),a("q-item-label",{attrs:{caption:""}},[t._v("\n      "+t._s(t.caption)+"\n    ")])],1)],1)},o=[],s={name:"EssentialLink",props:{title:{type:String,required:!0},caption:{type:String,default:""},link:{type:String,default:"#"},icon:{type:String,default:""}}},l=s,c=a("2877"),u=a("66e5"),p=a("4074"),m=a("0016"),d=a("0170"),f=a("eebe"),v=a.n(f),b=Object(c["a"])(l,r,o,!1,null,null,null),k=b.exports;v()(b,"components",{QItem:u["a"],QItemSection:p["a"],QIcon:m["a"],QItemLabel:d["a"]});const q=[{title:"Docs",caption:"quasar.dev",icon:"school",link:"https://quasar.dev"},{title:"Github",caption:"github.com/quasarframework",icon:"code",link:"https://github.com/quasarframework"},{title:"Discord Chat Channel",caption:"chat.quasar.dev",icon:"chat",link:"https://chat.quasar.dev"},{title:"Forum",caption:"forum.quasar.dev",icon:"record_voice_over",link:"https://forum.quasar.dev"},{title:"Twitter",caption:"@quasarframework",icon:"rss_feed",link:"https://twitter.quasar.dev"},{title:"Facebook",caption:"@QuasarFramework",icon:"public",link:"https://facebook.quasar.dev"},{title:"Quasar Awesome",caption:"Community Quasar projects",icon:"favorite",link:"https://awesome.quasar.dev"}];var h={name:"MainLayout",components:{EssentialLink:k},data(){return{leftDrawerOpen:!1,miniState:!0,essentialLinks:q}}},w=h,_=a("4d5a"),Q=a("e359"),g=a("65c6"),L=a("9c40"),y=a("6ac5"),D=a("9404"),S=a("1c1c"),O=a("09e3"),E=Object(c["a"])(w,n,i,!1,null,null,null);e["default"]=E.exports;v()(E,"components",{QLayout:_["a"],QHeader:Q["a"],QToolbar:g["a"],QBtn:L["a"],QToolbarTitle:y["a"],QDrawer:D["a"],QList:S["a"],QItemLabel:d["a"],QPageContainer:O["a"]})}}]);