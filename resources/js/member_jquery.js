// メンバー・記事を削除する際のアラート
$('.delete').submit(function (e) {
    if (!confirm('削除したデータは元に戻せません。本当に削除しますか？')) {
        return false;
    }
});

// アウトライン・記事を承認する際のアラート
$('#publish').submit(function (e) {
  if (!confirm('記事を公開しますか？')) {
      return false;
  }
});

$('.submit').submit(function (e) {
  if (!confirm('内容を提出しますか？')) {
      return false;
  }
});

$('.approve').submit(function (e) {
  if (!confirm('内容を承認しますか？')) {
      return false;
  }
});

$('.decline').submit(function (e) {
  if (!confirm('修正依頼しますか？')) {
      return false;
  }
});

// jQuery UI datepicker
$('#outline_deadline').datepicker({  
    dateFormat: 'yy-mm-dd',
    minDate: '+0',
    // アウトライン納期で選択された日付を取得し、記事納期の日付選択に反映
    onSelect: function(dateStr) {
      var min = $(this).datepicker('getDate');
      $('#article_deadline').datepicker('option', {minDate: min})}
});  

$('#article_deadline').datepicker({  
    dateFormat: 'yy-mm-dd',
});


// オートコンプリート機能を適用（article.assign）
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