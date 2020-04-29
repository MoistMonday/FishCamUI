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
            session_start();
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
                    $roiAmount = $row['roiAmount'];
                }

                
                $_SESSION["video_id"]=$id;

                echo "<h2 class = 'videoTitle'>".$time."</h2> </br>";
                echo "<video  class = 'video' width = '320' height = '240' controls src = '$url'> Your browser does not support the video tag. </video>";
                
            }
            else{
                echo "Error";
            }
            //poll buttons
            $button = '';
            for($i = 0; $i < $roiAmount; $i++){
                $roi_id = $i+1;
                $button = '<button class = "vote-btn-'.$roi_id.'" onclick = "displayPoll('.$roi_id.')" > Vote </button>';
                echo $button;
            }
        ?>
            
            <span id = "comment_message"></span>
            <br />
            <div id = "display_comment"></div>

    
            <div id = "display_poll"> 
                <div id = "poll_headline">
                What species do you see in the marked area?
                </div>

                <div id = "classifications">

                </div> 

                <form method = "POST" id= "poll_form">
                    <div class = "poll">
                        <input name = "suggestion" id = "suggestion" class = "form-class poll-input"
                        placeholder = "Add a suggestion here..."/> </br>
                            <div class = "btn-group">
                            <input class = "button" type = "submit" name = "submit" id = "submit" 
                            class = "post" value = "VOTE" />
                            </div>
                    </div>     
                </form>
            </div>

     </div>

    </div>
    <div class="videoBox header">
            <a href = "videos.php"> <img src= "applogo.png" height="30" width="97">  </a>
        </div>


    <div class="btn-group" id = "comment-btn-group">
        <form method = "POST" id= "comment_form">
               
            <div class = "comment">
                <input name = "body" id = "body" class = "form-class comment-bar"
                placeholder = "Add a Comment..."/>
                <input type = "hidden" name = "comment_id" id = "comment_id" value = "0"/>
                <input class = "button" type = "submit" name = "submit" id = "submit" 
                class = "post" value = "POST" />
            </div>     
        </form>
    </div>

    <div class="btn-group" id = "poll-btn-group">
    
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
                    console.log("Elina er sød!");
                    
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
        //send vote from poll form to add_vote.php
        $('#poll_form').on('submit', function(event){
            event.preventDefault();
            var poll_data = $(this).serialize();
            console.log(poll_data);
            $.ajax({
                url: "add_vote.php",
                method: "POST",
                data: poll_data,
                dataType: "JSON",
                success:function(data)
                {    
                    if(data.error != '')
                    {
                        $('#poll_form')[0].reset();
                    }
                }
            })
        });

        function load_poll(){
            $.ajax({
                url: "fetch_poll.php",
                method: "POST", 
                success:function(data){
                    $('#classifications').html(data);
                }
            })
        }

    });
    function createCookie(name, value, days) { 
        var expires; 
    
        if (days) { 
            var date = new Date(); 
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
            expires = "; expires=" + date.toGMTString(); 
        } 
        else { 
            expires = ""; 
        } 
        document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/"; 
    }
    function displayPoll(roi_id) {
        
            var roi_identity = roi_id;
            createCookie("roi_id", roi_identity, "1");
            console.log(roi_identity);

            var commentSection = document.getElementById("display_comment");
            var commentBar = document.getElementById("comment-btn-group");
            var pollSection = document.getElementById("display_poll");
            var pollBar = document.getElementById("poll-btn-group");
            var pollHeadline = document.getElementById("poll_headline");
            if (roi_id == 1){
                    pollHeadline.style.color = "#d34071";
                } else if (roi_id == 2){
                    pollHeadline.style.color = "#d58c3e";
                } else if (roi_id == 3){
                    pollHeadline.style.color = "#b0cc52";
                } else if (roi_id == 4){
                    pollHeadline.style.color = "#6a61ab";
                }


            if (commentSection.style.display == "none") {
                commentSection.setAttribute('style', 'display: inline !important');
                commentBar.setAttribute('style', 'display: inline !important');
                pollSection.setAttribute('style', 'display: none !important');
                pollBar.setAttribute('style', 'display: none !important');

            } else {
                commentSection.setAttribute('style', 'display: none !important');
                commentBar.setAttribute('style', 'display: none !important');
                pollSection.setAttribute('style', 'display: inline !important');
                pollBar.setAttribute('style', 'display: inline !important');
            }            
        }
    </script>