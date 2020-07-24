@extends('dashboard.index')

@section('content')

        <div class="card shadow">
            <div class="card-header">
                <h5 class="text-center h3 font-weight-bolder">Inspection Checklist</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('inspection.checked')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <h3>Department:     <span class="font-weight-bold">{{ $department }}</span></h3>
                        </div>
                        <div class="form-group col-md-5">
                            <h3>Section:     <span class="font-weight-bold">{{ $section }} </span></h3>
                            <input type="hidden" name="section" value="{{ $section }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <h3>Inspection Type:   <span class="font-weight-bold">{{ $inspection_type }} </span></h3>
                        </div>
                        <div class="form-group col-md-5">
                            <h3>Inspection Part: <span class="font-weight-bold"> {{ $inspection_part }}</span></h3>
                        </div>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered"  id="dataTable">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Particular</th>
                                    <th>Inspection check</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <th>Recommendation</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Item</th>
                                    <th>Particular</th>
                                    <th>Inspection check</th>
                                    <th>Remarks</th>
                                    <th>Status</th>
                                    <th>Recommendation</th>
                                </tr>
                            </tfoot>

                            <tbody>

                                @foreach ($checklists as $checklist)
                                <tr>
                                    <td>{{ $checklist->item }}</td>
                                    <td>
                                        {{-- Particulars --}}
                                        <ul>
                                            @foreach ($checklist->particulars as $particular)
                                                <li>{{ $particular->particular }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        {{-- Inspection Checks --}}
                                        <ul>
                                            @foreach ($checklist->checks as $check)
                                                <li>{{ $check->inspection_checks }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        {{-- Remarks --}}
                                        <ul>
                                            @foreach ($checklist->remarks as $remark)
                                                <li>{{ $remark->remarks }}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    {{-- Status --}}
                                    <td>
                                        <textarea class="form-control" name="status[{{ $checklist->id}}][message]" id="" cols="15" rows="7"></textarea>
                                    </td>

                                    {{-- Recommendation --}}
                                    <td>
                                        <textarea class="form-control" name="comment[{{ $checklist->id}}][message]" id="" cols="15" rows="7"></textarea>
                                        <input type="hidden" name="checklist[{{$checklist->id}}][id]" value="{{ $checklist->id }}">

                                    </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary">Submit Inspection</button>
                    </div>
                </form>
            </div>
        </div>

@endsection