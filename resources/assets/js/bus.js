/*Affix the navbar after scroll below header*/
$(function() {
  $('#nav').affix({
    offset: {
      top: $('.jumbotron').height()+$('#nav').height()+96
    }
  });
});
