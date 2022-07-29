var base_url = "http://localhost/agriculture_portal/";

function set_combo(action , id)
{
    $("#"+action).html('<option>Loading...</option>');
    var c=0;
    var cc = setInterval(function (){
            c++;
            if(c > 1)
            {
              clearInterval(cc);   
            }
             else
             {
              $data = {id:id};
                var path = base_url + "backend/" + action;
                $.post(path , $data , function(output){
                   $("#"+action).html(output);
                });   
             }
        } , 500);
        
    
}

function change_status(action , id)
{
   if($("#"+action+id).hasClass('pre-icon os-icon os-icon-toggle-right'))
   {
       //class
       $("#"+action+id).removeClass('pre-icon os-icon os-icon-toggle-right').addClass('pre-icon os-icon os-icon-toggle-left');
      //title
        $("#"+action+id).removeAttr('title').removeClass('data-toggle').attr('data-toggle','tooltip').attr('data-original-title','Active');
      //css
        $('#'+action+id).css('color','#777');
   }
   else
   {
        //class
      $("#"+action+id).removeClass('pre-icon os-icon os-icon-toggle-left').addClass('pre-icon os-icon os-icon-toggle-right');
        //title
        $("#"+action+id).removeAttr('title').removeClass('data-toggle').attr('data-toggle','tooltip').attr('data-original-title','Dective');
        //css
        $('#'+action+id).css('color','#c72727'); 
   }
   $data = { action:action , id:id};
   
   var path = base_url + 'Backend/change_status/';
   
   $.post( path , $data);
}
