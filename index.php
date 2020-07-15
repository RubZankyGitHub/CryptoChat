<head>
    <title>TheChat</title>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="sha256.js"></script>
    <script type="text/javascript" src="aes.js"></script>
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
            <th>
                <text>Password: </text><br>
                <textarea rows="1" cols="20"  name="upass" id="urpass" autocomplete="off"></textarea>
                </th><th>
                <text>Nick: </text><br>
                <textarea rows="1" cols="20"  name="unick" id="urnick" autocomplete="off"></textarea>
                </th>
            </tr>
    </table>
    <input id="sendmess" type="button" name="done" value="Send">
</div>

<script type="text/javascript" src="crypt.js"></script>
<div id="endofpage"></div>
</body>