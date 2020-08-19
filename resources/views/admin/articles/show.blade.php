@extends('admin.layouts.dashboard')
@section('dashboard_content')
    <div class="container bg-form card-body-admin py-4">
        <div class="row" id="show_articles">
            <div class="col-2">id</div>
            <div class="col-10">{{ $article->id }}</div>
            <div class="col-2">Заголовок:</div>
            <div class="col-10">{{ $article->title }}</div>
            <div class="col-2">Тип:</div>
            <div class="col-10">{{ $article->type }}</div>
            <div class="col-2">Автор:</div>
            <div class="col-10">{{ $article->user->name }}</div>
            <div class="col-2">Теги:</div>
            <div class="col-10">{{ $article->tags->implode('name', ',') }}</div>
            <div class="col-2">Дата создания:</div>
            <div class="col-10">{{ $article->created_at }}</div>
            <div class="col-2">Дата обновления:</div>
            <div class="col-10">{{ $article->updated_at }}</div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        #show_articles .col-2, #show_articles .col-10 {
            padding-top: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #dcdcdd;
        }
        #show_articles .col-2 {
            border-right: 1px solid #dcdcdd;
        }
    </style>
@endpush