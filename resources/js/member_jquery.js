// Delete alert
$('#delete').submit(function (e) {
    if (!confirm('ユーザーを削除しますか？')) {
        return false;
    }
});


// jQuery UI datepicker
$('.date').datepicker({  
    dateFormat: 'yy-mm-dd'
});  


// オートコンプリート機能を適用（article.create）
$( "#outline_user_name" ).autocomplete({
  source: outlineUserNames,
  select: function(event, ui) {
    $("#outline_user_name").val(ui.item.label);
    $("#outline_user_id").val(ui.item.value);
    return false;
    //event.preventDefault(); // inputにvalueが流れる（デフォルトの設定）を防ぐ
  },
  autofocus: true
});

console.log(outlineUserNames);

$( "#article_user_name" ).autocomplete({
  source: articleUserNames,
  select: function(event, ui) {
    $("#article_user_name").val(ui.item.label);
    event.preventDefault(); // inputにvalueが流れる（デフォルトの設定）を防ぐ
    $("#article_user_id").val(ui.item.value);
  },
  autofocus: true
});