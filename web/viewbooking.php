<?php session_start(); ?>

<!DOCTYPE html>
<!-- saved from url=(0090)https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html -->
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>PHPJabbers.com | Free Car Rental Website Template</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="./PHPJabbers.com _ Free Car Rental Website Template_files/bootstrap.min.css">
	<link rel="stylesheet" href="./PHPJabbers.com _ Free Car Rental Website Template_files/main.css">
	<link rel="stylesheet" href="web1/main.css">
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="">
	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<div class="inner">

				<!-- Logo -->
				<a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/index.html" class="logo">
					<span class="fa fa-car"></span> <span class="title">CAR RENTAL WEBSITE</span>
				</a>

				<!-- Nav -->
				<nav>
					<ul>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#menu">Menu</a></li>
					</ul>
				</nav>

			</div>
		</header>

		<!-- Menu -->


		<!-- Main -->
		<div id="main">
			<div class="inner">
				<h1>Offers</h1>

				<div class="image main">
					<img src="./PHPJabbers.com _ Free Car Rental Website Template_files/banner-image-6-1920x500.jpg" class="img-fluid" alt="">
				</div>

				<!-- Offers -->
				<section class="tiles">
					<article class="style1">
						<span class="image">
							<img src="./PHPJabbers.com _ Free Car Rental Website Template_files/other-1-720x480.jpg" alt="">
						</span>
						<a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#footer" class="scrolly">
							<h2>Lorem ipsum dolor sit amet, consectetur</h2>

							<p>price from: <strong> $ 140.00</strong> per weekend</p>

							<div class="content">
								<p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>
							</div>
						</a>
					</article>
					<article class="style2">
						<span class="image">
							<img src="./PHPJabbers.com _ Free Car Rental Website Template_files/other-2-720x480.jpg" alt="">
						</span>
						<a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#footer" class="scrolly">
							<h2>Lorem ipsum dolor sit amet, consectetur</h2>

							<p>price from: <strong> $ 140.00</strong> per weekend</p>

							<div class="content">
								<p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>
							</div>
						</a>
					</article>
					<article class="style3">
						<span class="image">
							<img src="./PHPJabbers.com _ Free Car Rental Website Template_files/other-3-720x480.jpg" alt="">
						</span>
						<a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#footer" class="scrolly">
							<h2>Lorem ipsum dolor sit amet, consectetur</h2>

							<p>price from: <strong> $ 140.00</strong> per weekend</p>

							<div class="content">
								<p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>
							</div>
						</a>
					</article>

					<article class="style4">
						<span class="image">
							<img src="./PHPJabbers.com _ Free Car Rental Website Template_files/other-4-720x480.jpg" alt="">
						</span>
						<a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#footer" class="scrolly">
							<h2>Lorem ipsum dolor sit amet, consectetur</h2>

							<p>price from: <strong> $ 140.00</strong> per weekend</p>

							<div class="content">
								<p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>
							</div>
						</a>
					</article>

					<article class="style5">
						<span class="image">
							<img src="./PHPJabbers.com _ Free Car Rental Website Template_files/other-5-720x480.jpg" alt="">
						</span>
						<a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#footer" class="scrolly">
							<h2>Lorem ipsum dolor sit amet, consectetur</h2>

							<p>price from: <strong> $ 140.00</strong> per weekend</p>

							<div class="content">
								<p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>
							</div>
						</a>
					</article>

					<article class="style6">
						<span class="image">
							<img src="./PHPJabbers.com _ Free Car Rental Website Template_files/other-5-720x480.jpg" alt="">
						</span>
						<a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#footer" class="scrolly">
							<h2>Lorem ipsum dolor sit amet, consectetur</h2>

							<p>price from: <strong> $ 140.00</strong> per weekend</p>

							<div class="content">
								<p>Vestibulum id est eu felis vulputate hendrerit. Suspendisse dapibus turpis in dui pulvinar imperdiet. Nunc consectetur.</p>
							</div>
						</a>
					</article>
				</section>
			</div>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<section>
					<h2>View Bookings</h2>
					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Offer</th>
								<th>Contact</th>
								<th>Pickup</th>
								<th>Return Date</th>
								<th>Comment</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							require_once 'database.php';
							$db = new Database('localhost', 'root', '', 'car_rentals');
							$rentals = [];
							try {
								// Fetch id for the View link, but do not display it in the table
								$rentals = $db->connect()->query('SELECT id, name, email, offer, contact, pickup, return_date, car_comment FROM booking')->fetchAll(PDO::FETCH_ASSOC);
							} catch (Exception $e) {
								echo '<tr><td colspan="8">Error fetching bookings</td></tr>';
							}
							if ($rentals && count($rentals) > 0):
								foreach ($rentals as $row): ?>
									<tr>
										<td><?= htmlspecialchars($row['name']) ?></td>
										<td><?= htmlspecialchars($row['email']) ?></td>
										<td><?= htmlspecialchars($row['offer']) ?></td>
										<td><?= htmlspecialchars($row['contact']) ?></td>
										<td><?= htmlspecialchars($row['pickup']) ?></td>
										<td><?= htmlspecialchars($row['return_date']) ?></td>
										<td><?= htmlspecialchars($row['car_comment']) ?></td>
										<td><a href="update.php?id=<?= urlencode($row['id']) ?>">View</a></td>
									</tr>
								<?php endforeach;
							else: ?>
								<tr><td colspan="8">No bookings found.</td></tr>
							<?php endif; ?>
						</tbody>
					</table>
				</section>
				<section>
					<!-- <h2>Contact Info</h2>

					<ul class="alt">
						<li><span class="fa fa-envelope-o"></span> <a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#">contact@company.com</a></li>
						<li><span class="fa fa-phone"></span> +1 333 4040 5566 </li>
						<li><span class="fa fa-map-pin"></span> 212 Barrington Court New York, ABC 10001 United States of America</li>
					</ul>

					<h2>Follow Us</h2>

					<ul class="icons">
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
					</ul> -->
				</section>

				<ul class="copyright">
					<li>Copyright © 2020 Company Name </li>
					<li>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></li>
				</ul>
			</div>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="./PHPJabbers.com _ Free Car Rental Website Template_files/jquery.min.js.download"></script>
	<script src="./PHPJabbers.com _ Free Car Rental Website Template_files/bootstrap.bundle.min.js.download"></script>
	<script src="./PHPJabbers.com _ Free Car Rental Website Template_files/jquery.scrolly.min.js.download"></script>
	<script src="./PHPJabbers.com _ Free Car Rental Website Template_files/jquery.scrollex.min.js.download"></script>
	<script src="./PHPJabbers.com _ Free Car Rental Website Template_files/main.js.download"></script>
	<nav id="menu">
		<div class="inner">
			<h2>Menu</h2>
			<ul>
				<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/index.html">Home</a></li>

				<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html" class="active">Offers</a></li>

				<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/fleet.html">Fleet</a></li>

				<li>
					<a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#" class="dropdown-toggle">About</a>

					<ul>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/about.html">About Us</a></li>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/team.html">Team</a></li>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/blog.html">Blog</a></li>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/testimonials.html">Testimonials</a></li>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/faq.html">FAQ</a></li>
						<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/terms.html">Terms</a></li>
					</ul>
				</li>
				<li><a href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/contact.html">Contact Us</a></li>
			</ul>
		</div><a class="close" href="https://demo.phpjabbers.com/free-web-templates/car-rental-website-template-186/offers.html#menu">Close</a>
	</nav>


	<span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span>
</body>

</html>