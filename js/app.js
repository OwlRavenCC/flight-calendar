/* AJAX functions */

function SearchUser(search, result, tier, id){

$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $(search).keyup(function(){
  $(result).html('');

  var searchField = $(search).val();
  var expression = new RegExp(searchField, "i");
  $.getJSON('ajax/users_ajax.php', function(data) {
   $.each(data, function(key, value){
    if (value.id.search(expression) != -1 || value.fname.search(expression) != -1 || value.lname.search(expression) != -1 || value.tier.search(expression) != -1)
    {
      if (value.tier == tier){
        $(result).append('<li class="list-group-item link-class">'+value.id+' | '+ value.fname + ' ' + value.lname + '</li>');
      }
    }
   });
  });
 });

 $(result).on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $(search).val($.trim(click_text[1]));
  $(id).val($.trim(click_text[0]));
  $(result).html('');
 });
});

}


function SearchPlane(search, result, tach,id){

$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $(search).keyup(function(){
  $(result).html('');

  var searchField = $(search).val();
  var expression = new RegExp(searchField, "i");
  $.getJSON('ajax/planes_ajax.php', function(data) {
   $.each(data, function(key, value){
    if (value.id_airplane.search(expression) != -1  || value.name.search(expression) != -1 || value.tach_out.search(expression) != -1)
    {
        $(result).append('<li class="list-group-item link-class">'+value.id_airplane +' | '+ value.name + ' | ' +  value.tach_out + '</li>');

    }
   });
  });
 });

 $(result).on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $(search).val($.trim(click_text[1]));
  $(tach).val($.trim(click_text[2]));
  $(id).val($.trim(click_text[0]));
  $(result).html('');
 });
});

}
