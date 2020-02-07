<html>
   <head>
     <meta charset="UTF-8">
     <meta name="csrf_token" content="{{ csrf_token() }}" />
      <title>Ajax Example</title>

      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>

      <script>
         function getMessage() {

            $.ajax({
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                  $("#msg").html(data.msg);
               }
            });
         }
      </script>
   </head>

   <body>
      <div id = 'msg'>This message will be replaced using Ajax.
         Click the button to replace the message.</div>

      <button type="button" name="button" onClick="getMessage()">Replace Message</button>
   </body>

</html>
