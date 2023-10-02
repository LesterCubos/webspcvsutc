<div class="modal fade" id="edit_event_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
      <div class="modal-content admin-form">
        <div class="modal-header justify-content-center">
          <h4 class="modal-title" id="myModalLabel">View Event</h4>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        </div>
        <div class="modal-body">
          <div id="edit_event_alert"></div>
          <form id="edit_event_frm" action=""  method="post" enctype="multipart/form-data"  >
               {{ csrf_field() }}

            <div class="row">
              <div class="col-lg-12 col-xs-12">
                <div class="form-group">
                  <label class="">Event Title</label>
                  <input type="text" name="event_title" id="edit_event_title" required=""  class="form-control" placeholder="Event Title" readonly="readonly">
                </div>
                <input type="hidden" id="edit_event_id" value="" name="id" readonly="readonly"/>  
                <input type="hidden" id="edit_set_start_time_data" value="Yes" readonly="readonly"/>  
                <input type="hidden" id="edit_set_end_time_data" value="Yes" readonly="readonly"/>  
                <input type="hidden" name="set_end_date_data" id="edit_set_end_date_data" value="Yes" readonly="readonly"/>  
              </div>
            </div>
            <div class=" row">
              <div class="pull-left" style="width: 75%;">
                <div class="col-lg-5 col-xs-12">
                  <div class="form-group">
                    <label class="">Start Date</label>
                    <input type="text"   name="event_start_date" required="" id="edit_event_start_date" value="" class="form-control " placeholder="Start Date" readonly="readonly">
                  </div>
                </div>
                <div class="col-lg-2 col-xs-2">
                  {{-- <div id="edit_start_time_toggle" class="mt30">
                    <button type="button"  class="btn btn-md" title="Remove Start Time"   onclick="edit_remove_start_time()"> 
                    <i class="text-danger fa fa-times"></i>
                    <i class="text-danger fa fa-clock"></i>
                    </button>  
                  </div> --}}
                </div>
                <div class="col-lg-5 col-xs-12" id="edit_event_start_time_area" style="display: block">
                  <div class="form-group">
                    <label class="">Start Time</label>
                    <input type="text"   name="event_start_time" id="edit_event_start_time" value="" class="form-control" placeholder="Start Time" readonly="readonly">
                  </div>
                </div>
              </div>
              <div class="pull-right" >
                <div class="col-lg-2 col-xs-2">
                  {{-- <div id="edit_end_date_toggle" class="mt30" style="display: none" >
                    <button type="button" class="btn btn-md"  onclick="edit_add_end_date()" style="width: 117px" >
                    <i class="text-success fa fa-plus"></i> End Date</button>
                  </div> --}}
                </div>
              </div>
            </div>
            <div class="row" id="edit_end_date_area" style="display: block">
              <div class="pull-left" style="width: 75%;">
                <div class="col-lg-5 col-xs-12">
                  <div class="form-group">
                    <label class="">End Date</label>
                    <input type="text"   name="event_end_date" id="edit_event_end_date" value="" class="form-control" placeholder="End Date" readonly="readonly">
                  </div>
                </div>
                <div class="col-lg-2 col-xs-2">
                  {{-- <div id="edit_end_time_toggle" class="mt30">
                    <button type="button"  class="btn btn-md" title="Remove End Time"   onclick="edit_remove_end_time()"> 
                    <i class="text-danger fa fa-times"></i>
                    <i class="text-danger fa fa-clock"></i>
                    </button>  
                  </div> --}}
                </div>
                <div class="col-lg-5 col-xs-12" id="edit_event_end_time_area" style="display: block">
                  <div class="form-group">
                    <label class="">End Time</label>
                    <input type="text"   name="event_end_time" id="edit_event_end_time" value="" class="form-control" placeholder="End Time" readonly="readonly">
                  </div>
                </div>
              </div>
              <div class="pull-right">
                <div class="col-lg-2 col-xs-2 mt30" >
                  {{-- <button type="button" class="btn btn-md" onclick="edit_remove_end_date()" style="width: 117px" > <i class="text-danger fa fa-times"></i> Remove</button> --}}
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="">Event Description</label>
                  <textarea class="form-control" id="edit_event_description" name="event_description" placeholder="Description" readonly="readonly"></textarea>
                </div>
              </div>
            </div>
            {{-- <div class="section" style="margin-top: 10px">
              <p class="text-right">
                <button type="button" id="edit_event_btn"  class="btn btn-primary">Update</button>
              </p>
            </div> --}}
            <!-- end section row -->
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
        </div>
      </div>
    </div>
  </div>
