<?php

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "video");

?>
<!doctype html>
<html>
<head>
    <link rel = "stylesheet" href = "style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> FishCam: The Underwater World of Limfjorden </title>

</head>
<body class = "body">

    <div class = "feed">

        <?php

            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM `uploaded_videos` WHERE id = '$id'";
                $result = $link -> query($sql) or die($link->error);
                while($row = $result->fetch_assoc())
                {
                    $name = $row['name'];
                    $url = $row['url'];
                    $time = $row['time'];
                }

                echo "<h2 class = 'videoTitle'>".$time."</h2> </br>";
                echo "<video  class = 'video' width = '320' height = '240' controls src = '$url'> Your browser does not support the video tag. </video>";

            }
            else{
                echo "Error";
            }

        ?>

        

      
            <span id = "comment_message"></span>
            <br />
            <div id = "display_comment"></div>

     </div>

    </div>
    <div class="videoBox header">
            <a href = "videos.php"> <img src= "applogo.png" height="30" width="97">  </a>
        </div>


    <div class="btn-group comment">
    <form method = "POST" id= "comment_form">
              <div class = "comment">
                  <input class = "bye" type = "text" name = "user_id" id = "user_id" 
                  class = "form-control comment" placeholder = "enter user id" />
                </div>
                <div class = "comment">
                    <input name = "body" id = "body" class = "form-class comment-bar"
                    placeholder = "Add a Comment..."/>
                    <input type = "hidden" name = "comment_id" id = "comment_id" value = "0"/>
                    <input class = "button" type = "submit" name = "submit" id = "submit" 
                    class = "post" value = "POST" />
                </div>
                
            </form></div>
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
                    load_comment();
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