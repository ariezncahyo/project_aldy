$(document).ready(function(){
 // config default datepicker   
    $('.tgl').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
	changeYear: true,
        showOn:"button",
        buttonImage: "css/images/icon/calendar.gif",
	buttonImageOnly: true
    });
    $('.tgl').css("margin-right","5px");
    $('div.ui-datepicker').css("font-size","13px");
    

 // config standar datatable
 $('.auto_tabel').dataTable({
     "sPaginationType":"full_numbers"
 });
 
 //config for delete confirmation
 $('.delete_id').click(function(){
     var x = confirm("apa anda yakin");
     //jika x benar maka kembalikan nilai benar, jika tidak sebalikanya
     if(x==true){
        return true;
     }else{
         return false;
     }
 });
    
    
});