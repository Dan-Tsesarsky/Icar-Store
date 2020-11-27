

$(document).ready(function() {
    $('#summernote').summernote({ height: 200});

});


String.prototype.parmlink=function(){
return this.toString().trim().toLowerCase().replace(/\s+(?=\S)/g,'-');
}
$('.sm-box').delay(3000).slideUp();
$('.add-to-cart-btn').on('click',function(){
    let id=$(this).data('id');
    let url= BASE_URl+"/shop/add-to-cart";
    $.ajax({
        method: "GET",
        url:url,
        dataType: "html",
        data:{id:id},
        success:function(res){
location.reload();
        }
      })
})
$(".update-cart").on('click',function(){
    let id=$(this).data('id');
    let url= BASE_URl+"/shop/update-cart";
    $.ajax({
        method: "GET",
        url:url,
        dataType: "html",
        data:{id:id,op:$(this).val()},
        success:function(res){
            location.reload();
        }
      })
})


$('.link-val').on('focusout',function(){
    $('.link-target').val($(this).val().parmlink())
})
$('.search-input').on('keyup',function(){
    $search=($(this).val()).trim();
    if($search.length>1){

       $.ajax({
           type: "GET",
           url: BASE_URl+'/shop/search',
           contentType: "application/json",
           dataType: "json",
           data: {search:$search},
           success: function(response){
            let options=[];
  if(response.length>0){
      options=[];
      console.log(response);
response.map(item=>{
    options.push({value:`${BASE_URl}/shop/${item.curl}/${item.url}/`, label:`${item.title}`});
})
if(options.length>0){
    $('#automplete-1').autocomplete({
        source: options, select: function( event, ui ) {
            window.location.href = ui.item.value;
        }


     }); 
    }
  }else if(response.length==0){
      options=['no response is avilble']
      $('#automplete-1').autocomplete({
        source: options})
  }
           },

         });
       };
    }
   );
$('.searchbtn').on('click',function(){


});
