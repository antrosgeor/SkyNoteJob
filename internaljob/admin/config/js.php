<?php #js Javascript: ?>

<!--jQuery -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<!--jQuery UI-->
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<!-- BOOTSTRAP Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- tinymce -->
<script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>

<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
</script>

<!-- dropzone -->
<script src="js/dropzone.js"></script>

<script>
  //debug
	$(document).ready(function(){
		$("#console-debug").hide();
		$("#btn-debug").click(function(){
			$("#console-debug").toggle();
	});

//delete button for pages.
  $(".btn-delete").on("click", function(){ //Start Delete button for pages.
    var selected = $(this).attr("id");
    var pagesid = selected.split("del_").join("");
    var confirmed = confirm("Are you sure you want to delete this page?");

     if(confirmed == true){
        // afto edo $.get metaferi ta dedomena se ali selida.  
        $.get("ajax/pages.php?id="+pagesid);
        $("#page_"+pagesid).remove();
        alert(selected);
    }
  })  //Stop Delete button for pages.

//delete button for news.
  $(".btn-delete-news").on("click", function(){ //Start Delete button for pages.
    var selected = $(this).attr("id");
    var pagesid = selected.split("del_").join("");
    var confirmed = confirm("Are you sure you want to delete this news?");

     if(confirmed == true){
        // afto edo $.get metaferi ta dedomena se ali selida.  
        $.get("ajax/news.php?id="+pagesid);
        $("#page_"+pagesid).remove();
        alert(selected);
    }
  })  //Stop Delete button for pages.

// type Delete Button
  $(".btn-delete-type-job").on("click", function() { //Start Delete button for type_job.

      var selected = $(this).attr("id");
      var postid = selected.split("del_").join("");
      var confirmed = confirm("Are you sure you want to delete this Type Job?")
      console.log(postid);

      if (confirmed == true) {
          //Ajax call
          $.get("ajax/type_job.php?id="+postid)
          //Remove element from Dom
          $("#type_job_"+postid).fadeOut(300, function() {
               $(this).remove(); 
          });
      }
  })//Stop Delete button for tyoe_job.

//gia to minima pou fanizete pano kato de3ia aristera sto view messages
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()  
  })
});

//me afto edo tha mas efanisi tin mpara "tinymce" se kathe 'textarea' pou exoume.
tinymce.init({
    selector: ".editor",
    theme: "modern",	    
    plugins: [
         "code advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 

</script>
<!-- afto edo einai gia ta minimata gia na ta efanisi /message/ -->
<script>
   $(document).ready(function() {

      $(".clickable-row").click(function() {
          window.document.location = $(this).data("href");
      });
      
      $("#delete").click(function() {
          allVals = checkboxes();
          allVals.forEach(function(item) {
              $( "#row_"+item ).remove();
              $.get("ajax/messages.php?id="+item)
          });
      });

      function checkboxes() {  
           var allVals = [];
           $('.table-inbox :checked').each(function() {
             allVals.push($(this).val());
           });
           return allVals;
      }
  });

</script>