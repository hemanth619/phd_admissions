$('#userid').keyup(function(){
   var userid = $(this).val();
   $('#userid_status').text('Searching.....');
   if(userid != ""){
       $.post('php/username_check.php',{userid: userid},function(data){
          $('#userid_status').text(data); 
       });
   } else {
       $('#userid_status').text('');
   }
});