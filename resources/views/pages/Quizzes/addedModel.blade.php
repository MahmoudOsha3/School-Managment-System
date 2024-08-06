        <!-- add_modal_classroom -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size:18px ;font-weight:bold" class="modal-title" id="exampleModalLabel">
                            {{ trans('student.add_quizze') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('quizzes.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="name"
                                        class="mr-sm-2">{{ trans('site.ar.name') }}
                                        :</label>
                                    <input id="name" type="text" name="title_ar" class="form-control">
                                </div>
                                <div class="col">
                                    <label style="font-size:18px ;font-weight:bold" for="Name_en"
                                        class="mr-sm-2">{{ trans('site.en.name') }}
                                        :</label>
                                    <input type="text" class="form-control" name="title_en">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="grade"
                                            class="mr-sm-2">{{ trans('site.name_grades') }} :</label>
                                        <select name="grade_id" id="grade" class="form-control">
                                            <option value="{{ null }}" disabled selected>...</option>
                                            @foreach ($data['grades'] as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                            class="mr-sm-2">{{ trans('site.classroom_id') }} :</label>
                                        <select name="classroom_id" id="classroom_id" class="form-control">
                                            {{-- ajax code --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                            class="mr-sm-2">{{ trans('site.section') }} :</label>
                                        <select name="section_id" id="section_id" class="form-control">
                                            {{-- ajax code --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label style="font-size:18px ;font-weight:bold" for="grade"
                                            class="mr-sm-2">{{ trans('site.teacher') }} :</label>
                                        <select name="teachers_id" id="grade" class="form-control">
                                            <option value="{{ null }}" disabled selected>...</option>
                                            @foreach ($data['teachers'] as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label style="font-size:18px ;font-weight:bold" for="classroom_id"
                                        class="mr-sm-2">{{ trans('site.subject') }} :</label>
                                    <select name="subject_id" id="subject_id" class="form-control">
                                        @foreach ($data['subjects'] as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
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
