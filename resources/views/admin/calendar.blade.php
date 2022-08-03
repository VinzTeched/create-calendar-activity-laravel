<!DOCTYPE html>
<html>
<head>
    <title>Admin - Activity</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layouts.head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    
</head>
<body class="hold-transition sidebar-mini skin-purple layout-fixed">
    <div class="wrapper">
        
		@include('admin.layouts.header')
		@include('admin.layouts.sidebar')
		 <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Activities</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Admin</a></li>
                      <li class="breadcrumb-item active">activities</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            
                    
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-9">
                        <div class="card card-primary">
                          <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                </div>
            </section> 
            <footer class="main-footer" style="font-size:12px">
                <strong>Copyright &copy; 2019-{{ Carbon\carbon::now()->year }} <a href="http://localhost:8000">adminPanel</a>.</strong>
                All rights reserved.
              </footer>
            
              <!-- Control Sidebar -->
              <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
              </aside>
              <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->

            <div id="createEventModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Add an Event</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only">close</span></button>
                        </div>
                        <div id="modalBody" class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{route('calender.create')}}">
                                @csrf
                           <div class="form-group">
                                <input class="form-control" type="text" placeholder="Event Name" id="eventName" name="title">
                            </div>
                            <input type="hidden" value="add" name="type">
                            <input type="hidden" name="user_id" value="{{Auth::guard('admin')->user()->id}}">
                            <input type="hidden" name="name" value="{{Auth::guard('admin')->user()->name}}">
            
                            <div class="form-group form-inline">
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" id="eventDueDate" class="form-control d-block" placeholder="Due Date (Format: yyyy-mm-dd)" name="start" style="min-width: 466px">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type='file' name="file" id="upload" accept="image/gif,image/jpeg,image/jpg,image/png"/>
                                <img id="imagetag" src="{{ asset('dist/img/upload.png')}}" style="width: 200px; height: 200px;display:block"  alt="Select Image"/>
                            </div>
            
                            <div class="form-group">
                                <textarea class="form-control" type="text" name="description" rows="4" placeholder="Event Description" id= "eventDescription"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="submi tButton">Save</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
       
            <div id="editEventModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Edit Event</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only">close</span></button>
                        </div>
                        <div id="modalBody" class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="{{route('calender.update')}}">
                                @csrf
                           <div class="form-group">
                                <input class="form-control" type="text" name="title" placeholder="Event Name" id="updateName">
                            </div>
                            <input type="hidden" value="update" name="type">
                            <input type="hidden" name="id" id="eventId">
                            <input type="hidden" name="image" id="eventImage">

                           <p> Created by: <input type="text" id="userName" style="background: none;border:none"></p>

            
                            <div class="form-group form-inline">
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" id="editDueDate" name="start" class="form-control d-block" placeholder="Due Date (Format: yyyy-mm-dd)" style="min-width: 466px">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type='file' name="file" id="upload" accept="image/gif,image/jpeg,image/jpg,image/png"/>
                                <img id="imageedit" src="" style="width: 200px; height: 200px; display:block"  alt="Select Image"/>
                            </div>
            
                            <div class="form-group">
                                <textarea class="form-control" name="description" type="text" rows="4" placeholder="Event Description" id= "updateDescription"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-primary" >Update Event</button>
                        </form>
                        <form method="POST" enctype="multipart/form-data" action="{{route('calender.delete')}}">
                            @csrf
                                <input type="hidden" name="id" id="deleteId">
                                <button type="submit" class="btn btn-danger">Delete Event</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- jQuery -->
            <!-- jQuery UI 1.11.4 -->
            <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
              $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- ChartJS -->
            <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
            <!-- Sparkline -->
            <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
            <!-- JQVMap -->
            <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
            <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
            <!-- jQuery Knob Chart -->
            <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
            <!-- daterangepicker -->
            <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
            <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
            <!-- Summernote -->
            <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
            <!-- overlayScrollbars -->
            <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
            
            <script src="{{ asset('dist/js/adminlte.js') }}"></script>
	</div>
   
<script>
$(document).ready(function () {
    $('#createEventModal').on('hide.bs.modal', function (e) {
        $(e.currentTarget).off('shown.bs.modal'); 
    });

    $('#editEventModal').on('hide.bs.modal', function (e) {
        $(e.currentTarget).off('shown.bs.modal'); 
    });

    var SITEURL = "{{ url('/') }}";
  
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/calender",
                    displayEventTime: false,
                    editable: true,
                    themeSystem : "bootstrap4",
                    header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                    },
                    droppable: true, 
                    eventRender: function (event, element, view) {
                        if (event.allDay === 'true') {
                                event.allDay = true;
                        } else {
                                event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                        $('#createEventModal')
                        .on('shown.bs.modal', function (e) {
                            $('#eventDueDate').val(moment(start).format('YYYY-MM-DD HH:mm'));
                       // $('#eventDueDate').val(moment(end).format('YYYY-MM-DD HH:mm'));
                        console.log('here!');
                        }).modal('show');
                        
                    },
                    eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update'
                            },
                            type: "POST",
                            success: function (response) {
                                displayMessage("Event Updated Successfully");
                            }
                        });
                    },
                    eventClick: function (event) {

                        $('#editEventModal')
                        .on('shown.bs.modal', function (e) {
                            $('#eventId').val(event.id);
                            $('#deleteId').val(event.id);
                            $('#userName').val(event.name);
                            $('#eventImage').val(event.image);
                            $('#updateName').val(event.title);
                            $('#editDueDate').val(moment(event.start).format('YYYY-MM-DD HH:mm'));
                            $('#updateDescription').val(event.description);
                            $('#imageedit').attr('src', SITEURL + '/storage/posts/' + event.image);
                            console.log('here!');
                        }).modal('show');
                       // var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                        id: event.id,
                                        type: 'delete'
                                },
                                success: function (response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Event Deleted Successfully");
                                }
                            });
                        }
                    }
 
                });

                $('#submitButton').on('click', function(e){
                        // We don't want this to act as a link so cancel the link action
                        e.preventDefault();

                        doSubmit();
                    });

                function doSubmit(){
                    $("#createEventModal").modal('hide');
                    var title = $('#eventName').val();
                    var start = $('#eventDueDate').val();
                    var end = $('#eventDueDate').val();
                    var description = $('#eventDescription').val();
                    
                    $.ajax({
                        url: SITEURL + "/fullcalenderAjax",
                        enctype: 'multipart/form-data',
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            description: description,
                            type: 'add'
                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("Event Created Successfully");

                            calendar.fullCalendar('renderEvent',
                                {
                                    id: data.id,
                                    title: title,
                                    start: start,
                                    end: end,
                                    description: description
                                    //allDay: allDay
                                },true);

                            calendar.fullCalendar('unselect');
                        }
                    });
                }
 
});
 
function displayMessage(message) {
    toastr.success(message, 'Event');
} 


    $('#imagetag').click(function(){
      $('#upload').click();
    });

    $('#imageedit').click(function(){
      $('#upload').click();
    });

    $('#attachement').click(function(){
      $('#upload-file').click();
      $(".fileDisplay").css("display", "block");
    });

    $(function(){
      $('#upload').change(function(){
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
        {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#imagetag').attr('src', e.target.result);
              $('#imageedit').attr('src', e.target.result);
            }
          reader.readAsDataURL(input.files[0]);
        }
        else
        {
          $('#imagetag').attr('src', '/static/images/150x150.png');
        }
      });

    });
  
</script>


  
</body>
</html>