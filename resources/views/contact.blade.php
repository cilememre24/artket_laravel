
<!doctype html>
<html lang="en">
  <head>
    @include('navbar')
    @include('partials.scripts')
  	<title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	</head>
	<body>

    <section class="ftco-section">
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">
                <div class="container contact-form">
                            <form method="post">
                                <h3>Drop Us a Message</h3>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>

                </div>
                </nav>

</div>

</section>

</body>
</html>
