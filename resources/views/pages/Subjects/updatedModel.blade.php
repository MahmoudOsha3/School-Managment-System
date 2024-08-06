        <!-- add_modal_classroom -->
        <div class="modal fade" id="edit{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                            {{ trans('site.add_subject') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('subjects.update' , $subject->id ) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="name"
                                        class="mr-sm-2">{{ trans('site.ar.name') }}
                                        :</label>
                                    <input id="name" type="text" name="name_ar" value="{{ $subject->getTranslation('name','ar') }}" class="form-control">
                                </div>
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                        class="mr-sm-2">{{ trans('site.en.name') }}
                                        :</label>
                                    <input type="text" class="form-control" name="name_en" value="{{ $subject->getTranslation('name','en') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="grade"
                                            class="mr-sm-2">{{ trans('site.name_grades') }} :</label>
                                        <select name="grade_id" id="grade" class="form-control">
                                            <option value="{{ null }}" disabled selected>...</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}" @selected($grade->id === $subject->grade->id)>{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                            class="mr-sm-2">{{ trans('site.classroom_id') }} :</label>
                                        <select name="class_id" id="class_id" class="form-control">
                                            <option value="{{ $subject->classroom->id }}" selected> {{ $subject->classroom->name }}</option>
                                            {{-- ajax code --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="section_id"
                                            class="mr-sm-2">{{ trans('site.section') }} :</label>
                                        <select name="section_id" id="section_id" class="form-control">
                                            <option value="{{ $subject->section->id }}" selected> {{ $subject->section->name }}</option>
                                            {{-- ajax code --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                            class="mr-sm-2">{{ trans('site.teacher') }} :</label>
                                        <select name="teacher_id" id="teacher_id" class="form-control">
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" @selected($teacher->id == $subject->teacher->id)>{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
