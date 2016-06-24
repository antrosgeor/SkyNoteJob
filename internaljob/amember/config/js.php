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

<!-- dropzone -->
<script src="js/dropzone.js"></script>


<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
</script>

<!-- <input type="date" name="event_date" required/> -->

<!-- gia to input date kai time -->
<script>
function processData(f1,f2,f3,f4,f5,f6){
  var v1 = document.getElementById(f1).value;
  var v2 = document.getElementById(f2).value;
  var v3 = document.getElementById(f3).value;
  var v4 = document.getElementById(f4).value;
  var v5 = document.getElementById(f5).value;
  var v6 = document.getElementById(f6).value;
  alert(v1+"\n"+v2+"\n"+v3+"\n"+v4+"\n"+v5+"\n"+v6);
  // Use Ajax-PHP to send the values to server storage
  // Ajax-PHP Video Tutorial - www.developphp.com/view.php?tid=1185
}
</script>

<script>
  //debug
	$(document).ready(function(){
		$("#console-debug").hide();
		$("#btn-debug").click(function(){
			$("#console-debug").toggle();
		});

//delete button for message.
    $(".btn-delete-message").on("click", function(){ //Start Delete button for message.
      var selected = $(this).attr("id");
      var pagesid = selected.split("del_").join("");
      var confirmed = confirm("Are you sure you want to delete this Message?");

       if(confirmed == true){
          // afto edo $.get metaferi ta dedomena se ali selida.  
          $.get("ajax/message.php?id="+pagesid);

          $("#page_"+pagesid).remove();

          alert(selected);
      }
    })  //Stop Delete button for message.

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

//delete button for contact.
    $(".btn-delete-contact").on("click", function(){ //Start Delete button for contact.
      var selected = $(this).attr("id");
      var pagesid = selected.split("del_").join("");
      var confirmed = confirm("Are you sure you want to delete this Contact?");

       if(confirmed == true){
          // afto edo $.get metaferi ta dedomena se ali selida.  
          $.get("ajax/contact.php?id="+pagesid);

          $("#page_"+pagesid).remove();

          alert(selected);
      }
    })  //Stop Delete button for contact.

//delete button for remember.
    $(".btn-delete-remember").on("click", function(){ //Start Delete button for remember.
      var selected = $(this).attr("id");
      var pagesid = selected.split("del_").join("");
      var confirmed = confirm("Are you sure you want to delete this Remember?");

       if(confirmed == true){
          // afto edo $.get metaferi ta dedomena se ali selida.  
          $.get("ajax/Remember.php?id="+pagesid);

          $("#page_"+pagesid).remove();

          alert(selected);
      }
    })  //Stop Delete button for remember.

//delete button for otherremember.
    $(".btn-delete-otherremember").on("click", function(){ //Start button for otherremember.
      var selected = $(this).attr("id");
      var pagesid = selected.split("del_").join("");
      var confirmed = confirm("Are you sure you want to removed this Remember?");

       if(confirmed == true){
          // afto edo $.get metaferi ta dedomena se ali selida.  
          $.get("ajax/OtherRemember.php?id="+pagesid);

          $("#page_"+pagesid).remove();

          alert(selected);
      }
    })  //Stop Delete button for otherremember.

//Mail button for remember.
    $(".btn-remember").on("click", function(){ //Start button for Mail button for remember.
      var selected = $(this).attr("id");
      var pagesid = selected.split("send_").join("");
      var confirmed = confirm("You want to send this note to your partner?");

       if(confirmed == true){
          // afto edo $.get metaferi ta dedomena se ali selida.  
          $.get("ajax/MailRemember.php?id="+pagesid);
          //$("#page_"+pagesid).remove();
          alert(selected);
      }
    })  //Stop  button for Mail button for remember.

//Mail button for remember.
    $(".btn-Myremember").on("click", function(){ //Start button Mail button for remember.
      var selected = $(this).attr("id");
      var pagesid = selected.split("send_").join("");
      var confirmed = confirm("You want to send this note to your Mail?");

       if(confirmed == true){
          // afto edo $.get metaferi ta dedomena se ali selida.  
          $.get("ajax/MyMailRemember.php?id="+pagesid);
          //$("#page_"+pagesid).remove();
          alert(selected);
      }
    })  //Stop button Mail button for remember.

//delete button for note.
    $(".btn-delete-note").on("click", function(){ //Start Delete button for note.
      var selected = $(this).attr("id");
      var pagesid = selected.split("del_").join("");
      var confirmed = confirm("Are you sure you want to delete this Note?");

       if(confirmed == true){
          // afto edo $.get metaferi ta dedomena se ali selida.  
          $.get("ajax/note.php?id="+pagesid);

          $("#page_"+pagesid).remove();

          alert(selected);
      }
    })  //Stop Delete button for note.


//delete button for news.
    $(".btn-delete-news").on("click", function(){ //Start Delete button for news.
      var selected = $(this).attr("id");
      var pagesid = selected.split("del_").join("");
      var confirmed = confirm("Are you sure you want to delete this news?");

       if(confirmed == true){
          // afto edo $.get metaferi ta dedomena se ali selida.  
          $.get("ajax/news.php?id="+pagesid);

          $("#page_"+pagesid).remove();

          alert(selected);
      }
    })  //Stop Delete button for news.

// type Delete Button
    $(".btn-delete-type-job").on("click", function() { //Start Delete button for type-job.

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
    
    })//Stop Delete button for type-job.

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

<!-- gia na ani3i to messages -->
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