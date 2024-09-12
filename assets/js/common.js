$(document).ready(function($) {

       
    // script for add student data
    $("#studentForm").validate({
    rules: {
        name: "required",                    
       subject: "required",
      marks: "required"
     
    },
    messages: {
        name: "Please enter your Name",                   
      subject: "Please enter your subject",
      marks: "This field is required"
    },
     
    submitHandler: function(form,event) {
        // event.preventDefault();
        form.submit();
    }
    
});

// script for fetch data by ajax
    $('.updateBtn').on('click', function(e){
      var href = $(this).attr('href');
      var myid = href.substring(6, href.length);
      console.log(myid);
      var uid = $('#uid').val(myid);

      $.ajax({
        type: "POST",
        data : {id: myid}, 
        dataType : 'json', 
        url: './inc/ajax-call.php',
        success: function({name, subject, marks}) {
          $('#name').val(name)  
          $('#subject').val(subject)  
          $('#marks').val(marks)  
          // console.log(data.name)
                             
        }


      })
      
      $("#updateStudentForm").validate({
        rules: {
            name: "required",                    
           subject: "required",
          marks: "required"
         
        },
        messages: {
            name: "Please enter your Name",                   
          subject: "Please enter your subject",
          marks: "This field is required"
        },
         
        submitHandler: function(form,event) {
         
      // return false;
      form.submit();
      // event.preventDefault();
   
    

    }
  
  });
    });

});


      // Function to unset session for error message
      function removeElementsByClass(className) {
      
        const elements = document.getElementsByClassName(className);
        
      
        const elementsArray = Array.from(elements);
        
       
        setTimeout(() => {
            elementsArray.forEach(element => {
                element.remove();
            });
        }, 2000); 
    }
    

    window.onload = function() {
        removeElementsByClass('err_msg');
    };