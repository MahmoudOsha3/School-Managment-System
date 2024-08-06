@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    {{trans('site.teachers')}}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('site.teachers')}}</h4><br>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('site.dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{trans('site.teachers')}}</li>
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
                <div class="card-body">
                    <a style="font-size:18px ;font-weight:bold" href="{{ route('teachers.create') }}" type="button" class="button x-small">
                        {{ trans('site.add_teacher') }}
                    </a>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('site.name_teacher')}}</th>
                                    <th>{{ trans('site.email') }}</th>
                                    <th>{{trans('site.address')}}</th>
                                    <th>{{trans('site.specailization')}}</th>
                                    <th>{{trans('site.gender')}}</th>
                                    <th>{{trans('site.joining_date')}}</th>
                                    <th>{{trans('site.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$teacher->name}}</td>
                                        <td>{{$teacher->email}}</td>
                                        <td>{{$teacher->address}}</td>
                                        <td><?php echo $teacher->specialization->name ?? 'Null' ; ?></td>
                                        <td><?php echo $teacher->gender->name  ?? 'Null' ; ?></td>
                                        <td>{{$teacher->joining_date}}</td>
                                        <td>
                                            <a style="font-size:18px ;font-weight:bold" href="{{ route('teachers.edit' , $teacher->id ) }}" type="button" class="btn btn-primary btn-sm">
                                                {{ trans('site.edit') }}
                                            </a>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$teacher->id}}">
                                                {{ trans('site.delete') }}
                                            </button>
                                        </td>

                                        <!-- delete_model -->
                                        <div class="modal fade" id="delete{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle">{{ trans('site.tdelete_teacher') }}</h4>
                                                {{-- <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('site.confirm_delete') }}</h5> --}}
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('teachers.destroy' , $teacher->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="text" name="name" value="{{$teacher->getTranslation('name', App::getLocale())}}" class="form-control" disabled>

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
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
