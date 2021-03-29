// Delete alert
$('#delete').submit(function (e) {
    if (!confirm('削除したデータは元に戻せません。本当に削除しますか？')) {
        return false;
    }
});


// jQuery UI datepicker
$('.date').datepicker({  
    dateFormat: 'yy-mm-dd'
});  


// オートコンプリート機能を適用（article.assign）
$( "#outline_user_name" ).on( "autocompletefocus", function( event, ui ) {} );

$( "#outline_user_name" ).autocomplete({
  source: outlineUserNames,
  minLength: 0,
  select: function(event, ui) {
    $("#outline_user_name").val(ui.item.label);
    $("#outline_user_id").val(ui.item.value);
    return false;
  }
}).focus(function(){
  $(this).autocomplete('search', $(this).val());
});

console.log(outlineUserNames);

$( "#article_user_name" ).autocomplete({
  source: articleUserNames,
  minLength: 0,
  select: function(event, ui) {
    $("#article_user_name").val(ui.item.label);
    $("#article_user_id").val(ui.item.value);
    return false;
  }
}).focus(function(){
  $(this).autocomplete('search', $(this).val());
});