@extends('admin.layouts.dashboard')

@section('dashboard_content')

    <div class="row ">
        <div class="col-12 col-sm-10 col-lg-11 col-md-10 bg-form card-body-admin py-4">
            <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <div class="form-group">
                    <label for="name-input">Заголовок:</label>
                    <input type="text" class="form-control" id="name-input" name="title" value="{{ $article->title }}" required>
                </div>
                <div class="form-group pt-2">
                    <label for="content_area">Контент:<span class="text-danger">*</span></label>
                    <textarea id="content_area" class="form-control richTextBox is-invalid"
                              name="content" required>{{ $article->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="type-select">Тип:</label>
                    <select name="type" id="type-select" class="form-control">
                        @foreach(['Backend', 'Frontend', 'All'] as $type)
                            <option value="{{$type}}"{{ $article->type == $type ? 'selected':'' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user-select">Автор:</label>
                    <select name="user_id" id="user-select" class="form-control">
                        @foreach($users as $user)
                            <option value="{{$user->id}}" {{ $article->user_id == $user->id ? 'selected':'' }}>{{ $user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags-select"> Теги:</label>
                    <select id="tags-select" class="js-example-basic-multiple" name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"{{ $article->tags->find($tag->id) ? 'selected':'' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" title="{{ __('Изменить') }}"
                        class="btn n btn-success ">{{ __('Изменить') }}</button>
            </form>
        </div>
    </div>
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
@endpush

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/btl0oipda7muis57xyfq1uoau9xbwivfi6logxbc5y5uvpmm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/tinyMCE.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({width: '100%'});
        });
    </script>
@endpush
