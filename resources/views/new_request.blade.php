@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Введите данные') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('complete_request') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="request"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Заявка') }}</label>

                                <div class="col-md-6">
                                    <label class="form-control">Получение справки об обучении в данном заведении</label>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="FIO" class="col-md-4 col-form-label text-md-end">{{ __('ФИО') }}</label>

                                <div class="col-md-6">
                                    <input id="FIO" type="text"
                                           class="form-control @error('FIO') is-invalid @enderror" name="FIO">

                                    @error('FIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="stud_group"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Группа') }}</label>

                                <div class="col-md-6">
                                    <input id="stud_group" type="text"
                                           class="form-control @error('stud_group') is-invalid @enderror" name="stud_group">

                                    @error('stud_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
