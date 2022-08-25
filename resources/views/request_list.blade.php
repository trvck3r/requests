@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">      
               <!-- <form method="get" action="{{route('search')}}"> -->
      <!-- <input class="form-control" type="text" id="s" name="s" placeholder="Search" autofocus> 
      <button type="submit" class="btn btn-primary">Найти</button> -->
                
      <form action="{{ route('index', request()->query()) }}">
        <div class="flex my-2">
            <input type="search"  name="q" placeholder="Поиск..."
                    value="{{$search_param}}" 
                    style="border-radius: 0.375rem; 
                    width: calc(100% - 67.94px - 0.33em);;
                    padding: 0.375rem 0.75rem;
                    font-size: 0.9rem;
                    font-weight: 400;
                    line-height: 1.6;
                    color: #212529;
                    background-color: #f8fafc;
                    background-clip: padding-box;
                    border: 1px solid #ced4da;" />
        
            <button type="submit" class="btn btn-primary">Найти</button>
                
                <label for="one" style="margin: 10px 10px 0px 0px;">
                    <input name="one" type="checkbox" id="one" value="Новая"/> Новая</label>
                <label for="two" style="margin: 10px 10px 0px 0px;">
                    <input name="two" type="checkbox" id="two" value="Ожидает"/> Ожидает</label>
                <label for="three" style="margin: 10px 10px 0px 0px;">
                    <input name="three" type="checkbox" id="three" value="Готово"/> Готово</label>    
        </div>
    </form>

                     @foreach($users as $user)
                    <div class="card">
                        <div class="card-body">
                        <h5><b>ФИО: </b> {{$user->fio}} <br></h5>
                        <h5><b>Группа:</b> {{$user->stud_group}}  <br></h5>
                        <h5><b>Статус:</b> 

                                    <select class="form-control">
                                        @foreach(\App\Models\status::all() as $el)
                                        @if(App\Models\request_status::where('id_request', $users->first()->id_request)->get()->last()->id_status == 1)

                                        @if($el->name == 'Новая')
                                            <option disabled value="{{$el->id}}" @if($el->id == App\Models\request_status::where('id_request', $users->first()->id_request)->get()->last()->id_status) selected @endif>{{$el->name}}</option>
                                        @else
                                            <option value="{{$el->id}}" @if($el->id == App\Models\request_status::where('id_request', $users->first()->id_request)->get()->last()->id_status) selected @endif>{{$el->name}}</option>
                                        @endif
                                        @else
                                        @if($el->name != 'Новая')
                                        <option value="{{$el->id}}" @if($el->id == App\Models\request_status::where('id_request', $users->first()->id_request)->get()->last()->id_status) selected @endif>{{$el->name}}</option>
                                        @endif
                                        @endif
                                        @endforeach
                                    </select>
                                </form>
                                <br>
                            </h5>
                        <h5><b>Тип заявки:</b> {{$user->type_name}}</h5>
                        <!-- <h5><a href="{{route('request_edit.userId_', $user->id_request)}}"  type="submit" >Изменить </a></h5>                

                                <form action="{{route('request_edit.userId_',$user->id_request)}}" >
                                <button type="submit" class="btn btn-primary">Изменить</button>
                                </form> -->
                        <hr>
                        <h6><b>Комментарий:</b> {{$user->comment}}</h6>
                        </div>
                    </div>
                    <br>
                    
                @endforeach 

                
                    <div class="pagination">
                        {{ $users ->links()}}
                    </div>
            </div>
        </div>
    </div>
@endsection