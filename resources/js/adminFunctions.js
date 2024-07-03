export function changeUserStatus(tag,userId) {
  
    $.get('user/status/change/'+userId, function (result) {

       if($(tag).hasClass('bg-danger')){
        $(tag).removeClass('bg-danger');
        $(tag).addClass('bg-success');
        $(tag).html('فعال');
       }else{
       $(tag).removeClass('bg-success');
       $(tag).addClass('bg-danger');
       $(tag).html('غیر فعال');
       }
       console.log(result);
    });

}