<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
            
               <!--Policies modal-->
         <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
              <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #333;">
            <h4><span class="glyphicon glyphicon-lock"></span> Terms of Use & Policies</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <img  class="d-inline-block align-top mr-1" style="max-width:100%;" src="../pages/images/terms.jpeg" alt="Policies">
          <h4>How the demerit system works:</h4>
<p>Every driver starts off with a clean slate of zero points, however, if you get 12 points, your licence will be suspended for a period of three months. If you exceed three suspensions you could lose your licence permanently and if a licence has been suspended for the third time, it can be cancelled.</p>

<p>Points work on an accumulative basis with a different number of points assigned to specific traffic infringements, together with a fine.If you have accrued points and if don’t have any further traffic violations within a three-month period, one point will be removed every three months.

<h4>These are the amount of points allocated for various offenses:</h4>
<ul>
  <li>Driving without a licence equals four demerit points</li>
  <li>Driving under the influence of an intoxicating substance will be six demerit points (determined by court)</li>
  <li>Using and holding cell phone while driving will be one demerit point</li>
  <li>Speeding can be anywhere from two to six points depending on the speed limit (determined by court)</li>
  <li>Skipping a stop sign (light vehicles) is one demerit point and for buses and trucks it is two points.</li>
</ul>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
         
        </div>
      </div>
    </div>
  </div>
              <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#myModal" href="#">Terms of Use & Policies</a>
              </li>
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
              <a href="#" rel="nofollow">Traffic Offenders Demerit System</a>
            </span>
          </footer>
        </main>
      </div>
    </div>
   <script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"/TORS/includes/fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.not-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();
// submit form and get new records
$('#notSubmit').on('submit', function(event){
 event.preventDefault();
 if($('#numplate').val() != '' && $('#description').val() != '')
 {
  var form_data = $(this).serialize();
  $.ajax({
   url:"../index.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#notSubmit')[0].reset();
    load_unseen_notification();
   }
  });
 }
 else
 {
  alert("Both Fields are Required");
 }
});
// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
   
<script src="../datatables/jQuery-3.3.1/jquery-3.3.1.js" type="text/javascript"></script>
<script src="../datatables/DataTables-1.10.18/js/jquery.dataTables.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/inputmask/jquery.inputmask.js"></script>
<script type="text/javascript" src="../multiselect/js/bootstrap-multiselect.js"></script>

    

   
  </body>
</html>