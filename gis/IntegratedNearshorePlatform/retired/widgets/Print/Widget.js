define([
    'dojo/_base/declare',
    'jimu/BaseWidget',
    'jimu/portalUtils',
    'dojo/_base/lang',
    'dojo/Deferred',
    "jimu/dijit/Message",
    './Print',
    "esri/request"

  ],
  function(declare, BaseWidget, portalUtils, lang, Deferred, Message, Print, esriRequest) {
    return declare([BaseWidget], {
      baseClass: 'jimu-widget-print',
      name: 'Print',
      className: 'esri.widgets.Print',
      _portalPrintTaskURL: null,

      postCreate: function() {
        this.inherited(arguments);
      },

      startup: function() {
        this.inherited(arguments);
        this._initPrinter();
      },

      _initPrinter: function() {
        this._getPrintTaskURL(this.appConfig.portalUrl).then(lang.hitch(this, function() {
          if (this.config && this.config.serviceURL) {
            this.config.serviceURL = this.config.serviceURL;
          } else if (this._portalPrintTaskURL) {
            this.config.serviceURL = this._portalPrintTaskURL;
          }

          var asyncDef = this.isAsync(this.config.serviceURL);
          asyncDef.then(lang.hitch(this, function(async) {
            this.print = new Print({
              map: this.map,
              printTaskURL: this.config.serviceURL,
              defaultAuthor: this.config.defaultAuthor,
              defaultCopyright: this.config.defaultCopyright,
              defaultTitle: this.config.defaultTitle,
              defaultFormat: this.config.defaultFormat,
              defaultLayout: this.config.defaultLayout,
              nls: this.nls,
              async: async
            });
            this.print.placeAt(this.printNode);
            this.print.startup();
          }), lang.hitch(this, function(err) {
            new Message({
              message: err.message
            });
          }));
        }), lang.hitch(this, function(err) {
          new Message({
            message: err
          });
          console.error(err);
        }));
      },


      _getPrintTaskURL: function(portalUrl) {
        var printDef = new Deferred();
        var def = portalUtils.getPortalSelfInfo(portalUrl);
        def.then(lang.hitch(this, function(response) {
          this._portalPrintTaskURL = response.helperServices.printTask.url;
          if (this._portalPrintTaskURL) {
            printDef.resolve('success');
          }
        }), lang.hitch(this, function(err) {
          new Message({
            message: this.nls.portalConnectionError
          });
          printDef.reject('error');
          console.error(err);
        }));

        return printDef;
      },

      isAsync: function(serviceURL) {
        var def = new Deferred();
        esriRequest({
          url: serviceURL,
          content: {
            f: "json"
          },
          handleAs: "json",
          // callbackParamName: 'callback',
          load: lang.hitch(this, function(response) {
            if (response.executionType === "esriExecutionTypeAsynchronous") {
              def.resolve(true);
            } else {
              def.resolve(false);
            }
          }),
          error: lang.hitch(this, function(err) {
            def.reject(err);
          })
        }/*, {
          useProxy: true
        }*/);

        return def;
      },

      onSignIn: function(user) {
        user = user || {};
        if (user.userId && this.print) {
          this.print.updateAuthor(user.userId);
        }
      }
    });
  });