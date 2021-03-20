// Delete alert
$('#delete').submit(function (e) {
    if (!confirm('ユーザーを削除しますか？')) {
        return false;
    }
});


// jQuery UI datepicker
$('.date').datepicker({  
    format: 'yyyy-mm-dd'
});  

// オートコンプリート機能を適用

$( "#outline_user_name" ).autocomplete({
  source:[outlineUserNames],
  select: function(event, ui) {
    $(".outline_user_name").val(ui.item.label);
    $(".outline_user_id").val(ui.item.value);
  }
});

console.log (outlineUserNames);

$( ".article-user-selector" ).autocomplete({
  source: articleUserNames // article/create.blade.php から配列を取得
});