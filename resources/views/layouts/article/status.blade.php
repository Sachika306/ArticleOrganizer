@if($article->status->id == 1)
<div class="badge btn-light text-wrap p-2" style="width: 80px;">
@elseif($article->status->id == 8 || $article->status->id == 9)
<div class="badge bg-success text-wrap p-2" style="width: 80px;">
@elseif($article->status->id == 6 || $article->status->id == 3)
<div class="badge bg-info text-wrap p-2" style="width: 80px;">
@else
<div class="badge bg-secondary text-wrap p-2" style="width: 80px;">
@endif
