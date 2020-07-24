@extends('dashboard.index')

@section('content')

        <div class="card shadow">
            <div class="card-header">
                <h5 class="text-center h3 font-weight-bolder">Inspection Results</h5>
            </div>
            <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <h3>Department:     <span class="font-weight-bold">{{ $department }}</span></h3>
                        </div>
                        <div class="form-group col-md-5">
                            <h3>Section:     <span class="font-weight-bold">{{ $section }} </span></h3>
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
                                    <td>
                                        @foreach ($checklist->checked_inspections as $checked)
                                            {{ $checked->status }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($checklist->checked_inspections as $checked)
                                            {{ $checked->action_required }}
                                        @endforeach
                                    </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
            </div>
        </div>

@endsection