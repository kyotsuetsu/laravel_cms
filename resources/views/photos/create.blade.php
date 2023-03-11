<!--<x-guest-layout>-->
<!--  <form method="POST" action="/upload" enctype="multipart/form-data">-->
<!--    @csrf-->
<!--    <input type="file" name="image">-->
<!--    <button>アップロード</button>-->
<!--  </form> -->
<!--</x-guest-layout>-->


<body>
  @if (session('success'))
  <div class="alert alert-success">
  {{ session('success') }}
  </div>
  @endif
  
  <form action="{{ route('photos.create') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
      <label for="image">画像ファイル</label>
      <input type="file" id="photo" name="photo">
    </div>
      <div>
        <button type="submit">アップロード</button>
      </div>
  </form>
</body>
