@extends('dashboard.index')

@section('content')

        <div class="card shadow">
            <div class="card-header">
                <h5 class="text-center">Inspection Form</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
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
                                <tr>
                                <td>Rail Size</td>
                                <td>
                                    <ul>
                                        <li>80 lbs</li>
                                        <li>60 lbs</li>
                                        <li>56.12 lbs</li>
                                        <li>45 lbs</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>Table wear</li>
                                        <li>Side wear</li>
                                        <li>Skidded rail</li>
                                        <li>Wheel burns</li>
                                        <li>Corrugations</li>
                                    </ul>
                                </td>
                                <td>
                                    For 80 lbs not exceed 8mm
                                </td>
                                <td>Comments go here</td>
                                </tr>

                                <tr>
                                    <td>Rail Size</td>
                                    <td>
                                        <ul>
                                            <li>80 lbs</li>
                                            <li>60 lbs</li>
                                            <li>56.12 lbs</li>
                                            <li>45 lbs</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Table wear</li>
                                            <li>Side wear</li>
                                            <li>Skidded rail</li>
                                            <li>Wheel burns</li>
                                            <li>Corrugations</li>
                                        </ul>
                                    </td>
                                    <td>
                                        For 80 lbs not exceed 8mm
                                    </td>
                                    <td>Comments go here</td>
                                    </tr>
                                    

                                    <tr>
                                        <td>Welded rail</td>
                                        <td></td>
                                        <td>
                                            <ul>
                                                <li>Checking Expansion joint</li>
                                                <li>Deformation of track</li>
                                                <li>Checking of welded joint</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Check behaviour Morning/afternoon</li>
                                                <li>Make sure destress to be done within temperatur range</li>
                                                <li>Check behaviour fracture in welded joints</li>
                                            </ul>
                                        </td>
                                        <td></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>

@endsection