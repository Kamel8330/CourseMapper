<!DOCTYPE html>
<html>
    <head>
        <title>Univesity of Alberta - Course Mapper</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css"/>
		
		
		<script type="text/javascript" src="js/jquery.js"></script>
		</head>
    <body>
        <div class="container" style='margin:35px auto'>
            <div class='row'>
                <div id="content" style="margin:35px auto;">
            <div class="row">
           <form method="POST" action="API/login.php">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
								<div class="form-group">
									<img src="images/logo.png" width="100%" height="auto"/>
								</div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" required id="_username" name="_username" placeholder="Username" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" required id="_password" name="_password" placeholder="Password" class="form-control" />
                                </div>
                               
                                <div class="form-group">
                                    <button type="submit" id="btnLogin" class="btn btn-success">SignIn</button>
                                </div>
                            
                        </div>
                    </div>
                </div>
		</form>
            </div>

        </div>
            </div>
        </div>
    </body>
</html>
