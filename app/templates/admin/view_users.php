<html>
    <head>
        <style>
            .container{
                /* background-color:#ff0000; */
                display:grid;
                column-gap: 25px;
                row-gap:10px;
                /* background-color: #ff0000; */
                width: 100%; 
                grid-template-columns: 1fr 1fr 1fr 1fr ;
            }
            .container .grid-item{

            }
        </style>
    </head>
    <body>
        <div class="container">
            <div><?php require "usercard.php"; ?></div>
            <div><?php require "usercard.php"; ?></div>
            <div><?php require "usercard.php"; ?></div>
            <div><?php require "usercard.php"; ?></div>
            <div><?php require "usercard.php"; ?></div>
            <div><?php require "usercard.php"; ?></div>
            <div><?php require "usercard.php"; ?></div>
         
        </div>
    </body>
</html>
