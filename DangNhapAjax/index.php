<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập bằng AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
        
            $("#sm").click(function(){
                var us = $("#us").val();
                var pw = $("#pw").val();
                
                
                $.ajax({
                    url: "check.php",
                    type: "POST",
                    data: { us: us, pw: pw },
                    success: function(data){
                        
                        $("#nt").html(data);
                        $("#nt").slideDown("slow");
                    }
                });
            });

            
            $("#us").focus(function(){
                $("#nt").slideUp("slow");
            });
        });
    </script>

    <style>
        body { margin: 80px 200px; font: normal 14pt Arial; color: navy; }
        input { border: solid 1px silver; padding: 3px; font: normal 14pt Arial; color: blue; }
        
        fieldset {
            border: solid 2px green;
            border-radius: 8px;
            width: 335px;
            background-color: #DAFEF3;
            padding: 10px;
        }
        
        div {
            width: 315px;
            border: solid 1px silver;
            padding: 10px 15px;
            font: normal 14pt Arial;
            color: green;
            background-color: yellow;
            box-shadow: 2px 2px black;
            margin-top: 10px;
            display: none;
        }
        
        legend { color: red; }
        
        input[type="button"] { float: right; padding: 5px 10px; }
    </style>
</head>
<body>
    <fieldset>
        <legend><b>LOGIN</b></legend>
        <table>
            <tr>
                <td style="width:30%">User name</td>
                <td style="width:70%">
                    <input type="text" id="us">
                </td> 
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" id="pw">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    
                    <input id="sm" type="button" value="Submit">
                </td>
            </tr>
        </table>
    </fieldset>
    
    
    <div id="nt">Notice:</div>
</body>
</html>