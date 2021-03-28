<form action="/article/destroy/{{ $article->id }}" id="delete" method="post">
                  @csrf
                  <button type="submit" id="delete">削除</button>
                  </form>