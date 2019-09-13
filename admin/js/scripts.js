$(function(){
  'use strict';
  var loc    = window.location.pathname;
  var path   = loc.split('/');
  var isRtl  = (path[2].indexOf('rtl') >= 0)? true : false;
  var newloc = '';

  $('head').append('<link id="headerSkin" rel="stylesheet" href="">');

  $('body').on('click', '.template-options-btn', function(e){
    e.preventDefault();
    $('.template-options-wrapper').toggleClass('show');
  });

  $('body').on('click', '.skin-light-mode', function(e){
    e.preventDefault();
    newloc = loc.replace('template-dark', 'template');
    $(location).attr('href', newloc);
  });

  $('body').on('click', '.skin-dark-mode', function(e){
    e.preventDefault();
    if(loc.indexOf('template-dark') >= 0) {
      newloc = loc;
    } else {
      newloc = loc.replace('template', 'template-dark');
    }
    $(location).attr('href', newloc);
  });

  $('body').on('click', '.slim-direction', function(){
    var val = $(this).val();
    
    if(val === 'rtl') {
      if(!isRtl) {
        if(path[3]) {
          newloc = '/slim/'+path[2]+'-rtl/'+path[3];
        } else {
          newloc = '/slim/'+path[2]+'-rtl/';
        }
        $(location).attr('href', newloc);
      }
    } else {
      if(isRtl) {
        if(path[3]) {
          newloc = '/slim/'+path[2].replace('-rtl','')+'/'+path[3];
        } else {
          newloc = '/slim/'+path[2].replace('-rtl','')+'/';
        }
        $(location).attr('href', newloc);
      }
    }
  });

  $('body').on('click', '.sticky-header', function(){
    var val = $(this).val();
    if(val === 'yes') {
      $.cookie('sticky-header', 'true');
      $('body').addClass('slim-sticky-header');
    } else {
      $.removeCookie('sticky-header');
      $('body').removeClass('slim-sticky-header');
    }
  });

  $('body').on('click', '.header-skin', function(){
    var val = $(this).val();
    if(val !== 'default') {
      $.cookie('header-skin', val);
      $('#headerSkin').attr('href','../css/slim.'+val+'.css');
    } else {
      $.removeCookie('header-skin');
      $('#headerSkin').attr('href', '');
    }
  });

  $('body').on('click', '.full-width', function(){
    var val = $(this).val();
    if(val === 'yes') {
      $.cookie('full-width', 'true');
      $('body').addClass('slim-full-width');
    } else {
      $.removeCookie('full-width');
      $('body').removeClass('slim-full-width');
    }
  });

});

function onlyI(evt){evt = (evt) ? evt : event;var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));var respuesta = true;if (charCode > 31 && (charCode < 48 || charCode > 57)){respuesta = false;}return respuesta;}
function onlyC(evt){evt = (evt) ? evt : event;var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));var respuesta = true;if (!(charCode < 48 || charCode > 57)){respuesta = false;}return respuesta;}
function onlyD(evt){evt = (evt) ? evt : event;var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));var respuesta = true;if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46){respuesta = false;}return respuesta;}
function exoPopuu(url,params) {window.open(url,'exo_window',params);}
function exoCheckboxMon(form,checked){for (i=0; i<form.length; i++){if ((form.elements[i].type == "checkbox")) {form.elements[i].checked = checked;}}}