@extends('dashboard.index')

@section('title')
		Accident Logs Reports
@endsection

@section('menus')

<br>
@endsection

@section('content')
    <div class="card shadow mb-4 col-lg-12 px-0">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Customize Report</h6>
      </div>
    <div class="card-body">
      <form action="{{route('report.generate')}}" method="POST">
        @csrf
        <div class="row" >
          <div class="form-group col-lg-4">
            <label for="accident_subject">Accident Subject</label> 
            <select id="accident_subject" name="accident_subject[][accident_subject]" class="custom-select selected-tags" multiple="multiple">
              <option value=""  disabled>Select Accident Subject</option>
              @foreach ($accidents as $accident)
                <option value="{{$accident->accident_subject}}">{{$accident->accident_subject}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-lg-4">
            <label for="cause_of_accident">Cause Of Accident</label> 
            <select id="cause_of_accident" name="cause_of_accident[][cause_of_accident]" class="custom-select selected-tags" multiple="multiple">
              <option value=""  disabled>Select Cause Of Accident</option>
              @foreach ($accidents as $accident)
                <option value="{{$accident->cause_of_accident}}">{{$accident->cause_of_accident}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-lg-4">
            <label for="belonged_quarter">Belonged Quarter</label> 
            <select id="belonged_quarter" name="belonged_quarter" class="custom-select" required>
              <option value="" selected disabled>Select Belonged Quarter</option>
              @foreach ($belonged_quarter as $item)
								<option value="{{$item['value']}}">{{$item['option']}}</option>
							@endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-lg-4">
            <label for="oparation_year">Oparation Year</label> 
            <select id="oparation_year" name="oparation_year" class="custom-select" required>
              <option value="" selected disabled>Select Oparation Year</option>
              @foreach ($operation_years as $year)
              <option value="{{$year}}">{{$year}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group col-lg-8">
            <label for="report_name">Report Name</label> 
            <input id="report_name" name="report_name" placeholder="Report Name" type="text" required="required" class="form-control">
          </div>
        </div>
        <h5 class="text-sm mt-5"> Include In Report </h5><hr>
          <div class="row">
            <div class="form-group col-lg-3 pl-0">
              <label for="section_name">Section Name</label> <br>
              <input id="section_name" name="section_name" placeholder="Section Name" type="checkbox">
            </div>
            <div class="form-group col-lg-3 pl-0">
              <label for="section_between">Section Between</label> <br>
              <input id="section_between" name="section_between" placeholder="Section Between" type="checkbox">
            </div>
            <div class="form-group col-lg-3 pl-0">
              <label for="section_rail_size">Section Rail Size</label> <br>
              <input id="section_rail_size" name="section_rail_size" placeholder="Section Rail Size" type="checkbox">
            </div>
            <div class="form-group col-lg-3 pl-0">
              <label for="section_kilometers">Section Kilometers</label> <br>
              <input id="section_kilometers" name="section_kilometers" placeholder="Section Kilometers" type="checkbox">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-3 pl-0">
              <label for="loco_trolley">Loco/Trolley</label> <br>
              <input id="loco_trolley" name="loco_trolley" placeholder="Loco / Trolley" type="checkbox">
            </div>
            <div class="form-group col-lg-3 ml-1 pl-0">
              <label for="resposible_designation">Resposible Designation</label> <br>
              <input id="resposible_designation" name="resposible_designation" placeholder="Resposible Designation" type="checkbox" >
            </div>
            <div class="form-group col-lg-2 pl-0">
              <label for="death_nature">Death Nature</label> <br>
              <input id="death_nature" name="death_nature" placeholder="Death Nature" type="checkbox">
            </div>
            <div class="form-group col-lg-3 ml-4 pl-5 ">
              <label for="injury_nature">Injury Nature</label> <br>
              <input id="injury_nature" name="injury_nature" placeholder="Injury Nature" type="checkbox" >
            </div>
          </div>
          <h5 class="text-sm mt-5">Report Group By </h5><hr>
          <div class="row mb-5">
            <div class="form-group col-lg-2 pl-0">
              <label for="death_nature">Death Nature</label> <br>
              <input id="death_nature" name="group_by" placeholder="Death Nature" value="death_nature" type="radio">
            </div>
            <div class="form-group col-lg-2 pl-0">
              <label for="injury_nature">Injury Nature</label> <br>
              <input id="injury_nature" name="group_by" placeholder="Injury Nature" value="injury_nature" type="radio">
            </div>
            <div class="form-group col-lg-2 pl-0">
              <label for="accident_subject_count">Accident Subject</label> <br>
              <input id="accident_subject_count" name="group_by" value="accident_subject" placeholder="Accident Subject" type="radio">
            </div>
            <div class="form-group col-lg-2 pl-0">
              <label for="cause_of_accident_count">Cause Of Accident</label> <br>
              <input id="cause_of_accident_count" name="group_by" value="cause_of_accident" placeholder="Cause Of Accident" type="radio">
            </div>
            <div class="form-group col-lg-3 pl-0">
              <label for="loco_trolley">Loco/Trolley</label> <br>
              <input id="loco_trolley" name="group_by" value="loco_trolley" placeholder="Loco / Trolley" type="radio">
            </div>
          </div>
          <div class="form-group">
            <button name="submit" type="submit" class="btn btn-success">Generate Report</button>
          </div>
        </form>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $(".selected-tags").select2({
        tags: true
      });
    })
   
  </script>
@endsection