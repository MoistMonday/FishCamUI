<!DOCTYPE html>
<html>
  <head>
    <title> FishCam:  The Underwater World of Limfjorden</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class = "body">
      <div class = "feed">
          <form method = "POST" id= "comment_form">
              <div class = "comment">
                  <input type = "text" name = "user_id" id = "user_id" 
                  class = "form-control comment" placeholder = "enter user id" />
                </div>
                <div class = "comment">
                    <textarea name = "body" id = "body" class = "form-class comment"
                    placeholder = "Add a Comment..." rows="5"></textarea>
                    <input type = "hidden" name = "comment_id" id = "comment_id" value = "0"/>
                    <input type = "submit" name = "submit" id = "submit" 
                    class = "post" value = "POST" />
                </div>
                
            </form>
            <span id = "comment_message"></span>
            <br />
            <div id = "display_comment"></div>

        </div>

   
  </body>
 
</html>

<script>
    $(document).ready(function(){

        $('#comment_form').on('submit', function(event){
            console.log("yay!");
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "add_comment.php",
                method: "POST",
                data: form_data,
                dataType: "JSON",
                success:function(data)
                {
                    
                    if(data.error != '')
                    {
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                    }
                }
            })
        });
        load_comment();


        function load_comment(){
            $.ajax({
                url: "fetch_comment.php",
                method: "POST", 
                success:function(data){
                    $('#display_comment').html(data);
                }
            })
        }

        $(document).on('click', '.reply', function(){
            var comment_id = $(this).attr("id");
            $('#comment_id').val(comment_id);
            $('#comment_name').focus();

        })

    });
    </script>