$(document).ready(function() { main(); });

function main(){
  $('.buscatit').keyup(function(){busca($(this).val(),'.itemtit')});
  $('.buscatit2').keyup(function(){busca($(this).val(),'.itemtit2')});
}

function busca(buscador,tipo){
  $(tipo).map(function(){
    var value = $(this).children("span").html();
    if(value.toLowerCase().indexOf(buscador) < 0){
      $(this).hide('slow');
    }else{
      $(this).show('slow');
    }
  });
}