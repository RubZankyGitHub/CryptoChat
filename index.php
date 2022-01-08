<head>
    <title>AESChat</title>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="sha256.js"></script>
    <script type="text/javascript" src="aes.js"></script>
    <script type="text/javascript" src="seckeygen.js"></script>
    <script type="text/javascript" src="deletemes.js"></script>
    <link rel="stylesheet" type="text/css" href="mainstyles.css">
    <link rel="shortcut icon" href="logo.png" type="image/png">

</head>

<body>
<div id="nevidimka" style="display: none">0</div>

<div id="content"></div>

<div id="messagebox">
    <table>
            <tr>
                <text>Message: </text><br>
                <textarea rows="3" cols="45"  name="utext" id="urtext" autocomplete="off"></textarea><br>
            </tr><tr>
                <text>Image url: </text><br>
                <textarea rows="1" cols="45"  name="uimage" id="urimage" autocomplete="off"></textarea><br>
            </tr><tr>
            <th>
                <text>Password: </text><br>
                <input type="password" rows="1" cols="20"  name="upass" id="urpass" autocomplete="off"></input>
                <script>
                document.getElementById("urpass").value = "<? echo rand(0, 9999999999); echo rand(0, 9999999999); echo rand(0, 9999999999);?>";
                </script>
                </th><th>
                <text>Nick: </text><br>
                <textarea rows="1" cols="20"  name="unick" id="urnick" autocomplete="off"></textarea>
            </th>
            </tr>
            
            <tr id="thebuttons">
            <th>
            <input id="delmes" type="button" name="delmes" value="DelMes" onclick="delfmes()">
            <input id="showpas" type="button" name="showpas" value="ShowPass" onclick="ShowPassJs()">
            </th>
            <th>
            <input id="sendmess" type="button" name="done" value="Send">
            </th>
            </tr>
            </table>
</div>


<div id="generatekey">
<text>Secret Key. </text>
<input id="next" type="button" name="next" value="Generate!" onclick="genk()">
</div>

<div id="urkey">
<text>Secret Key: </text>
<text id="somekey">Secret Key. </text>
</div>

<script type="text/javascript" src="crypt.js"></script>
<div id="endofpage"></div>
</body>