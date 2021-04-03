{{-- 未着手の場合 --}} 
@if($article->status_id == 1) 
<div class="badge btn-light text-wrap p-2" style="width: 80px;">

{{-- 納品完了の場合 --}} 
@elseif($article->status_id == 8)
<div class="badge bg-success text-wrap p-2" style="width: 80px;">

{{-- 確認中の場合 --}} 
@elseif($article->status_id == 7 || $article->status->id == 4)
<div class="badge bg-secondary text-wrap p-2" style="width: 80px;">

{{-- 作成中・修正中の場合 --}} 
@else
<div class="badge bg-primary text-wrap p-2" style="width: 80px;">
@endif