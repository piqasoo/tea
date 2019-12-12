$(function(){
  setTimeout(function(){
    $('.datatable').DataTable({
      "order": []
    });
    $('.chosen').chosen({
        width: "80px",
        disable_search: true
    });      
  }, 100)
 
});
