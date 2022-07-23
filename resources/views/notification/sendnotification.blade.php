<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Send</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        body{margin-top:20px;}
        .mail-seccess {
          text-align: center;
	      background: #fff;
	      border-top: 1px solid #eee;
        }
        .mail-seccess .success-inner {
	       display: inline-block;
        }
        .mail-seccess .success-inner h1 {
	       font-size: 100px;
	       text-shadow: 3px 5px 2px #3333;
	       color: #006DFE;
	       font-weight: 700;
         }
        .mail-seccess .success-inner h1 span {
	       display: block;
	       font-size: 25px;
	       color: #333;
	       font-weight: 600;
	       text-shadow: none;
	       margin-top: 20px;
         }
        .mail-seccess .success-inner p {
	       padding: 20px 15px;
        }
        .mail-seccess .success-inner .btn{
	       color:#fff;
        }
    </style>
</head>
<body>
<section class="mail-seccess section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-12">
				<!-- Error Inner -->
				<div class="success-inner">
					<h1><i class="fa fa-envelope"></i><span><a href="{{url('send-notification')}}">Send Notification</a></span></h1>
				</div>
				<!--/ End Error Inner -->
			</div>
		</div>
	</div>
</section>
</body>
</html>