@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}

@section('title')
    {{trans('site.classroom')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('site.classroom')}}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('site.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('site.classroom')}}</li>
            </ol>
        </div>
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                @if($errors->any())
                    @foreach ($errors->all() as $errors )
                        <div class="alert alert-danger">>
                            {{$errors}}
                        </div>
                    @endforeach
                @endif
                {{-- @if(!empty($validate))
                    @foreach ($validate as $val )
                        <div class="alert alert-danger">>
                            {{$val}}
                        </div>
                    @endforeach
                @endif --}}
                <div class="card-body">
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('site.add_classroom') }}
                    </button>
                    <button type="button" class="button x-small" id="btn_delete_all">
                        {{ trans('site.delete_checkbox') }}
                    </button>
                    <br><br>

                    <form action="{{route('classroom.index')}}" method="get">
                        @csrf
                        <select name="grade_id"  style="width: 200px ; height:20px" onchange="this.form.submit()">
                            <option value="{{null}}" selected disabled>{{__('site.search_using_grade')}}</option>
                            @foreach ($grades as $grade)
                                <option value="{{$grade->id}}" @selected($grade->id == @$_GET['grade_id'])>{{$grade->name}}</option>
                            @endforeach
                        </select>
                    </form>

                    <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th><input name="select_all" id="example-select-all" type="checkbox"  onclick="CheckAll('box1', this)" /></th>
                                    <th>#</th>
                                    <th>{{trans('site.name_classroom')}}</th>
                                    <th>{{trans('site.name_grades')}}</th>
                                    <th>{{trans('site.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $i = 1 @endphp
                                @foreach ($classrooms as $classroom)
                                    <tr>
                                        <td><input type="checkbox"  value="{{ $classroom->id }}" class="box1" ></td>
                                        <td>{{$i++}}</td>
                                        <td>{{$classroom->name}}</td>
                                        <td>{{$classroom->grade->name}}</td>
                                        <td>
                                            <button  type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$classroom->id}}">
                                                {{ trans('site.edit') }}
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#delete{{$classroom->id}}">
                                                {{ trans('site.delete') }}
                                            </button>
                                        </td>

                                        <!-- edit_modal_classroom -->
                                        <div class="modal fade" id="edit{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                                                            {{ trans('site.edit_classroom') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- edit_form -->
                                                        <form action="{{route('classroom.update' , $classroom->id)}}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="name_ar" class="mr-sm-2">{{ trans('site.ar.name') }}
                                                                        :</label>
                                                                    <input id="name_ar" type="text" name="name_ar" value="{{$classroom->getTranslation('name', 'ar')}}" class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <label style="font-size:18px ;font-weight:bold" for="Name_en" class="mr-sm-2">{{ trans('site.en.name') }}
                                                                        :</label>
                                                                    <input type="text" class="form-control" name="name_en" value="{{$classroom->getTranslation('name', 'en')}}">
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                                <div class="form-group">
                                                                    <label style="font-size:18px ;font-weight:bold" for="grade" class="mr-sm-2">{{ trans('site.name_grades') }} :</label>
                                                                    <select name="grade_id" id="grade" class="form-control">
                                                                        @foreach ($grades as $grade)
                                                                            <option value="{{$grade->id}}" @selected($grade->id == $classroom->grade_id)>{{$grade->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            <br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('site.close') }}</button>
                                                        <button type="submit" class="btn btn-success">{{ trans('site.submit') }}</button>
                                                    </div>
                                                    </form>

                                                    </div>
                                                </div>
                                        </div>

                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('site.confirm_delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{route('classroom.destroy' , $classroom->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="text" name="name" value="{{$classroom->getTranslation('name' , App::getLocale() )}}" class="form-control" disabled>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('site.close') }}</button>
                                                    <button type="submit" class="btn btn-danger">{{ trans('site.submit') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- add_modal_classroom -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                            {{ trans('site.add_classroom') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{route('classroom.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name" class="mr-sm-2">{{ trans('site.ar.name') }}
                                        :</label>
                                    <input id="Name" type="text" name="name_ar"  class="form-control">
                                </div>
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name_en" class="mr-sm-2">{{ trans('site.en.name') }}
                                        :</label>
                                    <input type="text" class="form-control" name="name_en">
                                </div>
                            </div><br><br>
                            <div class="form-group">
                                <label style="font-size:18px ;font-weight:bold" for="grade" class="mr-sm-2">{{ trans('site.name_grades') }} :</label>
                                <select name="grade_id" id="grade" class="form-control">
                                    <option value="{{null}}" disabled selected>...</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('site.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('site.submit') }}</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>


        <!-- حذف مجموعة صفوف -->
        <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('site.delete_checkbox') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete_all') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ trans('site.confirm_delete') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('site.close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('site.submit') }}</button>
                </div>
            </form>
        </div>
        </div>
        </div>

    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('js')
    @toastr_js
    @toastr_render

    <script>
        // check all className == class == box1 , element is (this) => dirction to check box one to one
        function CheckAll(className , element){
            var elements = document.getElementsByClassName(className);
            var l = elements.length ;

            if(element.checked){
                for (var i = 0; i < l ; i++) {
                    elements[i].checked = true;
                }
            }else{
                for (var i = 0; i < l ; i++) {
                    elements[i].checked = false;
                }
            }
        }
    </script>

    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                // خش علي جدول بحيث ايدي بتاع جدول مكتوب اهة في جو بقي شيك بوكس لو اتشيكت اعملي ايتش لكل واحدة واعملها بوش
                $("#datatable input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_all').modal('show') // خلي ميدوله تظهر ده ايدي بتاع ميدوله
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });
    </script>
@endsection
