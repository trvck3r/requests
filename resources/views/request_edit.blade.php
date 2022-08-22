@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Введите данные') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('request_edit.userId', $per->id)}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="FIO" class="col-md-4 col-form-label text-md-end">{{ __('ФИО') }}</label>

                                <div class="col-md-6">
                                    <label id="FIO" type="text"
                                           class="form-control" name="FIO">{{$per->fio}}</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="stud_group"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Группа') }}</label>

                                <div class="col-md-6">
                                    <label id="stud_group" type="text"
                                           class="form-control " name="stud_group">{{$per->stud_group}}</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="request"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Статус заявки') }}</label>

                                <div class="col-md-6">
                                    <select name="request" id="request" class="form-control">
                                        @foreach(\App\Models\status::where('id', '>', 1)->get() as $el)
                                            <option value="{{$el->id}}" @if($el->id == App\Models\request_status::where('id_request', $per->id)->get()->last()->id_status) selected @endif>{{$el->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Комментарий') }}</label>

                                <div class="col-md-6">
                                    <input id="comment" type="text"
                                           class="form-control" name="comment" value="{{\App\Models\request_list_view::where('id_request', $per->id)->first()->comment}}">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Отправить') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
