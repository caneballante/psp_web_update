///////////////////////////////////////////////////////////////////////////
// Copyright © 2014 Esri. All Rights Reserved.
//
// Licensed under the Apache License Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//    http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
///////////////////////////////////////////////////////////////////////////

define([
    'dojo/_base/declare',
    'jimu/BaseWidgetSetting',
    'dijit/_WidgetsInTemplateMixin',
    "dojo/_base/lang",
    'dojo/on',
    'dojo/Deferred',
    "dojo/dom-style",
    "dojo/dom-attr",
    "esri/request",
    'jimu/dijit/Message',
    'jimu/portalUtils',
    "dojo/store/Memory",
    'dijit/form/ValidationTextBox',
    'dijit/form/ComboBox'

  ],
  function(
    declare,
    BaseWidgetSetting,
    _WidgetsInTemplateMixin,
    lang,
    on,
    Deferred,
    domStyle,
    domAttr,
    esriRequest,
    Message,
    portalUtils,
    Memory) {
    return declare([BaseWidgetSetting, _WidgetsInTemplateMixin], {

      baseClass: 'jimu-widget-print-setting',
      memoryFormat: new Memory(),
      memoryLayout: new Memory(),
      _portalPrintTaskURL: null,

      startup: function() {
        this.inherited(arguments);
        this.setConfig(this.config);
        domAttr.set(this.checkImg, 'src', require.toUrl('jimu') + "/images/loading.gif");
        this.own(on(this.serviceURL, 'change', lang.hitch(this, this.onUrlChange)));
      },

      onUrlChange: function(){
        var value = this.serviceURL.value;
        if(value){
          domStyle.set(this.checkProcessDiv, "display", "");
          this.memoryFormat.data = {};
          this.memoryLayout.data = {};
          this.defaultFormat.set('store', this.memoryFormat);
          this.defaultLayout.set('store', this.memoryLayout);
          this.defaultFormat.set('value', "");
          this.defaultLayout.set('value', "");
          esriRequest({
            url: value,
            content: {
              f: "json"
            },
            handleAs: "json",
            callbackParamName: 'callback',
            load: lang.hitch(this, this._handlePrintInfo),
            error: lang.hitch(this, this._handleError)
          });
        }
      },

      _handleError: function(err) {
        domStyle.set(this.checkProcessDiv, "display", "none");
        var popup = new Message({
          message: err.message,
          buttons: [{
            label: this.nls.ok,
            onClick: lang.hitch(this, function() {
              popup.close();
            })
          }]
        });
      },

      _handlePrintInfo: function(data) {
        domStyle.set(this.checkProcessDiv, "display", "none");
        if(data && data.parameters){
          var len = data.parameters.length;
          for(var i=0;i<len;i++){
            var param = data.parameters[i];
            if(param.name === "Format" || param.name === "Layout_Template"){
              var values = data.parameters[i].choiceList;
              var n = values.length;
              var json = [];
              for(var m=0;m<n;m++){
                json.push({name: values[m], id: values[m]});
              }
              var defaultValue = data.parameters[i].defaultValue;
              // var stateStore = new Memory({data: json});
              if(param.name === "Format"){
                this.memoryFormat.data = json;
                this.defaultFormat.set('store', this.memoryFormat);
                if (this.config.serviceURL === this.serviceURL.value && this.config.defaultFormat) {
                  this.defaultFormat.set('value', this.config.defaultFormat);
                }else{
                  this.defaultFormat.set('value', defaultValue);
                }
              }else{
                this.memoryLayout.data = json;
                this.defaultLayout.set('store', this.memoryLayout);
                if (this.config.serviceURL === this.serviceURL.value && this.config.defaultLayout) {
                  this.defaultLayout.set('value', this.config.defaultLayout);
                }else{
                  this.defaultLayout.set('value', defaultValue);
                }
              }
            }
          }
        }
      },

      setConfig: function(config) {
        this.config = config;
        // if (config.serviceURL) {
        //   this.serviceURL.set('value', config.serviceURL);
        // }

        this.loadPrintURL(config);
        

        if (config.defaultTitle) {
          this.defaultTitle.set('value', config.defaultTitle);
        }else {
          this.defaultTitle.set('value', "ArcGIS WebMap");
        }

        if (config.defaultAuthor) {
          this.defaultAuthor.set('value', config.defaultAuthor);
        } else {
          this.defaultTitle.set('value', "ArcGIS WebApp Builder");
        }

        if (config.defaultCopyright) {
          this.defaultCopyright.set('value', config.defaultCopyright);
        }
       
      // addOption should be done automatically
        // if (config.defaultFormat) {
        //   this.defaultFormat.set('value', "PDF"); // addOption
        // }

        // if (config.defaultLayout) {
        //   this.defaultLayout.set('value', "MAP_ONLY"); 
        // }

      },

      getConfig: function() {
        if (!this.serviceURL.value) {
          var popup = new Message({
            message: this.nls.warning,
            buttons: [{
              label: this.nls.ok,
              onClick: lang.hitch(this, function() {
                popup.close();
              })
            }]
          });
          return false;
        }
        this.config.serviceURL = this.serviceURL.value;
        this.config.defaultTitle = this.defaultTitle.value;
        this.config.defaultAuthor = this.defaultAuthor.value;
        this.config.defaultCopyright = this.defaultCopyright.value;
        this.config.defaultFormat = this.defaultFormat.value;
        this.config.defaultLayout = this.defaultLayout.value;
        return this.config;
      },

      loadPrintURL: function(config) {
        this._getPrintTaskURL(this.appConfig.portalUrl).then(lang.hitch(this, function() {
          if(config.serviceURL){
            this.serviceURL.set('value', config.serviceURL);
          } else if (this._portalPrintTaskURL){
            this.serviceURL.set('value', this._portalPrintTaskURL);
          }
        }));
      },

      _getPrintTaskURL: function(portalUrl) {
        var printDef = new Deferred();
        if (this.appConfig.printTask && this.appConfig.printTask.url) {
          printDef.resolve('success');
          return printDef;
        }
        var def = portalUtils.getPortalSelfInfo(portalUrl);
        def.then(lang.hitch(this, function(response) {
          this._portalPrintTaskURL = response.helperServices.printTask.url;
          if (this._portalPrintTaskURL){
            printDef.resolve('success');
          }
            
        }), lang.hitch(this, function(err) {
          new Message({
            message: this.nls.portalConnectionError
          });
          printDef.reject('error');
          console.error(err);
        }));// .always(lang.hitch(this, function () {
        // }))
        
        return printDef;
      }
    });
  });