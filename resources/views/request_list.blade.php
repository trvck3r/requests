@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach( $request_list as $el)
                    <div class="card">
                        <div class="card-body">
                        <h5><b>ФИО: </b> {{$el->fio}} <br></h5>
                        <h5><b>Группа:</b> {{$el->stud_group}}  <br></h5>
                        <h5><b>Статус:</b> {{$el->name}}  <br></h5>
                        <h5><b>Тип заявки:</b> {{$el->type_name}}</h5>
                        <!-- <h5><a href="{{route('request_edit.userId_', $el->id_request)}}"  type="submit" >Изменить </a></h5>                -->

                                <form action="{{route('request_edit.userId_', $el->id_request)}}" >
                                <button type="submit" class="btn btn-primary">Изменить</button>
                                </form>
                        <hr>
                        <h6><b>Комментарий:</b> {{$el->comment}}</h6>
                        </div>
                    </div>
                    <br>
                @endforeach
                    <div class="pagination">
                        {{ $request_list->links()}}
                    </div>
            </div>
        </div>
    </div>
@endsection
