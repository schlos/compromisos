// COMPROMISOS APP
// @package  : compromisos
// @location : /js
// @file     : controller.js
// @author   : Gobierno fácil
// @url      : gobiernofacil.com


define(function(require){
  //
  // L O A D   T H E   A S S E T S   A N D   L I B R A R I E S
  //
  var Backbone = require('backbone'),
      tinyMCE  = require('tinymce'),
      Pikaday  = require('pikaday');

  //
  // I N I T I A L I Z E   T H E   B A C K B O N E   V I E W
  //
  var controller = Backbone.View.extend({

    //
    // D E F I N E   T H E   E V E N T S
    // 
    events : {
   
    },


    //
    // S E T   T H E   C O N T A I N E R
    //
    el : "body",


    //
    // T H E   I N I T I A L I Z E   F U N C T I O N
    //
    initialize : function(){
      // SET THE FORM HELPERS IF REQUIRED
      // tinyMCE
      var defaultMenu = {
        edit   : {title : 'Edit'  , items : 'undo redo | cut copy paste pastetext | selectall'},
        insert : {title : 'Insert', items : 'link media | template hr'},
        view   : {title : 'View'  , items : 'visualaid'},
        table  : {title : 'Table' , items : 'inserttable tableprops deletetable | cell row column'}
      }

      if(this.$('#description').length){
        
        tinymce.init({
          selector:'textarea',
          menu : defaultMenu
        });


      }

      // Pikaday
      // TROPOCALIZACIÓN!!!!!!!
      var tropical = {
          previousMonth : 'Mes previo',
          nextMonth     : 'Mes siguiente',
          months        : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
          weekdays      : ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
          weekdaysShort : ['Dom','Lun','Mar','Mie','Jue','Vie','Sab']
      };

      if(this.$('#step-1').length){
        var d1 = new Pikaday({
            field    : document.getElementById('step-1'),
            'format' : 'YYYY-MM-DD',
            i18n     : tropical
          }),
          d2 = new Pikaday({
            field    : document.getElementById('step-2'),
            'format' : 'YYYY-MM-DD',
            i18n     : tropical
          }),
          d3 = new Pikaday({
            field    : document.getElementById('step-3'),
            'format' : 'YYYY-MM-DD',
            i18n     : tropical
          }),
          d4 = new Pikaday({
            field    : document.getElementById('step-4'),
            'format' : 'YYYY-MM-DD',
            i18n     : tropical
          });
      }

    }
  });

  return controller;
});
