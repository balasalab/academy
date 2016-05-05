<!DOCTYPE html>
<html>
    <head>
        <title>appiride</title>
        <!--bootstrap css-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid mid-col">
            <div class="row mid-col-12">
                <div class="col-md-12 tac">
                    <img src="resources/assets/image/logo-ar.png" width="100px" />
                    <h1 class="logo-cap">appiride</h1>
                    <p class="logo-cap">share your journey</p>
                    <span class="to-start"><form><input type="email" name="email" required /> <button type="submit"><i class="glyphicon glyphicon-send"></i></button></form></span>
                </div>
            </div>
        </div>
    </body>
    <script src="resources/assets/js/jquery-2.1.4.min.js"></script>
    <script src="resources/assets/js/angular.min.js"></script>
    <script src="resources/assets/js/bootstrap.min.js"></script>
</html>

<style type="text/css">
    body{
        background-color: #792BA2;
        color:#E6B6FF;
        font-family: 'Roboto', sans-serif;
        background-image: -webkit-radial-gradient(50% top, rgba(84,90,182,0.6) 0%,rgba(84,90,182,0) 75%),-webkit-radial-gradient(right top, #794aa2 0%,rgba(121,74,162,0) 57%);
        background-image: radial-gradient( at 50% top, rgba(84,90,182,0.6) 0%,rgba(84,90,182,0) 75%),radial-gradient( at right top, #794aa2 0%,rgba(121,74,162,0) 57%);
        background-repeat: no-repeat;
        background-size: contain;
    }
    /*default*/
    .tac{
        text-align:center;
    }
    .tal{
        text-align:left;
    }
    .tar{
        text-align:right;
    }
    .fl{
        float:left;
    }
    .fr{
        float:right
    }
    .cb{
        clear:both;
    }
    .pn{
        padding:0px !important;
    }
    .mn{
        margin:0px !important;
    }
    .dn{
    display:none;
    }
    a{
    text-decoration:none;
    }
    a:hover{
    text-decoration:none;
    }
    .require{
        font-size:8px;
        color:rgb(247, 95, 95);
    }
    /*default*/

    /*home*/
    .logo-text{
        letter-spacing:1px;
    }
    .logo-cap{
        letter-spacing:1px;
    }
    .mid-col{
    position:absolute;
    top:0px;
    height:100%;
    width:100%;
    display:table;
    z-index:-1;
    }
    .mid-col-12{
    display:table-cell;
    vertical-align:middle;
    }
    .to-start{
    margin-top: 50px;
    display: inline-block;
    padding: 4px 5px;
    background-color: #540D79;
    border-radius: 5px;
    }

    .to-start input{
    border: none;
    background: rgba(255, 255, 255, 0.56);
    padding: 5px 10px;
    margin-right: -5px;
    border-radius: 2px 2px 2px 2px;
    color: #540D79;
    }
    .to-start button{
    border:1px solid #540D79;
    background-color:#540D79;
    display:inline-block;
    padding:5px 10px;
    }
    /*home*/

</style>
