@extends('dashboard.index')

@section('content')

        <div class="card shadow">
            <div class="card-header">
                <h5 class="text-center">Inspection Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('inspection.checked')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="">From Station</label>
                            <select name="" id="" class="custom-select">
                                <option value="">Pugu</option>
                                <option value="">Kamata</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="">To Station</label>
                            <select name="" id="" class="custom-select">
                                <option value="">DSM station</option>
                                <option value="">Malindi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sectionInput">Select a Department</label>
                            <select name="" id="" class="custom-select">
                                <option value="">a</option>
                                <option value="">b</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="partsInput">Select area for Inspection</label>
                            <select name="" id="" class="custom-select">
                                <option value="">a</option>
                                <option value="">b</option>
                            </select>
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
                                    <th>Action required</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Item</th>
                                    <th>Particular</th>
                                    <th>Inspection check</th>
                                    <th>Remarks</th>
                                    <th>Action required</th>
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
                                        <textarea class="form-control" name="comment[{{ $checklist->id}}][message]" id="" cols="15" rows="7"></textarea>
                                        <input type="hidden" name="checklist[{{$checklist->id}}][id]" value="{{ $checklist->id }}">

                                    </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary">Submit Findings</button>
                    </div>
                </form>
            </div>
        </div>

@endsection