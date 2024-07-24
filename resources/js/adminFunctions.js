//AjaxPath  is URL for Ajax Request For Exp = /'user/status/change/' for change status of user
export function changeStatus(tag,id,ajaxPath) {
  
    $.get(ajaxPath+id, function (result) {

       if($(tag).hasClass('bg-danger')){
        $(tag).removeClass('bg-danger');
        $(tag).addClass('bg-success');
        $(tag).html('فعال');
       }else{
       $(tag).removeClass('bg-success');
       $(tag).addClass('bg-danger');
       $(tag).html('غیر فعال');
       }
    //    console.log(result);
    });

}