<?php 
/* Template Name: Page Press Release */ 

get_header( 'white' ); ?>

<section class="contact-section contact-section__hero-image">
	<div class="grid">
		<div class="grid__row">
			<div class="grid__col">
				<h1 class="contact-section__header-one text-center">How can we help?</h1>

				<p class="contact-section__paragraph contact-section__hero-image__paragraph text-center">Get in touch, We have got you for 24/7.</p>

				<hr class="contact-section__hr contact_section__hero-image__hr">
			</div>
		</div>
	</div>
</section>

<section class="contact-section contact-section__content">
	<div class="grid">
		<div class="grid__row">
			<div class="grid__col grid__col--6">
				<h3 class="contact-section__header-three">Operation</h3>

				<p class="contact-section__paragraph contact-section__content__paragraph--address">Menara Prima Lt 12,<br>
				Jl. DR. Ide Anak Agung Gede Agung RT05/RW02,<br>
				Kuningan Timur, Kecamatan Setiabudi,<br>
				Daerah Khusus Ibukota  – Jakarta 12950</p>

				<hr class="contact-section__hr contact-section__content__hr">

				<h3 class="contact-section__header-three">Customer Care</h3>

				<p class="contact-section__paragraph contact-section__content__paragraph--address">Call Centre : 021-5011-2000<br>
				Email : cs@payfazz.com</p>

				<hr class="contact-section__hr contact-section__content__hr">

				<h3 class="contact-section__header-three">Partnership</h3>

				<p class="contact-section__paragraph contact-section__content__paragraph--address">Email : partners@payfazz.com</p>

				<hr class="contact-section__hr contact-section__content__hr">
			</div>

			<div class="grid__col grid__col--6">
				<form>
					<input type="text" name="name" class="form-control contact-section__form-control__input" placeholder="Name">

					<input type="email" name="email" class="form-control contact-section__form-control__input" placeholder="Email">

					<input type="text" name="title" class="form-control contact-section__form-control__input" placeholder="Title">

					<textarea rows="10" class="form-control contact-section__form-control__textarea" placeholder="Message"></textarea>

					<button type="submit" class="button button--payfazz-blue">Send</button>
				</form>
			</div>
		</div>
</section>

<?php get_footer(); ?>