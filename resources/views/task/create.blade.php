@extends('dashboard.index')

@section('title')
Create New Task 
@endsection

@section('content')


<form id="task_form" action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="col-md-8">
        <label>Task Title <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></label>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter Task Title" name="task_title">
        </div>

        <label>Add Project Files (png,gif,jpeg,jpg,txt,pdf,doc) <span class="glyphicon glyphicon-file" aria-hidden="true"></span></label>
		<div class="form-group">
           	<input type="file" class="form-control" name="photos[]" multiple>
       	</div>

        <div class="form-group">
            <textarea class="form-control my-editor" rows="10" id="task" name="task"></textarea>
        </div>
        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Assign to Project <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></label>
            <select name="project_id" class="selectpicker custom-select " data-style="btn-primary" style="width:100%;">
                @foreach( $projects as $project )
                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                 @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Assign to: <span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
            <select id="user" name="user" class="selectpicker custom-select " data-style="btn-info" style="width:100%;">
				@foreach ( $users as $user)
					<option value="{{ $user->id }}">{{ $user->name }}</option>
				@endforeach

            </select>
        </div>

        <div class="form-group">
            <label>Select Priority <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span></label>
            <select name="priority" class="selectpicker custom-select " data-style="btn-info" style="width:100%;">
              <option value="0">Normal</option>
              <option value="1">High</option>
            </select>
        </div>

        <div class="form-group">
            <label>Select Due Date <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label>
            <input id="duedate" type='text' class="form-control" name="duedate" placeholder="YYYY-MM-DD HH:MM:SS" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="duedate">
            @error('time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="btn-group">
            <input class="btn btn-primary" type="submit" value="Submit" onclick="return validateForm()">
            <a class="btn btn-default" href="{{ redirect()->getUrlGenerator()->previous() }}">Go Back</a>
        </div>

    </div>

</form>

<script>
    $(document).ready(function() {

        $('#duedate').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });

    });
</script>

<script src="{{ asset('js/moment.js') }}"></script> 

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
  var editor_config = {
    //path_absolute : "/",
    path_absolute:"{{ url('/') }}/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    },
    //  Add Bootstrap Image Responsive class for inserted images
    image_class_list: [
        {title: 'None', value: ''},
        {title: 'Bootstrap responsive image', value: 'img-responsive'},
    ]   


  };

  tinymce.init(editor_config);
</script>


@endsection


