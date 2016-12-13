<?php 

/*
Template Name: Buy Now
*/

get_header(); ?>

<section id="checkout">
	<div class="left">
		<div class="outer">
			<div class="inner">
				<img src="<?php echo bloginfo('template_directory'); ?>/assets/images/ipad.png" alt="" />
			</div>
		</div>
	</div>
	<div class="right">
		<div class="outer">
			<div class="inner">
				<div class="copy">
					<h2>Become a Beta Wizard!</h2>
					<ul>
						<li>Locked in Rate of $8.25/month (Normally $49)</li>
				        <li>Unlimited Surveys</li>
				        <li>Unlimited Market Research Templates</li>
				        <li>Early Access to Future AI Platform</li>
					</ul>
					<form action="" method="POST" id="checkoutFrm">
						<div class="group half">
							<article>
								<label for="firstname">First</label>
								<input type="text" name="firstname" id="firstname" placeholder="john" />
							</article>
							<article>
								<label for="lastname">Last</label>
								<input type="text" name="lastname" id="lastname" placeholder="doe" />
							</article>
						</div>
						<div class="group">
							<label for="name">Email</label>
							<input type="email" name="emailaddress" id="emailaddress" placeholder="email@address.." />
						</div>
						<div class="group">
							<label for="name">Card Number</label>
							<input type="number" id="card_numb" placeholder="*****************" pattern="\d*" maxlength="16" data-stripe="number" />
						</div>
						<div class="group dropdowns">
							<label for="expire_month">Expiration Date</label>
							<span>
								<div class="dropdown month">
					                <button>Month <i class="fa fa-angle-down"></i></button>
					                <ul class="dropdown-menu" data-input="expire_month">
					                    <li data-value="01">January</li>
					                    <li data-value="02">February</li>
					                    <li data-value="03">March</li>
					                    <li data-value="04">April</li>
					                    <li data-value="05">May</li>
					                    <li data-value="06">June</li>
					                    <li data-value="07">July</li>
					                    <li data-value="08">August</li>
					                    <li data-value="09">September</li>
					                    <li data-value="10">October</li>
					                    <li data-value="11">November</li>
					                    <li data-value="12">December</li>
					                </ul>
					            </div>
					            <input type="hidden" id="expire_month" data-stripe="exp_month" />
					        </span>
					        <span>
								<div class="dropdown year">
					                <button>Year <i class="fa fa-angle-down"></i></button>
					                <ul class="dropdown-menu" data-input="expire_year">
					                    <li data-value="2017">2017</li>
					                    <li data-value="2018">2018</li>
					                    <li data-value="2019">2019</li>
					                    <li data-value="2020">2020</li>
					                    <li data-value="2021">2021</li>
					                    <li data-value="2022">2022</li>
					                    <li data-value="2023">2023</li>
					                    <li data-value="2024">2024</li>
					                    <li data-value="2025">2025</li>
					                    <li data-value="2026">2026</li>
					                    <li data-value="2026">2028</li>
					                </ul>
					            </div>
								<input type="hidden" id="expire_year" data-stripe="exp_year" />
							</span>
						</div>
						<div class="cvc">
							<label for="cvc">CVC</label>
							<input type="number" id="cvc" placeholder="***" pattern="\d*" maxlength="4" data-stripe="cvc" />
						</div>
						<div class="payment">
							<span class="price">Price - $99</span>
							<button type="submit" class="btn btn-submit">Pay Now</button>
						</div>
						<span class="payment-errors"></span>
					</form>
				</div>
				<div class="successMessage">
					<h2>Success!</h2>
					<p>Thank you for purchasing your pre-paid subscription to Wyzerr!</p>
					<p>A confirmation email of your order will be sent to you, along with additional information, special perks, and progress updates leading up to our great unveil.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>