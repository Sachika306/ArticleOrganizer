// member.index
$('#delete').submit(function (e) {
    if (!confirm('ユーザーを削除しますか？')) {
        return false;
    }
});

// member.show
$('.date').datepicker({  
    format: 'mm-dd-yyyy'
  });  