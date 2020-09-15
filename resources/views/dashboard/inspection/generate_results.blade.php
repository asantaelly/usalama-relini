@extends('dashboard.index')

@section('content')

        <div class="card shadow">
            <div class="card-header">
                <h5 class="text-center">Generate Inspection Results</h5>
            </div>
            <div class="card-body">

                <div class="container">

                <form action="{{ route('show.results')}}" method="GET">
                    @csrf
                    <div class="form-row">
                        {{-- <div class="form-group col-md-6">
                            <label for="">Department</label>
                            <select name="department" id="" class="custom-select">
                                <option value="" selected disabled>Select Department:</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group col-md-6">
                            <label for="">Section</label>
                            <select name="section" id="" class="custom-select">
                                <option value="" selected disabled>Select Section:</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->between }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sectionInput">Select Type of Inspection</label>
                            <select name="inspection_type" id="" class="custom-select">
                                <option value="" selected disabled>Select Type:</option>
                                @foreach ($inspection_types as $inspection_type)
                                    <option value="{{ $inspection_type->id }}">{{ $inspection_type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="partsInput">Select area for Inspection</label>
                            <select name="inspection_part" id="" class="custom-select">
                                <option value="" selected disabled>Select Area:</option>
                                @foreach ($inspection_parts as $inspection_part)
                                    <option value="{{ $inspection_part->id }}">{{ $inspection_part->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Generate Inspection Results</button>
                    </div>
                </form>


            </div>
            </div>
        </div>

@endsection